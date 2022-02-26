<?php
include('inc/head.php');
include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `blog_category` WHERE `blog_category`.`blog_cat_id` = '$del_id'";
  if (mysqli_query($con, $del_query)) {
    $msg = "Blog Category Has Been Deleted";
  } else {
    $error = "Blog Category Hasn't Been Deleted";
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
          <h1 class="m-0 text-dark">Blog Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Blog Category</li>
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

              <a href="add_blog_category.php" class="btn btn-outline-success">ADD BLOG CATEGORY</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    
                   
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM blog_category";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {

                    $sno = 0;
                    while ($row = mysqli_fetch_array($query_run)) {

                      $sno++;

                      $blog_cat_id = $row['blog_cat_id'];
                      $blog_cat_name = $row['blog_cat_name'];

                  ?>
                      <tr>
                        <td><?= $sno; ?></td>
                        <td><?= $blog_cat_name; ?></td>
                        
                        <td style="text-align-last: center;"><a href="edit_blog_category.php?edit=<?= $blog_cat_id ; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td style="text-align-last: center;"><a href="blog_category.php?del=<?= $blog_cat_id ; ?>"><i class="fas fa-trash-alt"></i></a></td>
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