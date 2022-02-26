<?php

include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $blog_cat_id  = $_GET['edit'];
  $squery =  "SELECT * FROM blog_category WHERE blog_cat_id  = '$blog_cat_id '";
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
          <h1 class="m-0 text-dark">Blog Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
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
            $blog_cat_name = $_POST['blog_cat_name'];

            $question_insert = "UPDATE `blog_category` SET 
 `blog_cat_name` = '$blog_cat_name'
 WHERE blog_cat_id  = '$blog_cat_id '";
            if (mysqli_query($con, $question_insert)) {
              header('Location:blog_category.php');
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
                <h3 class="card-title">Edit Category</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group">
                  <label for="blog_cat_name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['blog_cat_name']; ?>" id="blog_cat_name" name="blog_cat_name" placeholder="Name" required>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="blog_cat_id" value="<?php echo $data['blog_cat_id']; ?>">
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