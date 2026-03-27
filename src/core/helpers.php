<?php

 
    if (!function_exists('make_view')) {
        function make_view(string $view) {
            if (!is_int($view)) {
                $view_file = BASE_PATH . "/views/". $view . ".view.php";
                if (file_exists($view_file)) {
                    require_once $view_file;
                }
            }
        }
    }