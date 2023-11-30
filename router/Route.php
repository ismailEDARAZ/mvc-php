<?php

class Route
{
    private $routes = array();

    public function add($route, $controller) {
        if (isset($this->routes[$route])) {
            throw new Exception("Route already exists: " . $route);
        } else {
            $this->routes[$route] = $controller;
        }
    }
    public function getController($url) {
        foreach ($this->routes as $key => $value) {
            // Check for a match against the URL. If we find one then we can return the controller to use.
            $pattern = str_replace('/', '\/', $key);
            preg_match("/^$pattern(\?.*)?$/", $url, $matches);
            if (!empty($matches)) {
                return $value;
            }
        }
        return false;
    }
                            
}