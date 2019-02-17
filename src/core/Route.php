<?php
namespace JustusParser\core;

use JustusParser\controllers;

class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1]) ) {
            $controller_name = $routes[1];
        }

        $controller_name = 'Controller_'.ucfirst($controller_name);
        $controller_file = strtolower($controller_name).'.php';
        $controller_name = '\JustusParser\controllers\\'.ucfirst($controller_name);
        
        if (class_exists($controller_name)) {
            $controller = new $controller_name();
        } else {
            Route::errorPage404();
        }

        $controller->actionIndex();
    }

    function errorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
