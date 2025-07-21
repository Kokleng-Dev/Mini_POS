<?php

namespace App\Models;

include_once __DIR__ . '/../../core/BaseModel.php';
include_once __DIR__ . '/Customer.php';

use Core\BaseModel;
use App\Models\Customer;

class Order extends BaseModel
{
    public function __construct()
    {
      parent::__construct('orders');
    }
    public function customer(){
      return $this->belongsTo(Customer::class, 'id','customer_id', 'orders.*, customers.name as customer_name');
    }
}


