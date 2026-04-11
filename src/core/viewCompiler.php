<?php

namespace Taskflair\core;

class viewCompiler
{

    private static array $directives = [];
    
    private const DIRECTIVE_FUNC_PATTERN = '/@([a-zA-Z0-9_]+)\s*\((.*?)\)/';

    public function __construct()
    {

        $this->directive('get_static', function ($expression) {
            return "<?php echo '/assets/' . " . $expression . "; ?>";
        }); 

        $this->directive('site_name', function ($name) {
            return "<?php echo " . $name . "; ?>";
        });

        $this->directive('route', function ($expression) {
            return "<?php echo route(" . $expression . "); ?>";
        });

        $this->directive('insert', function ($path) {
            $view = trim(str_replace(['\'', '"'], '', $path));
            if (str_ends_with($view, ".view.php")) {
                $view_file = BASE_PATH . "/views/" . $view;
            } else {
                $view_file = BASE_PATH . "/views/" . $view . ".view.php";
            }
            if (self::compile($view_file)) {
                $compiled_file = BASE_PATH . "/runtime/app/views/" . md5($view_file) . ".php";
                return file_get_contents($compiled_file);
            }
            return "";
        });
    }

    private function directive($name, $Action)
    {
        self::$directives[$name] = $Action;
    }

    private static function compile(string $content_path)
    {
        if (file_exists($content_path)) {
            $content = file_get_contents($content_path);
            $content = preg_replace_callback(
                self::DIRECTIVE_FUNC_PATTERN,
                function ($matches) {
                    $directive_name = $matches[1];

                    if (isset(self::$directives[$directive_name])) {
                        return call_user_func(self::$directives[$directive_name], $matches[2]);
                    }
                    return $matches[0];
                },
                $content
            );

            $runtime_dir = BASE_PATH . "/runtime/app/views/";
            if (!is_dir($runtime_dir)) {
                mkdir($runtime_dir, 0777, true);
            }

            file_put_contents($runtime_dir . md5($content_path) . ".php", $content);
            return true;
        }
        return false;
    }

    public static function render(string $view_path)
    {
        if (self::compile($view_path)) {
            require BASE_PATH . "/runtime/app/views/" . md5($view_path) . ".php";
        } else {
            echo "View not found";
        }
    }
}
