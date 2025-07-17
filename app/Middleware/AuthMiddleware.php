<?php

namespace App\Middleware;
require_once __DIR__ . '/../../core/BaseMiddleware.php';

use Core\BaseMiddleware;


class AuthMiddleware extends BaseMiddleware
{
    public function handle()
    {
        if(!isset($_SESSION['auth'])){
            $this->redirect('/auth/login',200,['status' => 'error', 'message' => 'You are not logged in']);
        }
    }
    
}


