<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

class SettingsLinks
{
    public function register()
    {
        add_filter("plugin_action_links" . PLUGIN, array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
