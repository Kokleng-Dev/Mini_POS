<div class="vh-100 d-flex justify-content-center align-items-center">
  <div class="card bg-white">
    <div class="card-header text-center">
      <h3 clas="m-0 text-primary">Login</h3>
    </div>
    <div class="card-body">
     <?php include_once __DIR__ . '/../layouts/alert.php'; ?>
      <form action="/auth/login_form" method="POST">
        <div class="mb-3">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control form-control-lg" required>
        </div>
         <div class="mb-3">
          <label for="password">Password</label>
          <input type="text" name="password" id="password" class="form-control form-control-lg" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>
