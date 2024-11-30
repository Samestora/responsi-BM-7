<?php

namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?'); // Get URI without query string
        $method = $_SERVER['REQUEST_METHOD']; // Get request method

        if (isset($this->routes[$method][$uri])) {
            // If route exists, extract and call controller/action
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        }else {
            // If no route matches, render the 404 page
            http_response_code(404); // Set HTTP status to 404
            header("Location: /404"); // Render custom 404 page
            exit(); // Stop further execution
        }
    }
}