<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
  if (mysqli_query($con, $del_query)) {
    $msg = "Truck Has Been Deleted";
  } else {
    $error = "Truck Hasn't Been Deleted";
  }
}


$row33 = mysqli_query($con, "UPDATE count SET confirmed = 'unread'");


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Confirmed Orders</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Confirmed Orders</li>
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
              <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Order ID</th>
                    <th>Load Type</th>
                    <th>Status</th>
                    <th>Payable Freight</th>
                    <th>Paid Amount</th>
                    <th>Balance Amount</th>
                    <th>Vehicle Number</th>
                    <th>Driver Number</th>
                    <th>Transporter Number</th>
                    <th>Loader Name</th>
                    <th>Loader Phone</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Truck Type</th>
                    <th>Scheduled Date</th>
                    <th>Weight</th>
                    <th>Material</th>

                    <th>Pickup Address</th>
                    <th>Drop Address</th>

                    <th>Booking Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM orders WHERE (status = 'assigned to driver' OR status = 'started' OR status = 'completed') ORDER BY created DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $id = $row['id'];
                      $user_id = $row['user_id'];
                      $source = $row['source'];
                      $destination = $row['destination'];
                      $truck_type = $row['truck_type'];
                      $laod_type = $row['laod_type'];

                      $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                      $row4 = mysqli_fetch_array($query4);

                      $schedule = $row['schedule'];
                      $weight = $row['weight'];
                      $material = $row['material'];

                      $query5 = mysqli_query($con, "SELECT * FROM tbl_material WHERE id = '$material'");
                      $row5 = mysqli_fetch_array($query5);

                      $freight = (int)$row['freight'];

                      $other_charges = (int)$row['other_charges'];

                      $cgst = (int)$row['cgst'];

                      $sgst = (int)$row['sgst'];

                      $insurance = (int)$row['insurance'];

                      $insurance_used = $row['insurance_used'];

                      $paid_amount = (int)$row['paid_amount'];

                      if ($insurance_used == "yes") {
                        $fr = $freight + $other_charges + $cgst + $sgst + $insurance;
                      } else {
                        $fr = $freight + $other_charges + $cgst + $sgst;
                      }

                      $bal = $fr - $paid_amount;


                      $pickup_address = $row['pickup_address'];
                      $drop_address = $row['drop_address'];
                      $status = $row['status'];
                      $created = $row['created'];

                      $bidquery = mysqli_query($con, "SELECT * FROM assigned_orders WHERE order_id = '$id'");
                      $brow1 = mysqli_fetch_array($bidquery);

                      if ($status == "assigned to driver") {
                        $sts = '<a type="button" class="btn btn-block btn-warning" style="color: black;">ASSIGNED TO DRIVER</a>';
                      } else if ($status == "started") {
                        $sts = '<a type="button" class="btn btn-block btn-info" style="color: white;">STARTED</a>';
                      } else {
                        $sts = '<a type="button" class="btn btn-block btn-success" style="color: white;">COMPLETED</a>';
                      }

                      $query2 = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
                      $row2 = mysqli_fetch_array($query2);

                      $trnsid = $brow1['user_id'];

                      $query31 = mysqli_query($con, "SELECT * FROM users WHERE id = '$trnsid'");
                      $row31 = mysqli_fetch_array($query31);

                      $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
                      $row3 = mysqli_fetch_array($query3);


                      $name = $row2['name'];
                      if (isset($row3['phone'])) {
                        $phone = $row3['phone'];
                      } else {
                        $phone = '--';
                      }
                      if (isset($row4['type']) && isset($row4['title'])) {
                        $trucks = $row4['type'] . ' - ' . $row4['title'];
                      } else {
                        $trucks = '-';
                      }
                      //$trucks = isset($row4['type']) . ' - ' . isset($row4['title']);
                      if (isset($row5['material_name'])) {
                        $mater = $row5['material_name'];
                      } else {
                        $mater = '--';
                      }


                      if (empty($company)) {
                        $company = '---';
                      }

                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <?php
                        if ($laod_type == 'part') {

                        ?>
                          <td><a href="loader_part_load_order.php?id=<?= $id; ?>">ORDER #<?= $id; ?></a></td>
                        <?php
                        } else {
                        ?>
                          <td><a href="loader_full_load_order.php?id=<?= $id; ?>">ORDER #<?= $id; ?></a></td>
                        <?php
                        }
                        ?>
                        <td style="text-transform: uppercase;"><?= $laod_type; ?></td>
                        <td><?= $sts; ?></td>
                        <td>₹<?= $fr; ?></td>
                        <td>₹<?= $paid_amount; ?></td>
                        <td>₹<?= $bal; ?></td>
                        <td><?= $brow1['vehicle_number']; ?></td>
                        <td><?= $brow1['driver_number']; ?></td>
                        <td><?= $row31['phone']; ?></td>
                        <td><?= $name; ?></td>
                        <td><?= $phone; ?></td>
                        <td><?= $source; ?></td>
                        <td><?= $destination; ?></td>
                        <td><?= $trucks; ?></td>
                        <td><?= $schedule; ?></td>
                        <td><?= $weight; ?></td>
                        <td><?= $mater; ?></td>

                        <td><?= $pickup_address; ?></td>
                        <td><?= $drop_address; ?></td>

                        <td><?= $created; ?></td>
                      </tr>
                  <?php }
                  } ?>
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