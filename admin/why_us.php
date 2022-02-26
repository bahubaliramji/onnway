<?php
include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `why_us` WHERE `why_us`.`w_id` = '$del_id'";
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
          <h1 class="m-0 text-dark">Why Choose Us</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Why Choose Us</li>
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

              <a href="add_why_us.php" class="btn btn-outline-success">ADD DATA</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Title</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM why_us ORDER BY w_id DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $w_id = $row['w_id'];
                      $w_title = $row['w_title'];
                      $w_content = $row['w_content'];
                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $w_content; ?></td>
                        <td><img src="<?php echo $row['w_img']; ?>" width="50px"></td>
                        <td><?= $w_title; ?></td>
                        
                        <td style="text-align-last: center;"><a href="edit_why_us.php?edit=<?= $w_id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="why_us.php?del=<?= $w_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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