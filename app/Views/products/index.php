<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-box"></i> Products</h3></div>
  <div class="card-body">
    <a href="/product/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Create</a>
    <table class="table table-sm table-bordered table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Photo</th>
          <th>Category</th>
          <th>Name</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody style="vertical-align: middle">
        <?php foreach($products as $index => $product) {?>
          <tr>
            <td><?= $index + 1;?></td>
            <td><?= $product['photo'];?></td>
            <td><?= $product['product_category_name'];?></td>
            <td><?= $product['name'];?></td>
            <td><?= $product['qty'];?></td>
            <td><?= $product['price'];?></td>
            <td>
              <a href="/product/edit?id=<?= $product['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i> Edit</a>
              <a href="/product/delete?id=<?= $product['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
