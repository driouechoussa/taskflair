<?php 
    namespace Taskflair\core;

    class viewCompiler {

    private static string $view_path;
    private static array $directives = [];

    public function __construct(string $view_path) {
        self::$view_path = $view_path;

        $this->directive('static', function ($file) {
            $file = trim($file, "'\"");
            return '/assets/'. $file;
        });
        
    }

    private function directive($name, $Action) {
        self::$directives[$name] = $Action;
    }

    public static function compile() {
        // convert the provided content into a pure php syntax and save it as an unique php file 
        // convert functions 
        $content = file_get_contents(self::$view_path);

        return $content;
        

    }

    public static function render() {
        
    }
    
    }