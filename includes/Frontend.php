<?php

declare(strict_types=1);

namespace MRH\WPPostView;

use MRH\WPPostView\Frontend\Shortcode;
use MRH\WPPostView\Frontend\PostViewHandler;

/**
 * Frontend handler class
 */
class Frontend
{

    /**
     * Frontend class constructor
     */
    public function __construct()
    {
        new Shortcode();
        new PostViewHandler();
    }
}
