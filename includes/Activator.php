<?php

namespace MRH\WPPostView;

/**
 * Plugin activator class
 */
class Activator
{

    /**
     * Runs the activator
     *
     * @return void
     */
    public function run()
    {
        $this->add_plugin_info();
    }

    /**
     * Adds plugin info
     *
     * @return void
     */
    public function add_plugin_info()
    {
        $activated = get_option('wppv_installation_time');

        if (!$activated) {
            update_option('wppv_installation_time', time());
        }

        update_option('wppv_version', WPPV_VERSION);
    }
}
