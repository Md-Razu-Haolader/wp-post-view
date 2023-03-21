<?php

namespace MRH\WPPostView\Frontend;

use MRH\WPPostView\Helpers\Template;

class Shortcode
{

    /**
     * Shortcode class constructor
     */
    function __construct()
    {
        add_shortcode('wppv', [$this, 'render_post_view_shortcode']);
    }

    /**
     * Renders shortcode
     *
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_post_view_shortcode($atts, $content = '')
    {
        global $wp;
        $defaultValues = $this->get_default_values($atts);
        $args       = shortcode_atts($defaultValues, $atts);
        $posts      = get_posts($args);

        ob_start();

        if ($posts) {
            Template::render(
                'post-list.php',
                [
                    'url' => home_url($wp->request),
                    'posts' => $posts,
                    'terms' => $this->get_terms(),
                    'selected_post_ids' => $this->get_selected_post_ids($atts),
                    'total_post' => wp_count_posts()->publish
                ]
            );
        }

        $content = ob_get_clean();
        return $content;
    }

    private function get_default_values(array $atts): array
    {
        $number_posts = isset($atts['numposts']) ? $atts['numposts'] : 10;
        $category     = $this->get_selected_category_ids($atts);
        $order        = isset($atts['order']) ? $atts['order'] : 'DESC';
        $order_by     = isset($atts['order']) ? 'meta_value_num' : '';
        $meta_key     = isset($atts['order']) ? WPPV_COUNT_KEY : '';

        if (isset($_POST['wppv-submit'])) {
            $number_posts = isset($_POST['numberposts']) ? $_POST['numberposts'] : $number_posts;
            $order        = isset($_POST['order']) ? $_POST['order']            : $order;
            $order_by     = isset($_POST['order']) ? 'meta_value_num'           : $order_by;
            $meta_key     = isset($_POST['order']) ? 'post_views_count'         : $meta_key;
            $category     = isset($_POST['category']) ? $_POST['category']      : $category;
        }

        return array(
            'numberposts'  => $number_posts,
            'category__in' => $category,
            'orderby'      => $order_by,
            'order'        => $order,
            'meta_key'     => $meta_key,
        );
    }

    private function get_selected_post_ids(array $attr): array
    {
        $postIds = [];
        if (isset($atts['ids'])) {
            $postIds = explode(",", $atts['ids']);
        }
        return $postIds;
    }

    private function get_selected_category_ids(array $attr): array
    {
        $category = [];
        if (isset($atts['category'])) {
            $cats = explode(",", $atts['category']);
            foreach ($cats as $cat) {
                $term       = get_term_by('name', $cat, 'category');
                $category[] = $term->term_id;
            }
        }
        return $category;
    }

    private function get_terms(): array
    {
        return get_terms(array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
        ));
    }
}
