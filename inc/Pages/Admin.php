<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController
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
        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-book', 90);
    }

    function admin_index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
        //require_once $this->plugin_path . 'templates/admin.php';
    }
}
