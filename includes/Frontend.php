<?php

declare( strict_types=1 );

namespace MRH\WPPostView;

use MRH\WPPostView\Frontend\PostViewHandler;
use MRH\WPPostView\Frontend\Shortcode;

/**
 * Frontend handler class.
 */
class Frontend {

    /**
     * Frontend class constructor.
     */
    public function __construct() {
        new Shortcode();
        new PostViewHandler();
    }
}
