<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function __construct($routes)
    {
        session_start();
        $this->routes = $routes;
    }


    public function dispatch($uri)
    {

        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';


        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        $route = $this->routes[$uri];
        $method = $route['method'];
        $controllerName = $route['controller'];
        $action = $route['action'];
        $middleware = isset($route['middleware']) ? $route['middleware'] : null;


        if ($method !== $_SERVER['REQUEST_METHOD']) {
            http_response_code(405);
            echo "405 Method Not Allowed";
            return;
        }

        if ($middleware) {
            $middlewareClass = "\\App\\Middleware\\$middleware";
            require_once __DIR__ . "/../app/Middleware/$middleware.php";
            $middleware = new $middlewareClass();
            $middleware->handle();
        }

        $controllerClass = "\\App\\Controllers\\$controllerName";

        require_once __DIR__ . "/../app/Controllers/$controllerName.php";

        $controller = new $controllerClass();
        $controller->$action();

    }
}


