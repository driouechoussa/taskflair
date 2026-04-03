<?php

    use Taskflair\core\viewCompiler;

    if (!function_exists('make_view')) {
        function make_view(string $view, ?array $context = []) {
            $view = trim($view);
            
            // Check if user already provided .view.php or not
            if (str_ends_with($view, ".view.php")) {
                $view_file = BASE_PATH . "/views/" . $view;
            } else {
                $view_file = BASE_PATH . "/views/" . $view . ".view.php";
            }
            
            // Compile and render the view if the file exists
            if (file_exists($view_file)) {
                new viewCompiler($view_file);
                
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