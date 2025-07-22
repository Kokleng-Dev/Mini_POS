<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Customer.php';
require_once __DIR__ . '/../models/User.php';

use Core\BaseController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;

class HomeController extends BaseController
{
    public function index()
    {
        $product_model = new Product();
        $order_model = new Order();
        $customer_model = new Customer();
        $user_model = new User();

        $total_products = count($product_model->all());
        $total_orders = count($order_model->all());
        $total_customers = count($customer_model->all());
        $total_users = count($user_model->all());
        $this->render('home', [
            'total_products' => $total_products,
            'total_orders' => $total_orders,
            'total_customers' => $total_customers,
            'total_users' => $total_users
        ], 'Dashboard');
    }

}


