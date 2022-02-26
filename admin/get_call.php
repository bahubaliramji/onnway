<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');




$row33 = mysqli_query($con, "UPDATE count SET get_call = 'unread'");


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Get Call Enquiries</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Get Call Enquiries</li>
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
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Order ID</th>
                    <th>Customer Phone</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM get_call ORDER BY created DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $order_id = $row['order_id'];
                      $user_id = $row['user_id'];
                      $created = $row['created'];



                      $query2 = mysqli_query($con, "SELECT * FROM orders WHERE id = '$order_id'");
                      $row2 = mysqli_fetch_array($query2);

                      if (isset($row2['laod_type'])) {
                        $laod_type = $row2['laod_type'];
                      } else {
                        $laod_type = '--';
                      }

                      $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
                      $row3 = mysqli_fetch_array($query3);


                      // $name = $row2['name'];
                      if (isset($ro3['phone'])) {
                        $phone = $row3['phone'];
                      } else {
                        $phone = '--';
                      }



                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <?php
                        if ($laod_type == 'part') {

                        ?>
                          <td><a href="loader_part_load_order.php?id=<?= $order_id; ?>">ORDER #<?= $order_id; ?></a></td>
                        <?php
                        } else {
                        ?>
                          <td><a href="loader_full_load_order.php?id=<?= $order_id; ?>">ORDER #<?= $order_id; ?></a></td>
                        <?php
                        }
                        ?>
                        <td><?= $phone; ?></td>
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