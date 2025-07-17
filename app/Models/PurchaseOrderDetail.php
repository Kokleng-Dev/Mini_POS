<?php

namespace App\Models;

include_once __DIR__ . '/../../core/BaseModel.php';

use Core\BaseModel;

class PurchaseOrderDetail extends BaseModel
{
    public function __construct()
    {
      parent::__construct('purchase_order_details');
    }
}


