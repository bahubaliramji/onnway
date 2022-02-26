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
          <h1 class="m-0 text-dark">Add Blog</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add Blog</li>
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
            $blog_date = $_POST['blog_date'];
            $blog_author_name = $_POST['blog_author_name'];
            $b_cat_id = $_POST['b_cat_id'];
            $blog_desc = $_POST['blog_desc'];
            $blog_content = $_POST['blog_content'];

            //For images
            $blog_img2 = $_FILES["blog_img2"]["name"];
            $temp_name1 = $_FILES["blog_img2"]["tmp_name"];
            $dst1 = "upload/" . $blog_img2;
            move_uploaded_file($temp_name1, $dst1);

            $question_insert = "INSERT INTO `blog` (
`blog_title`, 
`blog_date`,
`blog_author_name`,
`b_cat_id`,
`blog_desc`,
`blog_content`,
`blog_img2`
) 
                VALUES (
                    '$blog_title',
                    '$blog_date',
                    '$blog_author_name','$b_cat_id','$blog_desc','$blog_content',
                    '$dst1'
                    )";
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
                <h3 class="card-title">Add Blog</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="blog_desc" class="col-sm-2 control-label">Long Content</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="blog_desc" name="blog_desc" placeholder="Description" rows="8"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="blog_date" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="blog_date" name="blog_date" placeholder="Date" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="blog_author_name" class="col-sm-2 control-label">Author</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="blog_author_name" name="blog_author_name" placeholder="Author" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="blog_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="blog_title" name="blog_title" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="blog_content" class="col-sm-2 control-label">Short Content</label>
                  <div class="col-sm-10">
                    <input type="text" step="any" class="form-control" id="blog_content" name="blog_content" placeholder="Content" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="b_cat_id">Blog Category</label>
                  <div class="col-sm-10">
                    <select name="b_cat_id" class="form-control" required="">
                      <option value="">Select Category</option>
                      <?php
                      $sql1 = "SELECT * FROM blog_category";
                      $res1 = mysqli_query($con, $sql1);
                      while ($row1 = mysqli_fetch_assoc($res1)) {
                      ?>
                        <option value="<?php echo $row1['blog_cat_id']; ?>"><?php echo $row1['blog_cat_name']; ?></option>

                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="blog_img2" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="blog_img2" name="blog_img2" aria-describedby="emailHelp" placeholder="Image" required>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="submit" name="submit" class="btn btn-success" value="Add Blog">
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