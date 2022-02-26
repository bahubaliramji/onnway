<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Job Type</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item">Job Types Management</li>
            <li class="breadcrumb-item active">Add Data</li>
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

          <?php
          if (isset($_POST['submit'])) {


            $sector = $_POST['sector'];
            $title = $_POST['title'];
            $status = $_POST['status'];

            if (empty($title) or empty($status) or empty($sector)) {
              $error = "Please fill all fields";
            } else {

              $question_insert = "INSERT INTO `roles` (`sector_id`,`title`,`status`) 
                VALUES ('$sector','$title','$status')";
              if (mysqli_query($con, $question_insert)) {
                header('Location:jobs.php');
              } else {
                $error = "Some error occurred";
              }
            }
          }
          ?>

          <div class="card">
            <div class="card-header">
              <?php
              if (isset($error)) {
              ?>
                <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
              <?php
              } else {
              ?>
                <h3 class="card-title">Add Data</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST">
              <div class="card-body">

                <div class="form-group">
                  <label for="sector">Sector</label>
                  <select class="form-control" style="width: 100%;" name="sector" aria-hidden="true">
                    <?php
                    $query = "SELECT * FROM sectors WHERE status = 'active' ORDER BY created DESC";
                    $run_query = mysqli_query($con, $query);
                    $sno = 0;
                    while ($row = mysqli_fetch_array($run_query)) {
                      $sno++;
                      $id = $row['id'];

                    ?>
                      <option value="<?= $id; ?>"><?= $row['title']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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