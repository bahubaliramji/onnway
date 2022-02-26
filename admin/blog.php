<?php
include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `blog` WHERE `blog`.`blog_id` = '$del_id'";
  if (mysqli_query($con, $del_query)) {
    $msg = "Blog Has Been Deleted";
  } else {
    $error = "Blog Hasn't Been Deleted";
  }
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
            <li class="breadcrumb-item active">Blog</li>
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


          <div class="card">
            <div class="card-header">

              <a href="add_blog.php" class="btn btn-outline-success">ADD BLOG</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Category</th>
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM blog INNER JOIN blog_category ON blog.b_cat_id = blog_category.blog_cat_id ORDER BY blog_id DESC";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $blog_id = $row['blog_id'];
                      $blog_content = $row['blog_content'];
                      $blog_img2 = $row['blog_img2'];
                      $blog_title = $row['blog_title'];
                      $blog_date = $row['blog_date'];
                      $blog_author_name = $row['blog_author_name'];
                      $blog_cat_name = $row['blog_cat_name'];

                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $blog_content; ?></td>
                        <td><img src="<?php echo $row['blog_img2']; ?>" width="50px"></td>
                        <td><?= $blog_title; ?></td>
                        <td><?= $blog_date; ?></td>
                        <td><?= $blog_author_name; ?></td>
                        <td><?= $blog_cat_name; ?></td>

                        
                        <td style="text-align-last: center;"><a href="edit_blog.php?edit=<?= $blog_id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="blog.php?del=<?= $blog_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>

              </table>
            </div>
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