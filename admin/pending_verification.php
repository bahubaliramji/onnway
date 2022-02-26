<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pending Profiles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Pending Profiles</li>
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
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
				  
				  <tr>
					<th></th>
                    <th>
					<input id="type" class="form-control form-control-sm" type="text" placeholder="type">
					
				    </th>
                    
                    
                    <th><input id="name" class="form-control form-control-sm" type="text" placeholder="name"></th>
                    <th><input id="phone" class="form-control form-control-sm" type="number" placeholder="phone"></th>
                    <th><input id="address" class="form-control form-control-sm" type="text" placeholder="address"></th>
                    <th><input id="district" class="form-control form-control-sm" type="text" placeholder="district"></th>
                    <th><input id="state" class="form-control form-control-sm" type="text" placeholder="state"></th>
                    
                    <th>
					  <input type="text" class="form-control form-control-sm" id="date">
                  
					</th>
					<th></th>
                  </tr>
				  
				  
				  
                  <tr>
                    <th>S. No.</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Current Address</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Joined On</th>
					<th>Photo</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM assigned_surveys WHERE (status = 'pending') ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  
					  $profile_id = $row['profile_id'];
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
		$sector = $sdata['sector'];
		
		
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
		$sector = $sdata['sector'];
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
		$sector = $sdata['sector'];
	}	
					  if(!empty($sector))
					  {
				  ?>
				  
                  <tr>
				  <td><?= $sno; ?></td>
				  <td><?= $type; ?></td>
                   
					
					<?php
					if($type == 'worker')
					{
					?>
					<td><a href="pending_worker_profile3.php?id=<?= $profile_id; ?>&sid=<?= $row['id']; ?>"><?= $name; ?></a></td>
					<?php
					}
					else if($type == 'brand')
					{
					?>
					<td><a href="pending_brand_profile3.php?id=<?= $profile_id; ?>&sid=<?= $row['id']; ?>"><?= $name; ?></a></td>
					<?php
					}
					else
					{
					?>
					<td><a href="pending_contractor_profile3.php?id=<?= $profile_id; ?>&sid=<?= $row['id']; ?>"><?= $name; ?></a></td>
					<?php
					}
					?>
                    <td><?= $phone; ?></td>
                    <td><?= $cstreet.", ".$carea.", ".$cdistrict.", ".$cstate.", ".$cpin; ?></td>
                    <td><?= $cdistrict; ?></td>
                    <td><?= $cstate; ?></td>
                    <td><?= $created; ?></td>
					<?php
if(!empty($photo1))
{
?>
<td><a href="<?= $photo; ?>" target="blank"><?= $photo1; ?></a></td>
<?php
}
else
{
?>
<td><a></a></td>
<?php
}
?>
                  </tr>
                  <?php
					  }
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
