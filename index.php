<?php

define('RT', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

require RT.'/TaskApp/TaskApp.php';

TaskApp::init();

TaskApp::$core->launch();