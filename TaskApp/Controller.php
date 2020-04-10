<?php
namespace TaskApp;

class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();

        $model_name = explode('\\',get_called_class())[1];
        $model_name = "\\Models\\".ucfirst($model_name);
        if(class_exists($model_name)){
            $this->model = new $model_name;
        }
        session_start();

    }

    function action_index($params)
    {

    }
}