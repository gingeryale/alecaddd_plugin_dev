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

if (!class_exists('AlecadddPlugin')) {
    class AlecadddPlugin
    {
        public $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
            //add_action('init', array($this, 'custom_post_type'));
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            // add action and link method
            add_action('admin_menu', array($this, 'add_admin_pages'));

            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        function activate()
        {
            require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-activate.php';
            AlecadddPluginActivate::activate();
        }
        function deactivate()
        {
            require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
            AlecadddPluginDeactivate::deactivate();
        }

        function add_admin_pages()
        {
            add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index_callback'), 'dashicons-book', 90);
        }

        function admin_index_callback()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            // enqueue scripts
            wp_enqueue_style('plugincss', plugins_url('/assets/styles.css', __FILE__));
            wp_enqueue_script('pluginjs', plugins_url('/assets/scripts.js', __FILE__));
        }

        function uninstall()
        {
            // delete CPT
            // delete plugin data
        }
    }



    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register();


    // activation
    register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));

    //decativation
    register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));
    // require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
    // register_deactivation_hook(__FILE__, array('AlecadddPluginDeactivate', 'deactivate'));
}
