<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
 {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Truck Has Been Deleted";
    }
    else
    {
      $error = "Truck Hasn't Been Deleted";
    }

 }

 $row33 = mysqli_query($con,"UPDATE count SET receipts = 'unread'");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Payment Receipts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Payment Receipts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped nowrap">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Order ID</th>
                  <th>Loader</th>
                  <th>Receipt Amount</th>
                  <th>PROMO Value</th>
                  <th>Insurance Value</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM receipt ORDER BY created DESC";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run) > 0)
                     {   
                               
$sno = 0;							   
                      while ($row = mysqli_fetch_array($query_run))
                        {

$sno++;         

		 $id = $row['id'];
		 $order_id = $row['order_id'];
		 $user_id = $row['user_id'];
		 $pvalue = $row['pvalue'];
		 $inin = $row['inin'];
		 $status = $row['status'];
		 $created = $row['created'];
		 $amount = $row['amount'];
		 
		 
		 
		 $query2 = mysqli_query($con,"SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
		 $row2 = mysqli_fetch_array($query2);
		 
		 
		 $query3 = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
		 $row3 = mysqli_fetch_array($query3);
		 
		 
                          $name = $row2['name'];
                          
                          
                    ?>
                  <tr>
                    <td><?= $sno;?></td>
                    <td><a href="loader_full_load_order.php?id=<?= $order_id;?>">ORDER #<?= $order_id;?></a></td>
                    <td><a href="loader_detail.php?id=<?= $user_id;?>"><?= $name;?></a></td>
                    <td><?= $amount;?></td>
                    <td><?= $pvalue;?></td>
                    <td><?= $inin;?></td>
                    <td><?= $status;?></td>
                    <td><?= $created;?></td>
                    <td style="text-align-last: center;"><a href="update_receipt.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                  </tr>
                  <?php }}?>
                </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php
  include('inc/footer.php');
  ?>
