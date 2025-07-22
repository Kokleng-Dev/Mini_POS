<?php include __DIR__ . "/layouts/nav.php" ?>


<?php include __DIR__ . "/layouts/alert.php" ?>


<div class="card"></div>
    <div class="card-header">
        <h5 class="card-title my-3">Dashboard Overview</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-receipt"></i> Total Orders</h5>
                        <h4 class="card-text"><?php echo sprintf("%02d",$total_orders); ?></h4>
                    </div>
                </div> 
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-box"></i> Total Products</h5>
                        <h4 class="card-text"><?php echo sprintf("%02d",$total_products); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-users"></i> Total Customers</h5>
                        <h4 class="card-text"><?php echo sprintf("%02d",$total_customers); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-users"></i> Total Users</h5>
                        <h4 class="card-text"><?php echo sprintf("%02d",$total_users); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
