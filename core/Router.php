<?php

namespace App\Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static; // create it's own instance
        require $file;

        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    // /* not used anymore can be deleted */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /* processes the post requests */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /* processes the post requests */
    public function direct($uri, $request_type)
    {
        if (array_key_exists($uri, $this->routes[$request_type])) {
            // PagesController@home -> need to split it and have PagesController
            // and home or any method using explode()
            // die($this->routes[$request_type][$uri]);
            // ... => splat operator - converts an array to parameters
            return $this->callAction(
                ...explode('@', $this->routes[$request_type][$uri])
            );
        }

        throw new Exception('Error Processing Request. No Such URI', 1);
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;
        if (!method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond to the {$action} action", 1);
        }

        return $controller->$action();
    }
}
