<?php

namespace TaskApp;

class Db
{
    private $link;

    public $error;

    private $settings = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root',
        'db'=> 'taskapp'
    );

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->link=mysqli_connect(
            $this->settings['host'],
            $this->settings['user'],
            $this->settings['user'],
            $this->settings['db']
        );

        if ($this->link===false){
            throw new \Exception('DB connection error');
        }

        mysqli_set_charset($this->link,'utf8');
        return true;
    }

    public function execute($query)
    {
        if($query == '')
            return false;

        $result = array();
        $q=mysqli_query($this->link,$query);
        if(mysqli_errno($this->link)>0){
            $this->error = mysqli_errno($this->link);
            return false;
        }
        if( strpos($query,'SELECT') !== FALSE ){
            while ($row=mysqli_fetch_assoc($q)){
                $result[]=$row;
            }
        }
        return $result;
    }
}