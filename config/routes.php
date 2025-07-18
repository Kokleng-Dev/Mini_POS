<?php

$routes = [
    // '/migrate' => ['method' => 'GET','controller' => 'MigrationController','action' => 'migrate'],
    // '/rollback' => ['method' => 'GET','controller' => 'MigrationController','action' => 'rollback'],



    '/' => ['method' => 'GET','controller' => 'HomeController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/auth/login' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'login'],
    '/auth/login_form' => ['method' => 'POST','controller' => 'AuthController', 'action' => 'login_post'],
   
    '/auth/logout' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'logout', 'middleware' => 'AuthMiddleware'],


    '/product' => ['method' => 'GET','controller' => 'ProductController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/user' => ['method' => 'GET','controller' => 'UserController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/user/create' => ['method' => 'GET','controller' => 'UserController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],
    '/user/store' => ['method' => 'POST','controller' => 'UserController', 'action' => 'store', 'middleware' => 'AuthMiddleware'],
    '/user/edit' => ['method' => 'GET','controller' => 'UserController', 'action' => 'edit', 'middleware' => 'AuthMiddleware'],
    '/user/update' => ['method' => 'POST','controller' => 'UserController', 'action' => 'update', 'middleware' => 'AuthMiddleware'],
    '/user/delete' => ['method' => 'GET','controller' => 'UserController', 'action' => 'delete', 'middleware' => 'AuthMiddleware'],


];


