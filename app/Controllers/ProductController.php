<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';

use Core\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $this->render('product');
    }

}


