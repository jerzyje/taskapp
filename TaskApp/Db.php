<?php

namespace TaskApp;

//use TaskApp;

class Db
{
    public $sql;
    private $settings = array(

    );

    public function __construct()
    {

        $sql = $this->connect();
        //$this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);

    }

    protected function connect()
    {
        return null;
    }

    public function execute($query, array $params=null)
    {

        if(is_null($params)){
            //$stmt = $this->sql->query($query);
            //return $stmt->fetchAll();
        }
        //$stmt = $this->pdo->prepare($query);
        //$stmt->execute($params);
        //return $stmt->fetchAll();

    }
}