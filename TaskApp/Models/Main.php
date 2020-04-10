<?php

namespace Models;
use TaskApp;

class Main
{

    function get_data()
    {
        $tasks = TaskApp::$db->execute("SELECT * FROM tasks ORDER BY name ASC");
        return $tasks;
    }
}