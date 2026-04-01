<?php 
    namespace taskflair\core;

    class viewCompiler {

    private static string $view_path;
    private static array $directevs = [];

    public function __construct(string $view_path) {
        $this->view_path = $view_path;

        $this->directive('static', function ($file) {
    
        });
        
    }

    public function directive($name, callable $handler)
    {
        self::$directevs[$name] = $handler;
    }

    public static function compile(string $content) {
        $content_pattern = "";
        if (!empty($content)) {
            return preg_replace_callback($content_pattern , function (array $matches) {
                $ActionName = matches[1];

                if (isset(self::$directevs[$ActionName])) {

                }
            }, $content);
        }
    }
    
    }