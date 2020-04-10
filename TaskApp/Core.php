<?php
namespace TaskApp;
use TaskApp;

class Core
{

    public $defaultControllerName = 'Main';

    public $defaultActionName = "action_index";

    public function launch()
    {

        list($controllerName, $actionName, $params) = TaskApp::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);

    }

    public function launchAction($controllerName, $actionName, $params)
    {

        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);

        $file = RT.DS.'Controllers'.DS.$controllerName.'.php';
        if(!file_exists($file)){
            throw new \Exception('File not found:'.$file);
        }
        require_once $file;

        if(!class_exists("\\Controllers\\".ucfirst($controllerName))){
            throw new \Exception('Class not found');
        }

        $controllerName = "\\Controllers\\".ucfirst($controllerName);
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;

        if (!method_exists($controller, $actionName)){
            throw new \Exception('Method not exist');
        }

        return $controller->$actionName($params);

    }

}
