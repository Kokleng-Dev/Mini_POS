<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card mt-3">
  <div class="card-header"><h3 class="text-primary"><i class="fa fa-receipt"></i> Order</h3></div>
  <div class="card-body">
    <a href="/order/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Create Order</a>
    <table class="table table-sm table-bordered table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Order Date</th>
          <th>Order Code</th>
          <th>Customer</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody style="vertical-align: middle">
        <?php foreach($orders as $index => $order) {?>
          <tr>
            <td><?= $index + 1;?></td>
            <td><?= $order['order_date'];?></td>
            <td><?= $order['order_code'];?></td>
            <td><?= $order['customer_name'];?></td>
            <td><?= $order['total'];?></td>
            <td>
              <a href="/order/invoice?id=<?= $order['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Invoice</a>
              <a href="/order/edit?id=<?= $order['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i> Edit</a>
              <a href="/order/delete?id=<?= $order['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
