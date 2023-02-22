<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc;

final class Init
{
    function __construct()
    {
    }
    /**
     * Store all classes inside array
     * @return array list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }
    /**
     * Loop over classes, instantiate and call 
     * register method on each if exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    /**
     *  Instantiate class method
     *  @param class $class
     *  @return new instance 
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
 
// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Pages\Admin;

// if (!class_exists('AlecadddPlugin')) {
//     class AlecadddPlugin
//     {
//         public $plugin;

//         function __construct()
//         {
//             $this->plugin = plugin_basename(__FILE__);
//             //add_action('init', array($this, 'custom_post_type'));
//         }

//         function register()
//         {
//            
//             // add action and link method
//             add_action('admin_menu', array($this, 'add_admin_pages'));

//             
//         }

//         function settings_link($links)
//         {
//             
//         }

//         function activate()
//         {
//             Activate::activate();
//         }
//         function deactivate()
//         {
//             Deactivate::deactivate();
//         }

//         

//         function create_post_type()
//         {
//             add_action('init', array($this, 'custom_post_type'));
//         }

//         function custom_post_type()
//         {
//             register_post_type('book', ['public' => true, 'label' => 'Books']);
//         }

//         

//         function uninstall()
//         {
//             // delete CPT
//             // delete plugin data
//         }
//     }



//     $alecadddPlugin = new AlecadddPlugin();
//     $alecadddPlugin->register();


//     // activation
//     register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));

//     //decativation
//     register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));
// }
