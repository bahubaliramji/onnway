<?php
include('inc/head.php');
include('inc/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Testimonials</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add Testimonials</li>
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
            
            $question_insert = "INSERT INTO `testimonial` (
`t_name`, 
`t_message`
) 
                VALUES (
                    '$t_name',
                    '$t_message'
                    )";
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
                <h3 class="card-title">Add Data</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST" >
              <div class="card-body">
               <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Why choose us text</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="w_text" name="w_text" placeholder="Text" rows="5"></textarea>
                  </div>
                </div> -->


                <div class="form-group">
                  <label for="t_name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="t_name" name="t_name" placeholder="Name" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="t_message" class="col-sm-2 control-label">Message</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" id="t_message" name="t_message" placeholder="Message" required rows="5"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="submit" name="submit" class="btn btn-success" value="Add Why Choose Us">
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