<?php

namespace App\Models;

include_once __DIR__ . '/../../core/BaseModel.php';
include_once __DIR__ . '/Product.php';

use Core\BaseModel;
use App\Models\Product;

class OrderDetail extends BaseModel
{
    public function __construct()
    {
      parent::__construct('order_details');
    } 

    public function product_with_order_id($order_id)
    {
      return $this->belongsToWhere(Product::class, 'id', 'product_id', 'order_details.*, products.name as product_name', 'order_id', $order_id);
    }
}


