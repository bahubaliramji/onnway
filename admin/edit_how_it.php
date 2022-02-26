<?php

include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $h_id = $_GET['edit'];
  $squery =  "SELECT * FROM how_it WHERE h_id = '$h_id'";
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
          <h1 class="m-0 text-dark">How It Works</h1>
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
            $h_title = $_POST['h_title'];
            $h_content = $_POST['h_content'];
            //image update & upload in image folder
            $old_img = $_POST['old_img'];
            print_r($_FILES['new_img']['name']);
            if (isset($_FILES['new_img']['name'])) {
              $new_img = $_FILES['new_img']['name'];
              if ($new_img != "") {
                $source_path1 = $_FILES['new_img']['tmp_name'];
                $destination_path1 = "upload/" . $new_img;
                move_uploaded_file($source_path1, $destination_path1);
              } else {
                $destination_path1 = $old_img;
              }
            } else {
              $destination_path1 = $old_img;
            }

            $question_insert = "UPDATE `how_it` SET 
 `h_title` = '$h_title', 
 `h_content` = '$h_content',
 `h_img` = '$destination_path1'
 WHERE h_id = '$h_id'";
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
                  <label for="h_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['h_title']; ?>" id="h_title" name="h_title" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="h_content" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['h_content']; ?>" id="h_content" name="h_content" placeholder="Content" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Photo</label>
                  <img src="<?php echo $data['h_img']; ?>" height="80px" width="120px">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select New Photo</label>
                  <input type="file" class="form-control" id="new_img" name="new_img">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="old_img" value="<?php echo $data['h_img']; ?>">
                <input type="hidden" name="h_id" value="<?php echo $data['h_id']; ?>">
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