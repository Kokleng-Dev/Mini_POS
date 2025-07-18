<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-user"></i> Update User</h3></div>
  <div class="card-body">
    <form action="/user/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $user['id'];?>">
      <div class="mb-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
      </div>
      <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'];?>" required>
      </div>
        <div class="mb-2">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'];?>" required>
      </div>
          <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" id="password" class="form-control" value="<?= $user['password'];?>" required>
      </div>
      <div class="mb-2 text-end">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update</button>
      </div>
    </form>
  </div>
</div>
