<?php

    use Taskflair\Http\Route;
    use Taskflair\Http\App;
    
    define('BASE_PATH' , dirname(__DIR__));

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../routes/manage.php';




    (new App(new Route()))->execute();


