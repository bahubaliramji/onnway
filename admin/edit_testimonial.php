<?php

include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $t_id = $_GET['edit'];
  $squery =  "SELECT * FROM testimonial WHERE t_id = '$t_id'";
  $data = mysqli_fetch_array(mysqli_query($con, $squery));
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
            <li class="breadcrumb-item active">Edit Data</li>
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
            $t_name = $_POST['t_name'];
            $t_message = $_POST['t_message'];
            

            $question_insert = "UPDATE `testimonial` SET 
 `t_name` = '$t_name', 
 `t_message` = '$t_message'
 WHERE t_id = '$t_id'";
            if (mysqli_query($con, $question_insert)) {
              header('Location:testimonial.php');
            } else {
              $error = "Some error occurred";
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
                <h3 class="card-title">Edit Data</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                 <!--<div class="form-group">
                  <label for="w_text">Why Choose Us Text</label>
                  <input type="text" class="form-control" value="<?= $data['w_text']; ?>" name="w_text" placeholder="Enter Why Choose Us Text">
                </div> -->


                <div class="form-group">
                  <label for="t_name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['t_name']; ?>" id="t_name" name="t_name" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="t_message" class="col-sm-2 control-label">Message</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" id="t_message" name="t_message" placeholder="Content" required><?= $data['t_message']; ?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="t_id" value="<?php echo $data['t_id']; ?>">
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