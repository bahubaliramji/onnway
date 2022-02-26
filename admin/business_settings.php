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
          <h1 class="m-0 text-dark">Business Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Business Settings</li>
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

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap">
                <thead>
                  <tr>
                    <!-- <th>S.No</th> -->
                    <th>Title</th>
                    <th>Content</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $selectquery = " SELECT * from business_settings";

                  $query = mysqli_query($con, $selectquery);

                  $nums = mysqli_num_rows($query);
                  $sn = 1;
                  while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  ?>
                    <tr>
                      <!-- <td><?php echo $sn; ?></td> -->
                      <td><?php echo $res['b_keys']; ?></td>
                      <td><?php echo  substr($res['b_value'], 0, 100); ?></td>
                      <!--<td style="text-align-last: center;"><a href="update_business_settings.php?edit=<?php echo $res['b_id']; ?>"><i class="fas fa-pencil-alt"></i></a></td>-->
                      <td>
                        <div class="table-data-feature" style="text-align: center;">
                          <form method="post" action="update_business_settings.php" class="d-inline">
                            <input type="hidden" name="b_id" value="<?php echo $res['b_id']; ?>">
                            <button type="submit" name="edit" value="edit" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          </form>
                        </div>
                      </td>

                    </tr>
                  <?php
                    $sn++;
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