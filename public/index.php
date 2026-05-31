<?php

    use Taskflair\Http\Route;
    use Taskflair\Http\App;
    use Taskflair\core\Container;
    use Taskflair\Http\Request;
    
    define('BASE_PATH' , dirname(__DIR__));

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../routes/manage.php';

    // Instantiate the DI container and register core bindings
    $container = new Container();
    // Request can be auto‑resolved, but we bind it explicitly for clarity
    $container->bind(Request::class, Request::class);

    // Bind core services
    $container->bind(Taskflair\core\DatabaseInterface::class, Taskflair\core\Database::class);
    $container->bind(App\Repositories\TaskRepositoryInterface::class, App\Repositories\MysqlTaskRepository::class);
    $container->bind(App\Services\TaskService::class, App\Services\TaskService::class);
    // Bind Request – can be transient (new each call) – we use factory
    $container->bind(Taskflair\Http\Request::class, function($c){ return new Taskflair\Http\Request(); });


    (new App(new Route(), $container))->execute();
