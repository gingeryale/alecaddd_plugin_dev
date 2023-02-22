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
