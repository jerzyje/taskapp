<?php

namespace Models;
use TaskApp;

class Main
{

    public function get_data($params ='')
    {
        $order = 'id desc';
        $page = 0;
        if(is_array($params) && count($params)> 0){
            $parts = explode('+',$params[0]);
            $order = str_replace('_', ' ', explode('=',$parts[0])[1]);
            $page = explode('=',$parts[1])[1];
        }
        $query = "SELECT * FROM tasks ORDER BY {$order} LIMIT {$page},3";
        $tasks = TaskApp::$db->execute($query);
        return $tasks;
    }

    public function get_rows(){
        $rows = TaskApp::$db->execute("SELECT * FROM tasks", true);
        return $rows;
    }

    public function check_params($params = ''){

        if(is_array($params) && count($params)>0){
            if(strstr($params[0],'_desc')){
                $params = str_replace('_desc','_asc',$params[0]);
            }
            if(strstr($params[0],'_asc')){
                $params = str_replace('_asc','_desc',$params[0]);
            }
        }else{
            $params = 'sort=email_desc+page=0';
        }
        return $params;
    }

    public function get_record($id){
        $record = TaskApp::$db->execute("SELECT * FROM tasks WHERE id = {$id}");
        return $record[0];
    }

    public function validate_data($input){
        $data['errors'] = array();

        foreach($input as $k=>$v){
            if($v==''){
                $data['errors'][] = $k;
            }
            $data['input'][$k] = addslashes(strip_tags($v));
        }
        if( !filter_var($data['input']['email'], FILTER_VALIDATE_EMAIL) ){
            $data['errors'][] = 'email';
        }
        return $data;
    }

    public function insert_task($input){
        $query = "INSERT INTO tasks VALUES ('','".$input['name']."','".$input['email']."','".$input['task']."',0,0)";
        $result = TaskApp::$db->execute($query);
        return $result;
    }

    public function update_task($input){
        if(!isset($_SESSION['user'])){
            return false;
        }
        $query = "UPDATE tasks SET name='".$input['name']."', email='".$input['email']."', task='".$input['task']."', edited=1, completed=".$input['completed']." WHERE id =".$input['id'];
        $result = TaskApp::$db->execute($query);
        return $result;
    }
}