<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Pages;

class Admin
{
    function __construct()
    {
    }
    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }
    function add_admin_pages()
    {
        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index_callback'), 'dashicons-book', 90);
    }

    function admin_index_callback()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}
