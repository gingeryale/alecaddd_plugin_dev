<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\API\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    function __construct()
    {
        $this->settings = new SettingsApi;
    }
    public function register()
    {
        //add_action('admin_menu', array($this, 'add_admin_pages'));
        $pages = [
            [
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => function () {
                    echo 'hey here';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];
        $this->settings->addPages($pages)->register();
    }
}
