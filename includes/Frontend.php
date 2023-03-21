<?php

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
    function __construct()
    {
        new Shortcode();
        new PostViewHandler();
    }
}
