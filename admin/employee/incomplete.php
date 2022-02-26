<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `users` WHERE `users`.`id` = '$del_id'";
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
            <h1 class="m-0 text-dark">Incomplete Profiles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Incomplete Profiles</li>
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
                <table id="example5" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
				  
				  <tr>
					<th></th>
                    <th>
					<input id="type" class="form-control form-control-sm" type="text" placeholder="type">
					
				    </th>
                    
                    
                    <th><input id="phone" class="form-control form-control-sm" type="number" placeholder="phone"></th>
                    
                    <th>
					  <input type="text" style="width: auto;" class="form-control form-control-sm" id="date">
                  
					</th>
          <th></th>
                  </tr>
				  
                  <tr>
                    <th>S. No.</th>
                    <th>Type</th>
                    <th>Phone No.</th>
                    <th>Registered On</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM users WHERE (name = '') ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  
					  $profile_id = $row['id'];
	$status = $row['status'];
	$created = $row['created'];
	$officer_id = $row['officer_id'];


	$bdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$profile_id'"));
	$odata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM survey_officer WHERE id = '$officer_id'"));
	
	$phone = $bdata['phone'];
	$type = $bdata['type'];

if($type == 'worker')
	{
		$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM workers WHERE user_id = '$profile_id'"));
		$name = $sdata['name'];
		$photo = base_url."upload/users/".$sdata['photo'];
		$photo1 = $sdata['photo'];
		$status = $sdata['status'];
		$cpin = $sdata['cpin'];
		$cstate = $sdata['cstate'];
		$cdistrict = $sdata['cdistrict'];
		$carea = $sdata['carea'];
		$cstreet = $sdata['cstreet'];
		
		
	}
	else if($type == 'brand')
	{
		$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$profile_id'"));
		$name = $sdata['name'];
		$photo = base_url."upload/logo/".$sdata['logo'];
		$photo1 = $sdata['logo'];
		$status = $sdata['status'];
		$cpin = $sdata['cpin'];
		$cstate = $sdata['cstate'];
		$cdistrict = $sdata['cdistrict'];
		$carea = $sdata['carea'];
		$cstreet = $sdata['cstreet'];
	}
	else
	{
		$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM contractors WHERE user_id = '$profile_id'"));
		$name = $sdata['name'];
		$photo = base_url."upload/users/".$sdata['photo'];
		$photo1 = $sdata['photo'];
		$status = $sdata['status'];
		$cpin = $sdata['cpin'];
		$cstate = $sdata['cstate'];
		$cdistrict = $sdata['cdistrict'];
		$carea = $sdata['carea'];
		$cstreet = $sdata['cstreet'];
	}	
					  
					  
				  ?>
				  
                  <tr>
				  <td><?= $sno; ?></td>
				  <td><?= $type; ?></td>
                    
					
					
                    <td><?= $phone; ?></td>
                    <td><?= $created; ?></td>
                    <td style="text-align-last: center;"><a href="incomplete.php?del=<?= $profile_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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
