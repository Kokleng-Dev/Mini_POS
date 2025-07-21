<?php

$routes = [
    // '/migrate' => ['method' => 'GET','controller' => 'MigrationController','action' => 'migrate'],
    // '/rollback' => ['method' => 'GET','controller' => 'MigrationController','action' => 'rollback'],



    '/' => ['method' => 'GET','controller' => 'HomeController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/auth/login' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'login'],
    '/auth/login_form' => ['method' => 'POST','controller' => 'AuthController', 'action' => 'login_post'],
   
    '/auth/logout' => ['method' => 'GET','controller' => 'AuthController', 'action' => 'logout', 'middleware' => 'AuthMiddleware'],



    '/category' => ['method' => 'GET','controller' => 'ProductCategoryController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/category/create' => ['method' => 'GET','controller' => 'ProductCategoryController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],
    '/category/store' => ['method' => 'POST','controller' => 'ProductCategoryController', 'action' => 'store', 'middleware' => 'AuthMiddleware'],
    '/category/edit' => ['method' => 'GET','controller' => 'ProductCategoryController', 'action' => 'edit', 'middleware' => 'AuthMiddleware'],
    '/category/update' => ['method' => 'POST','controller' => 'ProductCategoryController', 'action' => 'update', 'middleware' => 'AuthMiddleware'],
    '/category/delete' => ['method' => 'GET','controller' => 'ProductCategoryController', 'action' => 'delete', 'middleware' => 'AuthMiddleware'],

    '/product' => ['method' => 'GET','controller' => 'ProductController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/product/create' => ['method' => 'GET','controller' => 'ProductController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],
    '/product/store' => ['method' => 'POST','controller' => 'ProductController', 'action' => 'store', 'middleware' => 'AuthMiddleware'],
    '/product/edit' => ['method' => 'GET','controller' => 'ProductController', 'action' => 'edit', 'middleware' => 'AuthMiddleware'],
    '/product/update' => ['method' => 'POST','controller' => 'ProductController', 'action' => 'update', 'middleware' => 'AuthMiddleware'],
    '/product/delete' => ['method' => 'GET','controller' => 'ProductController', 'action' => 'delete', 'middleware' => 'AuthMiddleware'],
    
    '/user' => ['method' => 'GET','controller' => 'UserController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/user/create' => ['method' => 'GET','controller' => 'UserController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],
    '/user/store' => ['method' => 'POST','controller' => 'UserController', 'action' => 'store', 'middleware' => 'AuthMiddleware'],
    '/user/edit' => ['method' => 'GET','controller' => 'UserController', 'action' => 'edit', 'middleware' => 'AuthMiddleware'],
    '/user/update' => ['method' => 'POST','controller' => 'UserController', 'action' => 'update', 'middleware' => 'AuthMiddleware'],
    '/user/delete' => ['method' => 'GET','controller' => 'UserController', 'action' => 'delete', 'middleware' => 'AuthMiddleware'],



    '/customer' => ['method' => 'GET','controller' => 'CustomerController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/customer/create' => ['method' => 'GET','controller' => 'CustomerController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],
    '/customer/store' => ['method' => 'POST','controller' => 'CustomerController', 'action' => 'store', 'middleware' => 'AuthMiddleware'],
    '/customer/edit' => ['method' => 'GET','controller' => 'CustomerController', 'action' => 'edit', 'middleware' => 'AuthMiddleware'],
    '/customer/update' => ['method' => 'POST','controller' => 'CustomerController', 'action' => 'update', 'middleware' => 'AuthMiddleware'],
    '/customer/delete' => ['method' => 'GET','controller' => 'CustomerController', 'action' => 'delete', 'middleware' => 'AuthMiddleware'],

    '/order' => ['method' => 'GET','controller' => 'OrderController', 'action' => 'index', 'middleware' => 'AuthMiddleware'],
    '/order/create' => ['method' => 'GET','controller' => 'OrderController', 'action' => 'create', 'middleware' => 'AuthMiddleware'],

];


