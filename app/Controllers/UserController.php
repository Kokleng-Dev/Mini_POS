<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../Models/User.php';

use Core\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $users = new User();
        $query = $users->db->query("SELECT * FROM users WHERE active = 1")->fetch_all(MYSQLI_ASSOC);
        $this->render('users/index',['users' => $query]);
    }

    public function create()
    {
        $this->render('users/create');
    }
    public function store()
    {
      try {
        $data = [
          'username' => $_POST['username'],
          'password' => $_POST['password'],
          'name' => $_POST['name'],
          'created_by' => $_SESSION['auth']->id
        ];
        $user = new User();
        $store = $user->create($data);
        if($store){
          $this->redirect('/user',200,['status' => 'success', 'message' => 'User created successfully']);
        } else {
          $this->redirect('/user',200,['status' => 'error', 'message' => 'User not created']);
        }
      } catch (\Throwable $th) {
        $this->redirect('/user/create',200,['status' => 'error', 'message' => $th->getMessage()]);
      }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = new User();
        $data = $user->findById($id);
        $this->render('users/edit',['user' => $data]);
    }

    public function update()
    {
      $id = $_POST['id'];
      $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],
        'updated_by' => $_SESSION['auth']->id
      ];
      $user = new User();
      $update = $user->update($id,$data);

      $this->redirect('/user',200,['status' => 'success', 'message' => 'User updated successfully']);

    }

    public function delete()
    {
       try {
          $id = $_GET['id'];
          $user = new User();
          $user->update($id,['active' => 0]);
          $this->redirect('/user',200,['status' => 'success', 'message' => 'User deleted successfully']);
       } catch (\Throwable $th) {
          $this->redirect('/user',200,['status' => 'error', 'message' => $th->getMessage()]);
       }
    }
}


