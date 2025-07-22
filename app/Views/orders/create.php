<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card">
  <div class="card-header">
    <h2 class="text-primary mb-0"><i class="fa fa-receipt"></i> Create Order</h2>
  </div>
  <div class="card-body">
    <form action="/order/create" method="GET">
      <input type="hidden" name="product_has_orders" value='<?php echo htmlspecialchars_decode(json_encode($product_has_orders)); ?>'>
      <div class="row">
        <div class="col mb-3">
          <div class="input-group">
            <span class="input-group-text">Customer</span>
            <select name="customer_id" class="form-select" required>
            <option value="">Select Customer</option>
            <?php foreach ($customers as $customer): ?>
              <option value="<?= $customer['id'] ?>" <?php echo isset($_GET['customer_id']) && $_GET['customer_id'] == $customer['id'] ? 'selected' : ''?>><?= $customer['name'] ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="col mb-3">
          <div class="input-group">
            <span class="input-group-text">Product</span>
            <select name="product_id" class="form-select" required>
            <option value="">Select Product</option>
            <?php foreach ($products as $product): ?>
              <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
        <div class="col mb-3">
          <div class="input-group">
            <span class="input-group-text">Qty</span>
              <input type="number" name="qty" class="form-control" value="1" min="1" required>
          </div>
        </div>
        <div class="col mb-3">
          <button class="btn btn-primary w-100" type="submit"><i class="fa fa-plus"></i> Add</button>
        </div>
      </div>
    </form>

     <form action="/order/store" method="POST">
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
            <?php $i = 0; $sub_total = 0;?>
            <?php foreach($product_has_orders as $index => $order){ ?>
              <?php $sub_total += $order['total'];?>
              <tr>
                  <td><?php echo ++$i;?></td>
                  <td><?php echo $order['name'];?></td>
                  <td><?php echo $order['price'];?></td>
                  <td><?php echo $order['qty'];?></td>
                  <td><?php echo $order['total'];?></td>
                  <td>
                    <a href="/order/create?deleteId=<?php echo $index;?>&customer_id=<?php echo $_GET['customer_id']; ?>&product_id=<?php echo $_GET['product_id']; ?>&qty=<?php echo $_GET['qty']; ?>&product_has_orders=<?php echo urlencode(json_encode($product_has_orders)); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
            <?php }?>
            <tr>
              <td colspan="4" class="text-end">Grand Total</td>
              <td><?php echo $sub_total; ?></td>
            </tr>
          </tbody>
        </table>


      <input type="hidden" name="customer_id" value="<?php echo isset($_GET['customer_id']) ? $_GET['customer_id'] : ''; ?>">
      <input type="hidden" name="product_has_orders" value='<?php echo htmlspecialchars_decode(json_encode($product_has_orders)); ?>'>
      <input type="hidden" name="sub_total" value="<?php echo isset($sub_total) ? $sub_total : 0; ?>">

      <button type="submit" class="btn btn-success float-end"><i class="fa fa-save"></i> Create Invoice</button>
     </form>
  </div>
</div>
