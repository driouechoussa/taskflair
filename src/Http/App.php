<?php

namespace Taskflair\Http;



class App
{

    public Route $Router;

    public function __construct(Route $Router)
    {
        $this->Router = $Router;
    }


    public function execute()
    {
        $method = $this->Router->CurrentMethod;
        $uri = $this->Router->CurrentUri;

        if (isset(Route::$routes[$method][$uri])) {
            $action = Route::$routes[$method][$uri];
            call_user_func($action);
        } else {
            http_response_code(404);
        }
    }
}
