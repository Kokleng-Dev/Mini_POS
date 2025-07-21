<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-box"></i> Create Product Category</h3></div>
  <div class="card-body">
    <form action="/category/store" method="POST" enctype="multipart/form-data">
      <div class="mb-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
      </div>
       
      <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
 
      <div class="mb-2 text-end">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Submit</button>
      </div>
    </form>
  </div>
</div>
