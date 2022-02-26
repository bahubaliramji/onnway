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

$row33 = mysqli_query($con, "UPDATE count SET full_load_trucks = 'unread'");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Full Load Trucks</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Full Load Trucks</li>
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
                    <th>Truck ID</th>
                    <th>Posted By</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Truck Type</th>
                    <th>Load Passing</th>
                    <th>Scheduled Date</th>
                    <th>Status</th>
                    <th>Booking Date</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM posted_trucks WHERE laod_type = 'full' ORDER BY created DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $id = $row['id'];
                      $user_id = $row['user_id'];
                      $source = $row['source'];
                      $laod_type = $row['laod_type'];
                      $destination = $row['destination'];
                      $truck_type = $row['truck_type'];
                      $load_passing = $row['load_passing'];
                      $status = $row['status'];
                      $created = $row['created'];

                      $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                      $row4 = mysqli_fetch_array($query4);

                      $schedule = $row['schedule'];


                      $query2 = mysqli_query($con, "SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
                      $row2 = mysqli_fetch_array($query2);


                      $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
                      $row3 = mysqli_fetch_array($query3);


                      $name = $row2['name'];
                      if (isset($row3['type'])) {
                        $type = $row3['type'];
                      } else {
                        $type = '--';
                      }
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
                      // $trucks = $row4['type'] . ' - ' . $row4['title'];
                      // $mater = $row5['material_name'];

                      if (empty($company)) {
                        $company = '---';
                      }

                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td>TRUCK #<?= $id; ?></td>
                        <td><?= $type; ?></td>
                        <td><?= $name; ?></td>
                        <td><?= $phone; ?></td>
                        <td><?= $laod_type; ?></td>
                        <td><?= $source; ?></td>
                        <td><?= $destination; ?></td>
                        <td><?= $trucks; ?></td>
                        <td><?= $load_passing; ?></td>
                        <td><?= $schedule; ?></td>
                        <td><?= $status; ?></td>
                        <td><?= $created; ?></td>
                        <td style="text-align-last: center;"><a href="edit_full_load_posted.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
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