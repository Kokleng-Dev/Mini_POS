<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Customer.php';
require_once __DIR__ . '/../models/OrderDetail.php';

use Core\BaseController;
use App\Models\Order;
use App\Models\OrderDetail;
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

      $product_has_orders = isset($_GET['product_has_orders']) ? json_decode($_GET['product_has_orders'], true) : [];

      // var_dump($product_has_orders);
      // die();
      if(isset($_GET['product_id']) && isset($_GET['qty'])){
        $found = false;
        foreach ($product_has_orders as $index => $product) {
          // for delete existing order
          if(isset($_GET['deleteId']) && $index == $_GET['deleteId']) {
            unset($product_has_orders[$index]);
            $product_has_orders = array_values($product_has_orders); // Re-index the array
            $found = true;
            break;
          }

          // for add-ons if the product already exists in the order
          if ($product['id'] == $_GET['product_id']) {
            $product_has_orders[$index]['qty'] += $_GET['qty'];
            $product_has_orders[$index]['total'] = $product_has_orders[$index]['price'] * $product_has_orders[$index]['qty'];
            $found = true;
            break;
          }
        }
        // for new product addition
        if (!$found) {
          $product = $product_model->findById($_GET['product_id']);
          $product_has_orders[] = ['id' => $_GET['product_id'], 'qty' => $_GET['qty'], 'name' => $product['name'], 'price' => $product['price'], 'total' => $product['price'] * $_GET['qty']];
        }
      }

      $this->render('orders/create',['products' => $products, 'customers' => $customers, 'product_has_orders' => $product_has_orders],'Create Order');
    }


    public function store(){
      $product_has_orders = isset($_POST['product_has_orders']) ? json_decode($_POST['product_has_orders'], true) : [];
      $sub_total = isset($_POST['sub_total']) ? $_POST['sub_total'] : 0;
      $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : null;

      if(empty($product_has_orders) || empty($customer_id)) {
        $this->redirect('/order/create',200,['status'=> 'error', 'message' => 'Please add products and select a customer before submitting the order.']);
        return;
      }

      $data = [
        'customer_id' => $customer_id,
        'order_date' => date('Y-m-d H:i:s'),
        'order_code' => 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999),
        'total' => $sub_total,
        'created_by' => $_SESSION['auth']->id
      ];
      $order = new Order();
      $store = $order->create($data);
      if($store){
        $order_id = $store;
        $order_detail_model = new OrderDetail();
        $product_model = new Product();
        foreach ($product_has_orders as $order_item) {
          // decrease product stock
          $product = $product_model->findById($order_item['id']);
          // if ($product['qty'] < $order_item['qty']) {
          //   $this->redirect('/order/create',200,['status' => 'error', 'message' => 'Product ' . $product['name'] . ' is out of stock.']);
          //   return;
          // }
          $product_model->update($order_item['id'], ['qty' => $product['qty'] - $order_item['qty']]);
          // create order detail
          $order_detail_model->create([
            'order_id' => $order_id,
            'product_id' => $order_item['id'],
            'quantity' => $order_item['qty'],
            'price' => $order_item['price'],
          ]);
        }
        $this->redirect("/order/invoice?id=$order_id",200);
      } else {
        $this->redirect('/order/create',200,['status' => 'error', 'message' => 'Order not created']);
      }
    }

    public function invoice()
    {
      $order_id = $_GET['id'];
      $order_model = new Order();
      $order = $order_model->db->query(
        "SELECT orders.*, customers.name as customer_name FROM orders 
         JOIN customers ON customers.id = orders.customer_id 
         WHERE orders.id = $order_id LIMIT 1"
      );
      $order = $order->fetch_assoc();

      $order_detail_model = new OrderDetail();
      $details = $order_detail_model->product_with_order_id($order_id);


      $this->render('orders/invoice', ['order' => $order, 'order_details' => $details], 'Order Invoice');
    }

    public function delete()
    {
      $id = $_GET['id'];
      $order_model = new Order();
      $order = $order_model->findById($id);
      if(!$order) {
        $this->redirect('/order',200,['status' => 'error', 'message' => 'Order not found']);
        return;
      }

       // delete order
      $order_model->delete($id);
      // delete order details
      $order_detail_model = new OrderDetail();
      $details = $order_detail_model->product_with_order_id($id);
      foreach ($details as $detail) {
        $order_detail_model->delete($detail['id']);
      }
     
      $this->redirect('/order',200,['status' => 'success', 'message' => 'Order deleted successfully']);
    }
}


