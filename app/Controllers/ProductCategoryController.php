<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../Models/ProductCategory.php';
require_once __DIR__ . '/../Models/Product.php';

use Core\BaseController;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductCategoryController extends BaseController
{
    public function index()
    {
        $categories = new ProductCategory();
        $query = $categories->all();

        $this->render('product_categories/index',['categories' => $query],'Product Category');
    }

     public function create()
    {
        $this->render('product_categories/create',[],'Create Product Category');
    }
    public function store()
    {
      try {
        $data = [
          'name' => $_POST['name'],
          'created_by' => $_SESSION['auth']->id
        ];
        $cat = new ProductCategory();
        $store = $cat->create($data);
        if($store){
          $this->redirect('/category',200,['status' => 'success', 'message' => 'Product Category created successfully']);
        } else {
          $this->redirect('/category',200,['status' => 'error', 'message' => 'Product Category not created']);
        }
      } catch (\Throwable $th) {
        $this->redirect('/category/create',200,['status' => 'error', 'message' => $th->getMessage()]);
      }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $cat = new ProductCategory();
        $data = $cat->findById($id);

        $this->render('product_categories/edit',['category' => $data],'Edit Product Category');
    }

    public function update()
    {
      $id = $_POST['id'];
      $data = [
        'name' => $_POST['name'],
        'updated_by' => $_SESSION['auth']->id
      ];
      $cat = new ProductCategory();
      $update = $cat->update($id,$data);

      $this->redirect('/category',200,['status' => 'success', 'message' => 'Product Category updated successfully']);

    }

    public function delete()
    {
       try {
          $id = $_GET['id'];
          $cat = new ProductCategory();
          // checking product under this id 
          $product = new Product();
          $find = $product->findFirst(['product_category_id' => $id]);
          if($find){
            $this->redirect('/category',200,['status' => 'error', 'message' => 'Product Category cannot be deleted, it has products under it']);
            exit();
          }
          $cat->delete($id);
          $this->redirect('/category',200,['status' => 'success', 'message' => 'Product Category deleted successfully']);
       } catch (\Throwable $th) {
          $this->redirect('/category',200,['status' => 'error', 'message' => $th->getMessage()]);
       }
    }
}


