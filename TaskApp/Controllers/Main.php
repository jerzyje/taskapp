<?php
namespace Controllers;

class Main extends \TaskApp\Controller
{
    public function action_index($params)
    {

        if($this->model !== null){
            $data['db'] = $this->model->get_data($params);
            $data['rows'] = $this->model->get_rows();
            $data['params'] = $this->model->check_params($params);
        }
        $data['title'] = 'Tasks List';

        $this->view->generate_html('Main', 'TemplateMain', $data);
    }

    public function add_task(){
        $data['title'] = 'Add Task';
        $this->view->generate_html('AddTask', 'TemplateMain', $data);
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
        $data['rows'] = $this->model->get_rows();

        $this->view->generate_html('Main', 'TemplateMain',$data);


    }

    public function edit_task($params){
        if( !isset($_SESSION['user']) ){
            $data['title'] = 'Tasks List <code>access denied</code>';
            $this->view->generate_html('Main', 'TemplateMain',$data);
            return;
        }

        if( intval($params[0])!=0 ){
            $data['input'] = $this->model->get_record($params[0]);
        }

        $data['title'] = 'Edit Task by admin';
        $this->view->generate_html('EditTask', 'TemplateMain',$data);
    }

    public function update_task($params){
        $data = $this->model->validate_data($_POST);
        if( count($data['errors']) > 0 ){
            $data['title'] = 'Edit Task <code>correct errors</code>';
            $this->view->generate_html('EditTask', 'TemplateMain', $data);
            return;
        }

        $result = $this->model->update_task($data['input']);
        if($result !== false){
            $data['title'] = 'Tasks List <code>task successfully updated</code>';
        }else{
            $data['title'] = 'Tasks List <code>task update error</code>';
        }
        $data['db'] = $this->model->get_data();
        $data['rows'] = $this->model->get_rows();

        $this->view->generate_html('Main', 'TemplateMain',$data);
    }
}