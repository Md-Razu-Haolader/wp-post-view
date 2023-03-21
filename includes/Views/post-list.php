<div class="wrap">
    <form action="<?php echo $url ?>" method="post">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="numberposts">Number of Posts: </label>
                </th>
                <th scope="row">
                    <select name="numberposts" id="numberposts">
                        <option disabled="true" selected>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <label for="order">Order posts by Views: </label>
                </th>
                <th scope="row">
                    <select name="order" id="order">
                        <option disabled="true" selected>select</option>
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <label for="category">View posts by Category: </label>
                </th>
                <th scope="row">
                    <?php foreach ($terms as $term) { ?>
                        <input type="checkbox" name="category[]" id="category" value="<?php echo $term->term_id; ?>"> <?php echo $term->name; ?><br />
                    <?php } ?>
                </th>
            </tr>
        </table>
        <button type="submit" class="submit" id="submit" name="wppv-submit">Submit</button>
    </form>
</div>
<hr>

<?php

use MRH\WPPostView\Helpers\Common;

foreach ($posts as $post) {
    $view_count = Common::emphasize_text(get_post_meta($post->ID, WPPV_COUNT_KEY, true), 'Views');
    $excerpt = '';
    if (in_array($post->ID, $selected_post_ids)) {
        if (has_excerpt($post)) {
            $excerpt = get_the_excerpt($post);
        } else {
            $excerpt = Common::custom_excerpt($post, 200);
        }
    }
?>
    <div class="wppv-box">
        <h2>
            <a class="wppv-a" href="<?php echo get_permalink($post); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $post->post_title; ?>
            </a>
        </h2>
        <span><?php echo $view_count; ?></span>
    </div>
    <p><?php echo $excerpt; ?></p>
    <hr>
<?php
}
