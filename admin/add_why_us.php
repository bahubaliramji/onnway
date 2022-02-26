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
          <h1 class="m-0 text-dark">Add Why Choose Us</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add Why Choose Us</li>
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

            $w_title = $_POST['w_title'];
            $w_content = $_POST['w_content'];
            //For images
            $w_img = $_FILES["w_img"]["name"];
            $temp_name1 = $_FILES["w_img"]["tmp_name"];
            $dst1 = "upload/" . $w_img;
            move_uploaded_file($temp_name1, $dst1);

            $question_insert = "INSERT INTO `why_us` (
`w_title`, 
`w_content`,
`w_img`
) 
                VALUES (
                    '$w_title',
                    '$w_content',
                    '$dst1'
                    )";
            if (mysqli_query($con, $question_insert)) {
              header('Location:why_us.php');
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
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">
               <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Why choose us text</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="w_text" name="w_text" placeholder="Text" rows="5"></textarea>
                  </div>
                </div> -->


                <div class="form-group">
                  <label for="w_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="w_title" name="w_title" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="w_content" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="w_content" name="w_content" placeholder="Content" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="w_img" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="w_img" name="w_img" aria-describedby="emailHelp" placeholder="Image" required>
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