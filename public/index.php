<?php

    use Buildilume\Http\Route;
    use Buildilume\Http\App;
    use Buildilume\core\Container;
    use Buildilume\Http\Request;
    
    define('BASE_PATH' , dirname(__DIR__));

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../routes/manage.php';

    // Instantiate the DI container and register core bindings
    $container = new Container();
    // Request can be auto‑resolved, but we bind it explicitly for clarity
    $container->bind(Request::class, Request::class);

    // Bind core services
    $container->bind(Buildilume\core\DatabaseInterface::class, Buildilume\core\Database::class);
    $container->bind(App\Repositories\TaskRepositoryInterface::class, App\Repositories\MysqlTaskRepository::class);
    $container->bind(App\Services\TaskService::class, App\Services\TaskService::class);
    // Bind Request – can be transient (new each call) – we use factory
    $container->bind(Buildilume\Http\Request::class, function($c){ return new Buildilume\Http\Request(); });


    (new App(new Route(), $container))->execute();
