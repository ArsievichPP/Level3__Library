<?php
error_reporting(-1);  // for debug

use app\core\Router;

//  declaration of constants
define('PUBLIC', __DIR__);
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'layout_main');
require ROOT . '/config/settings.php';
// -------------------------

$query = $_SERVER['QUERY_STRING']; // save request url

// autoload function
spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});
//-----------------

// add all routes
$routes = require ROOT . '/config/routes.php';
foreach ($routes as $route) {
    Router::addRoute($route['pattern'], $route['route']);
}
//------------------

Router::dispatch($query);

