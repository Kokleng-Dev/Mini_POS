<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Customer.php';

use Core\BaseController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends BaseController
{
    public function index()
    {
        $model = new Order();
        $orders = $model->customer();
        $this->render('orders/index',['orders' => $orders],'Orders');
    }

    public function create()
    {
      $product_model = new Product();
      $products = $product_model->all();

      $customer_model = new Customer();
      $customers = $customer_model->all();

      $productIds = isset($_GET['product_id']) ? $_GET['product_id'] : [];

      $this->render('orders/create',['products' => $products, 'customers' => $customers, 'productIds' => $productIds],'Create Order');
    }

}


