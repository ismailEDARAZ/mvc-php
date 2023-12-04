<?php

namespace Core;

use Exceptions\RouteNotFoundException;
use Core\Router;

class App 
{
    public Router $router;
    public array $request;

    public function __construct($router, $request)
    {
        $this->router = $router;
        $this->request = $request;
    }

    public function run()
    {
        try{
            echo $this->router->resolve($this->request['uri'],$this->request['method']);
        }catch(RouteNotFoundException $e){
            echo $e->getMessage();
        }
    }
}