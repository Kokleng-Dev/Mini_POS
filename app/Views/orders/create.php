<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card">
  <div class="card-header">
    <h2 class="text-primary mb-0"><i class="fa fa-receipt"></i> Create Order</h2>
  </div>
  <div class="card-body">
    <form action="/order/create" method="GET">
      <div class="row">
        <div class="col">
          <div class="input-group">
            <span class="input-group-text">Customer</span>
            <select name="customer_id" class="form-select" required>
            <option value="">Select Customer</option>
            <?php foreach ($customers as $customer): ?>
              <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="col">
          <div class="input-group">
            <span class="input-group-text">Product</span>
            <select name="product_id[]" class="form-select" multiple required>
            <option value="">Select Product</option>
            <?php foreach ($products as $product): ?>
              <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="col">
          <button class="btn btn-primary w-100" type="submit"><i class="fa fa-plus"></i> Add</button>
        </div>
      </div>
    </form>

     <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr>
            <td>No</td>
            <td>Product</td>
            <td>Price</td>
            <td>Qty</td>
            <td>Total</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0;?>
          <?php foreach($products as $index => $product){ ?>
            <?php if (in_array($product['id'], $productIds) ){?>
              <input type="hidden" name="product[<?php echo $i;?>][id]" value="<?php echo $product['id'];?>">
              <tr>
                <td><?php echo ++$i;?></td>
                <td><?php echo $product['name'];?></td>
                <td><?php echo $product['price'];?></td>
                <td>
                  <input type="number" name="product[<?php echo $i;?>][qty]" class="form-control" value="1" min="1">
                </td>
                <td></td>
                <td></td>
              </tr>
            <?php }?>
          <?php }?>
        </tbody>
      </table>
  </div>
</div>
