<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-box"></i> Create Product</h3></div>
  <div class="card-body">
    <form action="/product/store" method="POST" enctype="multipart/form-data">
      <div class="mb-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
      </div>
        <div class="mb-2">
        <label for="product_category" class="form-label">Category</label>
        <select name="product_category_id" id="product_category" required class="form-select">
          <option value="">Please Select</option>
          <?php foreach($categories as $cat){?>
            <option value="<?= $cat['id']; ?>"><?= $cat['name'];?></option>
          <?php }?>
        </select>
      </div>
      <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
        <div class="mb-2">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
      </div>
       <div class="mb-2">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" name="qty" id="qty" class="form-control" required>
      </div>
          <div class="mb-2">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
      </div>
      <div class="mb-2 text-end">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Submit</button>
      </div>
    </form>
  </div>
</div>
