<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/ProductCategory.php';

use Core\BaseController;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends BaseController
{
    public function index()
    {
        $product = new Product();
        $query = $product->categories();

        $this->render('products/index',['products' => $query],'Product');
    }

     public function create()
    {
        $product_categories = new ProductCategory();
        $categories = $product_categories->all();
        $this->render('products/create',['categories' => $categories],'Create Product');
    }
    public function store()
    {
      try {
        $data = [
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'product_category_id' => $_POST['product_category_id'],
          'description' => $_POST['description'],
          'qty' => $_POST['qty'],
          'created_by' => $_SESSION['auth']->id
        ];
        $product = new Product();
        $store = $product->create($data);
        if($store){
          $this->redirect('/product',200,['status' => 'success', 'message' => 'Product created successfully']);
        } else {
          $this->redirect('/product',200,['status' => 'error', 'message' => 'Product not created']);
        }
      } catch (\Throwable $th) {
        $this->redirect('/product/create',200,['status' => 'error', 'message' => $th->getMessage()]);
      }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = new Product();
        $data = $user->findById($id);

        $product_categories = new ProductCategory();
        $categories = $product_categories->all();
        $this->render('products/edit',['product' => $data, 'categories' => $categories],'Edit Product');
    }

    public function update()
    {
      $id = $_POST['id'];
      $data = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'product_category_id' => $_POST['product_category_id'],
        'description' => $_POST['description'],
        'updated_by' => $_SESSION['auth']->id
      ];
      $product = new Product();
      $update = $product->update($id,$data);

      $this->redirect('/product',200,['status' => 'success', 'message' => 'Product updated successfully']);

    }

    public function delete()
    {
       try {
          $id = $_GET['id'];
          $product = new Product();
          $product->delete($id);
          $this->redirect('/product',200,['status' => 'success', 'message' => 'Product deleted successfully']);
       } catch (\Throwable $th) {
          $this->redirect('/product',200,['status' => 'error', 'message' => $th->getMessage()]);
       }
    }
}


