<?php

use Taskflair\core\viewCompiler;

    if (!function_exists('make_view')) {
        function make_view(string $view , ?array $context = []) {
            if (!is_int($view)) {
                if (str_ends_with($view , ".view.php")) {
                    $view_file = BASE_PATH . "/views/". trim(substr($view , 0 , -9)) . ".view.php";
                    require_once $view_file;
                    /*
                        new viewCompiler($viwe_file);
                    */
                }
                else if (!str_ends_with($view , ".view.php")) {
                    $view_file = BASE_PATH . "/views/". trim($view) . ".view.php";
                    require_once $view_file;
                }
            }
        }
    }