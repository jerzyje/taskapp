<?php
namespace Controllers;

class Main extends \TaskApp\Controller
{
    public function action_index($params)
    {

        if($this->model !== null){
            $data['db'] = $this->model->get_data();
        }
        $data['title'] = 'Tasks List';

        $this->view->generate_html('Main', 'TemplateMain', $data);
    }

    public function add_task(){
        $data['title'] = 'Add Task';
        $this->view->generate_html('AddTask', 'TemplateMain', $data);
    }

    public function edit_task(){
        var_dump($_POST);

        $this->view->generate_html('EditTask', 'TemplateMain');
    }

    public function save_task(){
        $data = $this->model->validate_data($_POST);
        if( count($data['errors']) > 0 ){
            $data['title'] = 'Add Task <code>correct errors</code>';
            $this->view->generate_html('AddTask', 'TemplateMain', $data);
            return;
        }

        $result = $this->model->insert_task($data['input']);
        if($result !== false){
            $data['title'] = 'Tasks List <code>task successfully added</code>';
        }else{
            $data['title'] = 'Tasks List <code>task insert error</code>';
        }
        $data['db'] = $this->model->get_data();

        $this->view->generate_html('Main', 'TemplateMain',$data);


    }
}