<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-box"></i> Product Categories</h3></div>
  <div class="card-body">
    <a href="/category/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Create</a>
    <table class="table table-sm table-bordered table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody style="vertical-align: middle">
        <?php foreach($categories as $index => $cat) {?>
          <tr>
            <td><?= $index + 1;?></td>
            <td><?= $cat['photo'];?></td>
            <td><?= $cat['name'];?></td>
            <td>
              <a href="/category/edit?id=<?= $cat['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i> Edit</a>
              <a href="/category/delete?id=<?= $cat['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
