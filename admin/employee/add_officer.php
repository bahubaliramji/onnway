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
            <h1 class="m-0 text-dark">Add Verifying Officer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Verifying Officer Management</li>
              <li class="breadcrumb-item active">Add Data</li>
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
            if(isset($_POST['submit']))
            {

              
              $name = $_POST['name'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $state = $_POST['state'];
              $status = $_POST['status'];

$st = implode(", ", $state);

              if(empty($name) or empty($username) or empty($password))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "INSERT INTO `survey_officer` (`name`,`username`,`password`,`state`,`status`) 
                VALUES ('$name','$username','$password','$st','$status')";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:officers.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
				
				
			  }
            } 
            ?>

            <div class="card">
              <div class="card-header">
                <?php
				if($error)
				{
				?>
				<h3 class="card-title" style="color: red;"><?= $error; ?></h3>
				<?php
				}
				else
				{
				?>
				<h3 class="card-title">Add Data</h3>
				<?php
				}
				?>
              </div>
			  
			  
			  
              <!-- /.card-header -->
               <form role="form" method="POST">
                <div class="card-body">
				
				
				
				<div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                  </div>
				  
				  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                  </div>
				
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" style="width: 100%;" name="state[]" aria-hidden="true" multiple>
					<?php
					
					
					$indianStates = [
					'AA' => 'All States',
					'AR' => 'Arunachal Pradesh',
'AR' => 'Arunachal Pradesh',
'AS' => 'Assam',
'BR' => 'Bihar',
'CT' => 'Chhattisgarh',
'GA' => 'Goa',
'GJ' => 'Gujarat',
'HR' => 'Haryana',
'HP' => 'Himachal Pradesh',
'JK' => 'Jammu and Kashmir',
'JH' => 'Jharkhand',
'KA' => 'Karnataka',
'KL' => 'Kerala',
'MP' => 'Madhya Pradesh',
'MH' => 'Maharashtra',
'MN' => 'Manipur',
'ML' => 'Meghalaya',
'MZ' => 'Mizoram',
'NL' => 'Nagaland',
'OR' => 'Odisha',
'PB' => 'Punjab',
'RJ' => 'Rajasthan',
'SK' => 'Sikkim',
'TN' => 'Tamil Nadu',
'TG' => 'Telangana',
'TR' => 'Tripura',
'UP' => 'Uttar Pradesh',
'UT' => 'Uttarakhand',
'WB' => 'West Bengal',
'AN' => 'Andaman and Nicobar Islands',
'CH' => 'Chandigarh',
'DN' => 'Dadra and Nagar Haveli',
'DD' => 'Daman and Diu',
'LD' => 'Lakshadweep',
'DL' => 'National Capital Territory of Delhi',
'PY' => 'Puducherry'];
					
					//print_r($indianStates);
					
				  $sno = 0;
				  foreach ($indianStates as $key => $value)
				  {
					 $sno++;
					 //$id = $row['id'];
					  
					?>
                    <option><?= $value; ?></option>
					<?php
				  }
					?>
                  </select>
                  </div>
				  
                  
                 <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
