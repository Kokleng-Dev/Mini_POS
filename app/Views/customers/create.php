<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-user"></i> Create Customer</h3></div>
  <div class="card-body">
    <form action="/customer/store" method="POST" enctype="multipart/form-data">
       
      <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <div class="mb-2">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control" required>
      </div>

      <div class="mb-2">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" name="contact" id="contact" class="form-control" required>
      </div>
 
      <div class="mb-2 text-end">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Submit</button>
      </div>
    </form>
  </div>
</div>
