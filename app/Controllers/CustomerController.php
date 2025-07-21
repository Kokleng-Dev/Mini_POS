<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../Models/Customer.php';
require_once __DIR__ . '/../Models/Order.php';

use Core\BaseController;
use App\Models\Customer;
use App\Models\Order;

class CustomerController extends BaseController
{
    public function index()
    {
        $customers = new Customer();
        $query = $customers->all();

        $this->render('customers/index',['customers' => $query],'List of Customers');
    }

     public function create()
    {
        $this->render('customers/create',[],'Create Customer');
    }
    public function store()
    {
      try {
        $data = [
          'name' => $_POST['name'],
          'address' => $_POST['address'],
          'contact' => $_POST['contact'],
          'created_by' => $_SESSION['auth']->id
        ];
        $model = new Customer();
        $store = $model->create($data);
        if($store){
          $this->redirect('/customer',200,['status' => 'success', 'message' => 'Customer created successfully']);
        } else {
          $this->redirect('/customer',200,['status' => 'error', 'message' => 'Customer not created']);
        }
      } catch (\Throwable $th) {
        $this->redirect('/customer/create',200,['status' => 'error', 'message' => $th->getMessage()]);
      }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $model = new Customer();
        $data = $model->findById($id);

        $this->render('customers/edit',['customer' => $data],'Edit Customer');
    }

    public function update()
    {
      $id = $_POST['id'];
      $data = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'contact' => $_POST['contact'],
        'updated_by' => $_SESSION['auth']->id
      ];
      $model = new Customer();
      $update = $model->update($id,$data);

      $this->redirect('/customer',200,['status' => 'success', 'message' => 'Customer updated successfully']);

    }

    public function delete()
    {
       try {
          $id = $_GET['id'];
          // checking product under this id 
          $order_model = new Order();
          $find = $order_model->findFirst(['customer_id' => $id]);
          if($find){
            $this->redirect('/customer',200,['status' => 'error', 'message' => 'Cannot delete customer, there are orders associated with this customer']);
            exit();
          }

          $customer_model = new Customer();
          $customer_model->delete($id);
          $this->redirect('/customer',200,['status' => 'success', 'message' => 'Customer deleted successfully']);
       } catch (\Throwable $th) {
          $this->redirect('/customer',200,['status' => 'error', 'message' => $th->getMessage()]);
       }
    }
}


