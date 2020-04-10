<?php

namespace Models;
use TaskApp;

class Main
{

    public function get_data()
    {
        $tasks = TaskApp::$db->execute("SELECT * FROM tasks ORDER BY name ASC");
        return $tasks;
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
}