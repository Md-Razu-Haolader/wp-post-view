<?php

declare( strict_types=1 );

namespace MRH\WPPostView;

use MRH\WPPostView\Admin\PostColumnCustomizer;
use MRH\WPPostView\Admin\Widget;

class Admin {

    public function __construct() {
        new PostColumnCustomizer();
        new Widget();
    }
}
