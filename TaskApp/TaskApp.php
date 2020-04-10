<?php
//namespace TaskApp;

class TaskApp
{
    public static $router;
    public static $db;
    public static $core;

    public static function init()
    {
        spl_autoload_register(['static','load_class']);
        static::app_start();
        set_exception_handler(['TaskApp','handle_exception']);
    }

    public static function app_start()
    {
        static::$router = new TaskApp\Router();
        static::$core = new TaskApp\Core();
        static::$db = new TaskApp\Db();

    }

    public static function load_class ($class_name)
    {
        $class_name = str_replace('\\', DS, $class_name);
        require_once RT.DS.$class_name.'.php';
    }

    public static function handle_exception (Throwable $e)
    {
        echo "Error: " , $e->getMessage(), "\n";
    }

}