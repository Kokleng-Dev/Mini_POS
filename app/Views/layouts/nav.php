<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mini POS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/' ? 'text-primary' : ''; ?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/product' ? 'text-primary' : ''; ?>" href="/product">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/category' ? 'text-primary' : ''; ?>" href="/category">Category</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/order' ? 'text-primary' : ''; ?>" href="/order">Order</a>
        </li>
          <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/user' ? 'text-primary' : ''; ?>" href="/user">User</a>
        </li>
      </ul>
      <div class="ms-auto">
        <a href="/auth/logout" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
      </div>
    </div>
  </div>
</nav>
<div class="bg-primary-subtle text-end mb-3">
  <small class="p-2"><i class="fa-regular fa-user"></i> <?php echo $_SESSION['auth']->name;?></small>
</div>


