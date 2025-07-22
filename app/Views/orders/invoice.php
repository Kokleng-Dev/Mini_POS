<?php include __DIR__ . "/../layouts/nav.php" ?>
<?php include __DIR__ . "/../layouts/alert.php" ?>


<div class="card">
  <div class="card-header">
    <h2 class="text-primary mb-0"><i class="fa fa-receipt"></i> Invoice</h2>
  </div>
  <div class="card-body">
     <table class="table table-bordered table-sm">
      <tr>
        <td>Order Date</td>
        <td><?php echo $order['order_date'];?></td>
        <td>Order Code</td>
        <td><?php echo $order['order_code'];?></td>
        <td>Customer</td>
        <td><?php echo $order['customer_name'];?></td>
      </tr>
     </table>
      <table class="table table-sm table-bordered table-hover">
          <thead>
            <tr>
              <td>No</td>
              <td>Product</td>
              <td>Price</td>
              <td>Qty</td>
              <td>Total</td>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; $sub_total = 0;?>
            <?php foreach($order_details as $index => $order_detail){ ?>
              <?php $sub_total += $order_detail['quantity'] * $order_detail['price'];?>
              <tr>
                  <td><?php echo ++$i;?></td>
                  <td><?php echo $order_detail['product_name'];?></td>
                  <td><?php echo $order_detail['price'];?></td>
                  <td><?php echo $order_detail['quantity'];?></td>
                  <td><?php echo $order_detail['quantity'] * $order_detail['price'];?></td>
                </tr>
            <?php }?>
            <tr>
              <td colspan="4" class="text-end">Grand Total</td>
              <td><?php echo $sub_total; ?></td>
            </tr>
          </tbody>
        </table>

        <button class="btn btn-dark float-end d-print-none" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
  </div>
</div>
