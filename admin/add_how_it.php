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
          <h1 class="m-0 text-dark">Add How It Works</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add How It Works</li>
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

            $h_title = $_POST['h_title'];
            $h_content = $_POST['h_content'];
            //For images
            $h_img = $_FILES["h_img"]["name"];
            $temp_name1 = $_FILES["h_img"]["tmp_name"];
            $dst1 = "upload/" . $h_img;
            move_uploaded_file($temp_name1, $dst1);

            $question_insert = "INSERT INTO `how_it` (
`h_title`, 
`h_content`,
`h_img`
) 
                VALUES (
                    '$h_title',
                    '$h_content',
                    '$dst1'
                    )";
            if (mysqli_query($con, $question_insert)) {
              header('Location:how_it.php');
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
                  <label for="h_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="h_title" name="h_title" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="h_content" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="h_content" name="h_content" placeholder="Content" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="h_img" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="h_img" name="h_img" aria-describedby="emailHelp" placeholder="Image" required>
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