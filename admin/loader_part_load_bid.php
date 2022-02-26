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

$row33 = mysqli_query($con, "UPDATE count SET part_load = 'unread'");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Part Load Bidding Enquiries</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Part Load Bidding Enquiries</li>
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
                    <th>Loader Name</th>
                    <th>Loader Phone</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Scheduled Date</th>
                    <th>Weight</th>
                    <th>Material</th>
                    <th>Pickup Address</th>
                    <th>Drop Address</th>
                    <th>Length</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Booking Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM orders WHERE laod_type = 'part' AND (status = 'requsted for quote' OR status = 'accepted' OR status = 'assigned for quote' OR status = 'accepted quote') ORDER BY created DESC";
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

                      $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                      $row4 = mysqli_fetch_array($query4);

                      $schedule = $row['schedule'];
                      $weight = $row['weight'];
                      $material = $row['material'];
                      $length = $row['length'];
                      $width = $row['width'];
                      $height = $row['height'];
                      $quantity = $row['quantity'];

                      $query5 = mysqli_query($con, "SELECT * FROM tbl_material WHERE id = '$material'");
                      $row5 = mysqli_fetch_array($query5);

                      $freight = (int)$row['freight'];
                      $other_charges = (int)$row['other_charges'];
                      $cgst = (int)$row['cgst'];
                      $sgst = (int)$row['sgst'];
                      $insurance = (int)$row['insurance'];

                      $fr = $freight + $other_charges + $cgst + $sgst + $insurance;

                      $pickup_address = $row['pickup_address'] . ',' . $row['pickup_pincode'] . ',' . $row['pickup_phone'] . ',' . $row['pickup_city'];
                      $drop_address = $row['drop_address'] . ',' . $row['drop_pincode'] . ',' . $row['drop_phone'] . ',' . $row['drop_city'];
                      $status = $row['status'];
                      $created = $row['created'];

                      $query2 = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
                      $row2 = mysqli_fetch_array($query2);


                      $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
                      $row3 = mysqli_fetch_array($query3);


                      $name = $row2['name'];
                      if (isset($row3['phone'])) {
                        $phone = $row3['phone'];
                      } else {
                        $phone = '--';
                      }


                      $trucks = isset($row4['type']) . ' - ' . isset($row4['title']);
                      //$mater = $row5['material_name'];
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
                        <td>ORDER #<?= $id; ?></td>
                        <td><?= $name; ?></td>
                        <td><?= $phone; ?></td>
                        <td><?= $source; ?></td>
                        <td><?= $destination; ?></td>
                        <td><?= $schedule; ?></td>
                        <td><?= $weight; ?></td>
                        <td><?= $mater; ?></td>
                        <td><?= $pickup_address; ?></td>
                        <td><?= $drop_address; ?></td>
                        <td><?= $length; ?></td>
                        <td><?= $width; ?></td>
                        <td><?= $height; ?></td>
                        <td><?= $quantity; ?></td>
                        <?php

                        if ($status == 'requsted for quote') {
                        ?>
                          <td><a href="loader_part_load_bid_order.php?id=<?= $id; ?>" type="button" class="btn btn-block btn-primary">ASSIGN FOR BIDDING</a></td>
                        <?php
                        } else if ($status == 'assigned for quote') {
                        ?>
                          <td><a href="loader_part_load_bid_order.php?id=<?= $id; ?>" type="button" class="btn btn-block btn-success">ACCEPT BID</a></td>
                        <?php
                        } else if ($status == 'accepted quote') {
                        ?>
                          <td><a href="loader_part_load_bid_order.php?id=<?= $id; ?>" type="button" class="btn btn-block btn-warning">BID ACCEPTED</a></td>
                        <?php
                        }
                        ?>
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