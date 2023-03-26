<?php

declare( strict_types=1 );

namespace MRH\WPPostView\Admin\Widgets;

class LatestPost
{
    public function __construct()
    {
        add_action( 'wp_dashboard_setup', [self::class, 'add_widget'] );
    }

    /**
     * Adds the dashboard wizard.
     *
     * @return void
     */
    public static function add_widget()
    {
        wp_add_dashboard_widget(
            'wppv_widget',
            esc_html__( 'Latest Posts', WPPV_DOMAIN ),
            [self::class, 'render']
        );
    }

    /**
     * Renders the posts in the widget.
     *
     * @return void
     */
    public static function render()
    {
        $args = [
            'numberposts' => 5,
            'order' => 'DESC',
            'orderby' => 'ID',
        ];

        $posts = get_posts( $args );

        if ( $posts ) {
            $template = WPPV_INCLUDES.'/Admin/views/widgets/latest-posts.php';
            include $template;
        } else {
            echo '<h4>No post to show</h4>';
        }
    }
}
