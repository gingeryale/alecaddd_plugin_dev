<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function enqueue()
    {
        // wp_enqueue_style('plugincss', PLUGIN_URL . '/assets/styles.css');
        // wp_enqueue_script('pluginjs', PLUGIN_URL . '/assets/scripts.js');
        wp_enqueue_style('plugincss', $this->plugin_url . '/assets/styles.css');
        wp_enqueue_script('pluginjs', $this->plugin_url  . '/assets/scripts.js');
    }
}
