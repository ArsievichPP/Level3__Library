<?php

namespace app\core;

class Router
{
    protected static $routes = array(); // all added routes
    protected static $route = array(); // current route

    /**
     * adds a route to the list of routes
     * @param $regexp - regular expression
     * @param array $route ['controller'=>'name', 'action' => 'name' ...]
     */
    public static function addRoute($regexp, $route = array())
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Check url for pattern matching.
     * @param $url - request url
     * @return bool 'true' if a match was found, otherwise 'false'
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * searches in the required controller and method according to the requested url address
     * @param $url
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);

        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';

            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::$route['action'];

                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    header('HTTP/1.1 404 Method Not Found');
                }

            } else {
                header('HTTP/1.1 404 Controller Not Found');
            }

        } else {
            header('HTTP/1.1 404 Page Not Found');
        }
    }

    /**
     * removes all explicit get parameters
     * @param $url - request url
     * @return string
     */
    public static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }
        return '';
    }
}
