<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `survey_officer` WHERE `survey_officer`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      echo "<script>alert('Deleted successfully'); </script> ";
    }
    else
    {
      echo "<script>alert('Error occurred'); </script> ";
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
            <h1 class="m-0 text-dark">Verifying Officer Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Verifying Officer Management</li>
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
                
				<a href="add_officer.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>State</th>
                    <th>Status</th>
                    <th>Added On</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM survey_officer ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $sector_id = $row['sector_id'];
					 
					 $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector_id'"));
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td><?= $row['state']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                    <td style="text-align-last: center;"><a href="edit_officer.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="officers.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  <?php
				  }
				  ?>
                 
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
