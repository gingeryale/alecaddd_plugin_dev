<?php

/**
 * @package AlecadddPlugin
 */
/*
Plugin Name: Alecaddd Plugin
Plugin URI: https://alecaddd.com/plugin
Description: YT tutorial series by Alecaddd
Version: 1.0.0
Author: Alecaddd on YouTube
Author URI: http://alecaddd.com
License: GPLv2 or later
Text Domain: Alecaddd Plugin
*/

defined('ABSPATH') or die('No Access.');

//public - access all

//protected - access method within class

//private - access only by class (not even extension)

//static - any visibility. Usage without 'new' ::

if (!class_exists('AlecadddPlugin')) { {
        class AlecadddPlugin
        {

            function __construct()
            {
                add_action('init', array($this, 'custom_post_type'));
            }

            function activate()
            {
                require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-activate.php';
                AlecadddPluginActivate::activate();
            }

            function register()
            {
                add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            }

            function uninstall()
            {
                // delete CPT
                // delete plugin data
            }

            function custom_post_type()
            {
                register_post_type('book', ['public' => true, 'label' => 'Books', 'menu_icon'   => 'dashicons-book']);
            }
            function enqueue()
            {
                // enqueue scripts
                wp_enqueue_style('plugincss', plugins_url('/assets/styles.css', __FILE__));
                wp_enqueue_script('pluginjs', plugins_url('/assets/scripts.js', __FILE__));
            }
        }

        if (class_exists('AlecadddPlugin')) {
            $alecadddPlugin = new AlecadddPlugin();
            $alecadddPlugin->register();
        }

        // activation
        register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));

        //decativation
        require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
        register_activation_hook(__FILE__, array('AlecadddPluginDeactivate', 'deactivate'));
    }
}
