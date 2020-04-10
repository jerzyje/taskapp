<?php
namespace TaskApp;
use TaskApp;

class Core
{

    private $default_controller = 'Main';

    private $default_action = "action_index";

    public function launch()
    {

        list($controller_name, $action_name, $params) = TaskApp::$router->resolve();
        echo $this->launch_action($controller_name, $action_name, $params);

    }

    public function launch_action($controller_name, $action_name, $params)
    {

        $controller_name = empty($controller_name) ? $this->default_controller : ucfirst($controller_name);

        $file = RT.DS.'TaskApp\Controllers'.DS.$controller_name.'.php';
        if(!file_exists($file)){
            throw new \Exception('Controller File not found:'.$file);
        }
        require_once $file;

        $file = RT.DS.'TaskApp\Models'.DS.$controller_name.'.php';
        if(file_exists($file)){
            require_once $file;
        }


        if(!class_exists("\\Controllers\\".ucfirst($controller_name))){
            throw new \Exception('Controller Class not found');
        }

        $controller_name = "\\Controllers\\".ucfirst($controller_name);
        $controller = new $controller_name;
        $action_name = empty($action_name) ? $this->default_action : $action_name;

        if (!method_exists($controller, $action_name)){
            throw new \Exception('Controller Method not exist');
        }

        return $controller->$action_name($params);

    }

}
