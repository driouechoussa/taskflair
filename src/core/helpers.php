<?php

    use Buildilume\core\viewCompiler;
    use Buildilume\Http\Route;

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
            return Buildilume\Http\Route::getRouteByName($name);
        }
    }

    if (!function_exists('env')) {
        function env(string $env_key, $default = null) {
            static $variables = [];

            if (empty($variables)) {
                $env_file = BASE_PATH . '/.env';
                if (file_exists($env_file)) {
                    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($lines as $line) {
        
                        if (strpos(trim($line), '#') === 0) continue;

                        if (strpos($line, '=') !== false) {
                            list($name, $value) = explode('=', $line, 2);
                            $name = trim($name);
                            $value = trim($value, "\"' \t\n\r\0\x0B");

                            $variables[$name] = $value;
                        }
                    }
                }
            }

            return $variables[$env_key] ?? $default;
        }
    }