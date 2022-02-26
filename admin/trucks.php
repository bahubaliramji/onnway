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

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Trucks</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Trucks</li>
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
            <div class="card-header">

              <a href="add_truck.php" class="btn btn-outline-success">ADD DATA</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Truck Type</th>
                    <th>Title</th>
                    <th>Max. Load</th>
                    <th>Capacity</th>
                    <th>Box Length</th>
                    <th>Box Width</th>
                    <th>Height</th>
                    <th>Added Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM trucks ORDER BY created DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $id = $row['id'];
                      $type = $row['type'];
                      $title = $row['title'];
                      $date = $row['created'];
                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $type; ?></td>
                        <td><?= $title; ?></td>
                        <td><?= $row['max_load'] . ' Mt'; ?></td>
                        <td><?= $row['capcacity'] . ' Mt'; ?></td>
                        <td><?= $row['box_length'] . ' ft.'; ?></td>
                        <td><?= $row['box_width'] . ' ft.'; ?></td>
                        <td><?= $row['height'] . ' ft.'; ?></td>
                        <td><?= $date; ?></td>
                        <td style="text-align-last: center;"><a href="edit_truck.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="trucks.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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