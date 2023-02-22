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

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
