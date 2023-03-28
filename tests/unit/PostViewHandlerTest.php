<?php

declare( strict_types=1 );

namespace MRH\WPPostView\Tests;

use MRH\WPPostView\Frontend\PostViewHandler;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class PostViewHandlerTest extends TestCase {

    private static $post_view_handler;

    public static function set_up_before_class(): void {
        static::$post_view_handler = new PostViewHandler();
    }

    public function test_save_total_view_count_should_give_int_value() {
        $view_count = static::$post_view_handler->save_total_view_count();
        $this->assertIsInt( $view_count );
    }
}
