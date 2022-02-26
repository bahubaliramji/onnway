<?php

include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $blog_id = $_GET['edit'];
  $squery =  "SELECT * FROM blog WHERE blog_id = '$blog_id'";
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
          <h1 class="m-0 text-dark">Blog</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Blog</li>
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
            $blog_title = $_POST['blog_title'];
            $blog_content = $_POST['blog_content'];
            $blog_date = $_POST['blog_date'];
            $blog_author_name = $_POST['blog_author_name'];
            $b_cat_id = $_POST['b_cat_id'];
            $blog_desc = $_POST['blog_desc'];

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

            $question_insert = "UPDATE `blog` SET 
 `blog_title` = '$blog_title', 
 `blog_content` = '$blog_content',
 `blog_date` = '$blog_date',
 `blog_author_name` = '$blog_author_name',
 `b_cat_id` = '$b_cat_id',
 `blog_desc` = '$blog_desc',
 `blog_img2` = '$destination_path1'
 WHERE blog_id = '$blog_id'";
            if (mysqli_query($con, $question_insert)) {
              header('Location:blog.php');
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
                <h3 class="card-title">Edit Blog</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="blog_date">Blog Date</label>
                  <input type="text" class="form-control" value="<?= $data['blog_date']; ?>" name="blog_date" placeholder="Enter Blog Text">
                </div>
                <div class="form-group">
                  <label for="blog_author_name">Blog Author</label>
                  <input type="text" class="form-control" value="<?= $data['blog_author_name']; ?>" name="blog_author_name" placeholder="Enter Blog Text">
                </div>

                <div class="form-group">
                  <label for="blog_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['blog_title']; ?>" id="blog_title" name="blog_title" placeholder="Title" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="b_cat_id">Blog Category</label>
                  <div class="col-sm-12">
                    <select name="b_cat_id" class="form-control" required="">
                      <option value="">Select Category</option>
                      <?php
                      $sql1 = "SELECT * FROM blog_category";
                      $res1 = mysqli_query($con, $sql1);
                      while ($row1 = mysqli_fetch_assoc($res1)) {
                      ?>
                        <option value="<?php echo $row1['blog_cat_id']; ?>" <?php if ($data['b_cat_id'] == $row1['blog_cat_id']) {
                                                                              echo "selected";
                                                                            } ?>>
                          <?php echo $row1['blog_cat_name']; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Long Content</label>
                  <textarea class="form-control" id="blog_desc" name="blog_desc" rows="8"><?php echo $data['blog_desc']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="blog_content" class="col-sm-2 control-label">Short Content</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?= $data['blog_content']; ?>" id="blog_content" name="blog_content" placeholder="Content" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Photo</label>
                  <img src="<?php echo $data['blog_img2']; ?>" height="80px" width="120px">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select New Photo</label>
                  <input type="file" class="form-control" id="new_img" name="new_img">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="old_img" value="<?php echo $data['blog_img2']; ?>">
                <input type="hidden" name="blog_id" value="<?php echo $data['blog_id']; ?>">
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