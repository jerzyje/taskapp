<?php
//namespace TaskApp;

class TaskApp
{
    public static $router;
    public static $db;
    public static $core;

    public static function init()
    {
        spl_autoload_register(['static','loadClass']);
        static::app_start();
        set_exception_handler(['TaskApp','handleException']);
    }

    public static function app_start()
    {
        static::$router = new TaskApp\Router();
        static::$core = new TaskApp\Core();
        static::$db = new TaskApp\Db();

    }

    public static function loadClass ($className)
    {
        $className = str_replace('\\', DS, $className);
        require_once RT.DS.$className.'.php';
    }

    public static function handleException (Throwable $e)
    {
        echo "Error: " , $e->getMessage(), "\n";
    }

}