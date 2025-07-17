<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../config/routes.php';


use Core\Router;

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_URI']);

