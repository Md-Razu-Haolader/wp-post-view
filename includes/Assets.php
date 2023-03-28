<?php

declare( strict_types=1 );

namespace MRH\WPPostView;

class Assets {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'register_assets'] );
    }

    /**
     * Retrives stylesheet info.
     *
     * @return object
     */
    public function get_styles() {
        return [
            'wppv-style' => [
                'src'     => WPPV_ASSETS . '/css/style.css',
                'version' => filemtime( WPPV_PATH . '/assets/css/style.css' ),
                'deps'    => false,
            ],
        ];
    }

    /**
     * Registers the assets.
     *
     * @return void
     */
    public function register_assets() {
        $styles = $this->get_styles();

        foreach ( $styles as $handle => $style ) {
            wp_register_style( $handle, $style['src'], $style['deps'], $style['version'] );
        }
    }
}
