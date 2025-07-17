<?php

$routes = [
    // '/migrate' => ['method' => 'GET','controller' => 'MigrationController','action' => 'migrate'],
    // '/rollback' => ['method' => 'GET','controller' => 'MigrationController','action' => 'rollback'],



    '/' => ['method' => 'GET','controller' => 'HomeController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/auth/login' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'login'],
    '/auth/login_form' => ['method' => 'POST','controller' => 'AuthController', 'action' => 'login_post'],
   
    '/auth/logout' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'logout', 'middleware' => 'AuthMiddleware'],



];


