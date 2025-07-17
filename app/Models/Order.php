<?php

namespace App\Models;

include_once __DIR__ . '/../../core/BaseModel.php';

use Core\BaseModel;

class Order extends BaseModel
{
    public function __construct()
    {
      parent::__construct('orders');
    }
}


