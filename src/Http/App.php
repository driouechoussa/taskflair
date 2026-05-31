<?php

namespace Taskflair\Http;

use Taskflair\Http\Request;



class App
{
    public Route $Router;
    private \Taskflair\core\Container $container;

    public function __construct(Route $Router, \Taskflair\core\Container $container)
    {
        $this->Router = $Router;
        $this->container = $container;
    }

    public function execute()
    {
        $method = $this->Router->CurrentMethod;
        $uri = $this->Router->CurrentUri;

        if (isset(Route::$routes[$method][$uri])) {
            $action = Route::$routes[$method][$uri];
            
            // Get Request instance from the container
            $request = $this->container->get(Request::class);

            if (is_callable($action)) {
                call_user_func($action, $request);
            } elseif (is_array($action)) {
                [$controllerClass, $methodName] = $action;
                
                // Resolve controller instance via DI container (constructor injection)
                $controllerInstance = $this->container->get($controllerClass);
                
                // Execute the instance method and inject request
                call_user_func([$controllerInstance, $methodName], $request);
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
