<?php

namespace App\Models;

include_once __DIR__ . '/../../core/BaseModel.php';
include_once __DIR__ . '/ProductCategory.php';

use Core\BaseModel;
use App\Models\ProductCategory;

class Product extends BaseModel
{
    public function __construct()
    {
      parent::__construct('products');
    }
    public function categories(){
      return $this->belongsTo(ProductCategory::class, 'id','product_category_id', 'products.*, product_categories.name as product_category_name');
    }
}


