<?php

use Core\App;
use Core\Router;

$router = new Router();

$router->get('/', ["Controllers\HomeController", "index"]);

$router->get('/contact', ["Controllers\HomeController", "contact"]);

(new App($router,['uri' => $_SERVER['REQUEST_URI'],'method' => $_SERVER['REQUEST_METHOD']]))->run();