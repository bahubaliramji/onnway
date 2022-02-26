<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `employee` WHERE `employee`.`id` = '$del_id'";
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
            <h1 class="m-0 text-dark">Employee Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Employee Management</li>
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
                
				<a href="add_employee.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Username</th>
					<th>Full Name</th>
                    <th>Password</th>
                    <th>Data Management</th>
                    <th>Users Management</th>
                    <th>Loaders Enquiries</th>
                    <th>Transporters Posted Trucks</th>
                    <th>Requests</th>
                    <th>Other Settings</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM employee";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $data = $row['data'];
					 $users = $row['users'];
					 $loaders = $row['loaders'];
					 $trucks = $row['trucks'];
					 $requests = $row['requests'];
					 $other = $row['other'];
					 
					 $data = str_replace("1","Read",$data);
					 $data = str_replace("2","Edit",$data);
					 $data = str_replace("3","Delete",$data);
					 $data = str_replace("4","Add",$data);
					 
					 
					 $users = str_replace("1","Read",$users);
					 $users = str_replace("2","Edit",$users);
					 $users = str_replace("3","Delete",$users);
					 $users = str_replace("4","Add",$users);
					 
					 $loaders = str_replace("1","Read",$loaders);
					 $loaders = str_replace("2","Edit",$loaders);
					 $loaders = str_replace("3","Delete",$loaders);
					 $loaders = str_replace("4","Add",$loaders);
					 
					 $trucks = str_replace("1","Read",$trucks);
					 $trucks = str_replace("2","Edit",$trucks);
					 $trucks = str_replace("3","Delete",$trucks);
					 $trucks = str_replace("4","Add",$trucks);
					 
					 $requests = str_replace("1","Read",$requests);
					 $requests = str_replace("2","Edit",$requests);
					 $requests = str_replace("3","Delete",$requests);
					 $requests = str_replace("4","Add",$requests);
					 
					 $other = str_replace("1","Read",$other);
					 $other = str_replace("2","Edit",$other);
					 $other = str_replace("3","Delete",$other);
					 $other = str_replace("4","Add",$other);
					 
					 //$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM location WHERE id = '$location_id'"));
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['full_name']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td><?= $data; ?></td>
                    <td><?= $users; ?></td>
                    <td><?= $loaders; ?></td>
                    <td><?= $trucks; ?></td>
                    <td><?= $requests; ?></td>
                    <td><?= $other; ?></td>
                    <td style="text-align-last: center;"><a href="edit_employee.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="employee.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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
