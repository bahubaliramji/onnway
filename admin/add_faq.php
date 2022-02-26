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
          <h1 class="m-0 text-dark">Add FAQ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item">FAQs</li>
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

            $f_ques = $_POST['f_ques'];
            $f_ans = $_POST['f_ans'];


            if (empty($f_ques) or empty($f_ans)) {
              $error = "Please fill all fields";
            } else {

              $f_ques_insert = "INSERT INTO faq SET f_ques = '$f_ques',f_ans = '$f_ans'";
              if (mysqli_query($con, $f_ques_insert)) {
                header('Location:faq.php');
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
                  <label for="question">Question</label>
                  <input type="text" class="form-control" name="f_ques" placeholder="Question">
                </div>

                <div class="form-group">
                  <label for="content">Answer</label>
                  <div class="mb-3">
                    <textarea class="textarea" placeholder="Place some text here" name="f_ans" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
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