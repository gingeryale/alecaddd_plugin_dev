<?php

/**
 * @package AlecadddPlugin
 * 
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
// security precaution
// if (!defined('ABSPATH')) {
//     die;
// }
// altertaive security methos
defined('ABSPATH') or die('No Access.');

// alternative security method
// if (!function_exists('add_action')) {
//     echo "No Access.";
//     exit;
// }

class AlecadddPlugin
{
    function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }
    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function activate()
    {
        // generate CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall()
    {
        // delete CPT
        // delete plugin data
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
}

if (class_exists('AlecadddPlugin')) {
    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register();
}

// activation
register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));
//decativation
register_activation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));
// unintall
//register_activation_hook(__FILE__, array($alecadddPlugin, 'uninstall'));
