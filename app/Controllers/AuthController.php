<?php

namespace App\Controllers;
require_once __DIR__ . '/../../core/BaseController.php';
require_once __DIR__ . '/../models/User.php';

use Core\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
   public function login(){
    if(isset($_SESSION['auth'])){
      $this->redirect('/',200);
    }
    $this->render('auth/login');
   }

   public function login_post(){
    if (!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
        $this->redirect('/auth/login',200,['status' => 'error', 'message' => 'All fields are required']);
    }


      $username = $_POST['username'];
      $password = $_POST['password'];

      // check if user is exist or not
      $u_model = new User();
      $user = $u_model->findFirst(['username' => $username, 'password' => $password]);

      if(!$user) {
        $this->redirect('/auth/login',200,['status' => 'error', 'message' => 'User not found']);
      }
      
      $_SESSION['auth'] = $user;
      $this->redirect('/',200, ['status' => 'success', 'message' => "Welcome to Mini POS"]);
   }

   public function logout(){
      unset($_SESSION['auth']);

      $this->redirect('/auth/login',200,['status' => 'success', 'message' => 'You are logged out']);
   }
}


