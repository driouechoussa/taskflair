<?php

    namespace Buildilume\Http;
    class Route {

        public static array $routes = [];
        public static array $names = [];
        private static string $lastRoute; // store last route

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
            $routes = strval($RouteTarget);

            if (!str_starts_with($routes , '/')) {
                $routes = '/' . $routes;
            }
            if (is_callable($RouteAction) || self::ValidateRouterArray($RouteAction)) {
                self::$routes[self::Request_method()][$routes] = $RouteAction;
                self::$lastRoute = $routes;
                return new self();
            }   
        }

        public function name(string $name) {
            if (isset(self::$lastRoute)) {
                self::$names[$name] = self::$lastRoute;
            }
            return $this;
        }

        public static function getRouteByName(string $name) {
            if (isset(self::$names[$name])) {
                return self::$names[$name];
            }
            return "#route_not_found_" . $name;
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

        private static function ValidateRouterArray(array $CallBackArray) {

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