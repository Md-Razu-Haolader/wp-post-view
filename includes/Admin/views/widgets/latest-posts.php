<h3 style="padding-left:5px;">Posts</h3>  
<hr>
<?php foreach ( $posts as $post ): ?>
    <div class="jwp-lp-box">
        <div>
            <a class ="jwp-lp-a" href="<?php echo get_permalink( $post ); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $post->post_title; ?>
            </a>
        </div>
        <p><?php echo date_i18n( 'F j, Y | g:i A', strtotime( $post->post_date ) ); ?></p>
    </div>
<?php endforeach; ?>