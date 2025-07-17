<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';

use Core\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->render('home');
    }

    public function test(){
        $this->render('home',['message' => 'testing']);
    }
}


