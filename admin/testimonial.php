<?php
include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `testimonial` WHERE `testimonial`.`t_id` = '$del_id'";
  if (mysqli_query($con, $del_query)) {
    $msg = "Why choose us Has Been Deleted";
  } else {
    $error = "Why choose us Hasn't Been Deleted";
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
          <h1 class="m-0 text-dark">Testimonials</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Testimonials</li>
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

              <a href="add_testimonial.php" class="btn btn-outline-success">ADD DATA</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Message</th>
                    <th>Name</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM testimonial ORDER BY t_id DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $t_id = $row['t_id'];
                      $t_name = $row['t_name'];
                      $t_message = $row['t_message'];
                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $t_message; ?></td>
                        <td><?= $t_name; ?></td>
                        
                        <td style="text-align-last: center;"><a href="edit_testimonial.php?edit=<?= $t_id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="testimonial.php?del=<?= $t_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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