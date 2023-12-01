<?php

use Core\App;
use Router\Router;

require './vendor/autoload.php';
define('VIEW_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$router = new Router();

$router->get('/', ["Controllers\HomeController", "index"]);

$router->get('/contact', ["Controllers\HomeController", "contact"]);

(new App($router,['uri' => $_SERVER['REQUEST_URI'],'method' => $_SERVER['REQUEST_METHOD']]))->run();