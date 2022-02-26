<?php
include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `how_it` WHERE `how_it`.`h_id` = '$del_id'";
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
          <h1 class="m-0 text-dark">How It Works</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">How It Works</li>
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

              <a href="add_how_it.php" class="btn btn-outline-success">ADD DATA</a>
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
                  $query = "SELECT * FROM how_it ORDER BY h_id DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $h_id = $row['h_id'];
                      $h_title = $row['h_title'];
                      $h_content = $row['h_content'];
                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $h_content; ?></td>
                        <td><img src="<?php echo $row['h_img']; ?>" width="50px"></td>
                        <td><?= $h_title; ?></td>
                        
                        <td style="text-align-last: center;"><a href="edit_how_it.php?edit=<?= $h_id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="how_it.php?del=<?= $h_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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