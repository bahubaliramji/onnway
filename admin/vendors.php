<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `user_login` WHERE `user_login`.`id` = '$del_id'";
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
            <h1 class="m-0 text-dark">Vendors Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Vendors Management</li>
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
                
				<a href="add_vendor.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Location</th>
                    <th>Name</th>
					<th>Full Name</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>GST</th>
                    <th>Account Number</th>
                    <th>Account Name</th>
                    <th>IFSC Code</th>
                    <th>Bank</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM user_login WHERE typ = 'vendor' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $location_id = $row['location_id'];
					 
					 $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM location WHERE id = '$location_id'"));
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><?= $sdata['city']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['full_name']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['address']; ?></td>
                    <td><?= $row['GST']; ?></td>
                    <td><?= $row['account_number']; ?></td>
                    <td><?= $row['account_name']; ?></td>
                    <td><?= $row['IFSC']; ?></td>
                    <td><?= $row['Bank']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                    <td style="text-align-last: center;"><a href="edit_vendor.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="vendors.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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
