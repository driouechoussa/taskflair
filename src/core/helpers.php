<?php

    use Taskflair\core\viewCompiler;
    use Taskflair\Http\Route;

    if (!function_exists('make_view')) {
        function make_view(string $view, ?array $context = []) {
            $view = trim($view);
            $file_compiled = new viewCompiler();  
            if (str_ends_with($view, ".view.php")) {
                $view_file = BASE_PATH . "/views/" . $view;
            } else {
                $view_file = BASE_PATH . "/views/" . $view . ".view.php";
            }
            
            if (file_exists($view_file)) {
                $file_compiled::render($view_file);
                
                // if (isset($compiled_path) && file_exists($compiled_path)) {
                //     if (!empty($context)) {
                //         extract($context);
                //     }
                //     require $compiled_path;
                // }
            } else {
                throw new \Exception("View file not found: {$view_file}");
            }
        }
    }

    if (!function_exists('route')) {
        function route(string $name) {
            return Taskflair\Http\Route::getRouteByName($name);
        }
    }