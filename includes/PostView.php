<?php

declare( strict_types=1 );

namespace MRH\WPPostView;

final class PostView
{
    /**
     * Static class object.
     *
     * @var object
     */
    private static $instance;

    public const version = '1.0.0';
    public const domain = 'wppv-post-view';

    /**
     * Private class constructor.
     */
    private function __construct()
    {
        $this->define_constants();
        $this->init_hooks();
    }

    /**
     * Private class cloner.
     */
    private function __clone()
    {
    }

    public static function instance(): PostView
    {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Defines the required constants.
     */
    public function define_constants(): void
    {
        define( 'WPPV_VERSION', self::version );
        define( 'WPPV_URL', plugins_url( '', WPPV_FILE ) );
        define( 'WPPV_ASSETS', WPPV_URL.'/assets' );
        define( 'WPPV_INCLUDES', WPPV_PATH.'/includes' );
        define( 'WPPV_VIEW_COUNT_KEY', 'wppv_post_views_count' );
        define( 'WPPV_DOMAIN', self::domain );
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks(): void
    {
        register_activation_hook( __FILE__, [$this, 'activate'] );
        add_action( 'plugins_loaded', [$this, 'init_classes'] );
    }

    /**
     * Updates info on plugin activation.
     */
    public function activate(): void
    {
        $activator = new Activator();
        $activator->run();
    }

    /**
     * Initializes the necessary classes for the plugin.
     */
    public function init_classes(): void
    {
        new Assets();
        new Frontend();
        if ( is_admin() ) {
            new Admin();
        }
    }
}
