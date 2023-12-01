<?php

namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $path, callable|array $action, $method): void
    {
        $this->routes[$method][$path] = $action;
    }

    public function get(string $path, callable|array $action) {
        $this->register($path, $action, 'GET');
    }

    public function post(string $path, callable|array $action) {
        $this->register($path, $action, 'POST');
    }

    public function resolve(string $uri, string $method): mixed
    {
        $path = explode('?', $uri)[0];
        $action = $this->routes[$method][$path] ?? null;

        if(is_array($action)){
            $controller = $action[0];
            $func = $action[1];
            
            if(class_exists($controller) && method_exists($controller,$func)){
                $class = new $controller();
                return call_user_func_array([$class,$func], []);
            }
        }

        if (is_callable($action)) {
            return $action();
        }

        throw new RouteNotFoundException();
    }
}