<?php

    namespace Taskflair\Http;

    use App\Controllers\homeController;

    class Route {

        public static array $routes = [];
        public  string $CurrentMethod;
        public  string $CurrentUri;

        private static string $controller; // get controller name
        private static string $controller_method; // get method name

        public function __construct() {
            $this->CurrentMethod = self::Request_method();     
            $this->CurrentUri = self::Request_uri();    
        }

        // Store the Route Elements
        public static function setRoute(string|int $RouteTarget , callable|array $RouteAction) {

            if (is_callable($RouteAction) || self::ValidateRouterArray($RouteAction)) {
                self::$routes[self::Request_method()][$RouteTarget] = $RouteAction;
            }   
            if (self::ValidateRouterArray($RouteAction) && !is_callable($RouteAction)) {
                self::$routes[self::Request_method()][$RouteTarget] = $RouteAction;
            }
        }

         // Uri handling
        private static function Request_uri() {
            if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != null) {
                return parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
            }
            else {
                return '/';
            }
        }
        
        // Specify the Method Type
        private static function Request_method() {
            if (isset($_SERVER['REQUEST_METHOD'])) {
                return strtoupper($_SERVER['REQUEST_METHOD']);
            }else {
                return 'GET';
            }
        }

        // CallBack Array

        private static function ValidateRouterArray(Array $CallBackArray) {

            if (is_array($CallBackArray) && count($CallBackArray) === 2) {

                [self::$controller  , self::$controller_method] = $CallBackArray;

                if (class_exists(self::$controller) && method_exists(self::$controller , self::$controller_method)) {
                    return true;
                }
            }
            else {
                return false;
            }
            
            
        }
    }