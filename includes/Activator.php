<?php

declare( strict_types=1 );

namespace MRH\WPPostView;

/**
 * Plugin activator class.
 */
class Activator
{
    /**
     * Runs the activator.
     */
    public function run(): void
    {
        $this->add_plugin_info();
    }

    /**
     * Adds plugin info.
     */
    public function add_plugin_info(): void
    {
        $activated = get_option( 'wppv_installation_time' );

        if ( !$activated ) {
            update_option( 'wppv_installation_time', time() );
        }

        update_option( 'wppv_version', WPPV_VERSION );
    }
}
