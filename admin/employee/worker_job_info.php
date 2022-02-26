<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['id']))
  {
	  
	  $GLOBALS['base_url'] = base_url ;
	  
    $id = $_GET['id'];
    $squery =  "SELECT * FROM jobs WHERE id = '$id'";
    $row = mysqli_fetch_array(mysqli_query($con , $squery));
    $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$id'"));
	
	$image = $row['photo'];
					  $brand_id = $row['brand_id'];
					  $sector = $row['sector'];
					  $skills = $row['skills'];
					  $sklills = $row['skill_level'];
					  $nature = $row['nature'];
					  $place = $row['place'];
					  $location = $row['location'];
					  $experience = $row['experience'];
					  $gender = $row['gender'];
					  $education = $row['education'];
					  $stype = $row['stype'];
					  
					  $bdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$brand_id'"));
					  $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector'"));
					  $skdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skills WHERE id = '$skills'"));
					  $skldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skill_level_job WHERE id = '$sklills'"));
					  $naturedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM nature WHERE id = '$nature'"));
					  $placedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM place WHERE id = '$place'"));
					  $locationdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM locations WHERE id = '$location'"));
					  $lexperiencedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM experience WHERE id = '$experience'"));
					  $genderdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM gender_prefence WHERE id = '$gender'"));
					  $educationdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM education_job WHERE id = '$education'"));
					  $stypedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM salary_type WHERE id = '$stype'"));
					  
					  $loc = $locationdata['title'];
					  if(empty($loc))
					  {
						  $loc = $location;
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
            <h1 class="m-0 text-dark">Job Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="worker_jobs.php">Workers Jobs</a></li>
              <li class="breadcrumb-item active">Job Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  
                  
                </div>

                <h3 class="profile-username text-center"><?= $data['title']; ?></h3>


                <ul class="list-group list-group-unbordered mb-3">
				
				<li class="list-group-item">
                    <b>Job ID</b> <a class="float-right"><?= "WJ-".$row['id']; ?></a>
                  </li>
				
                  <li class="list-group-item">
				  <?php
					$brand_id = $row['brand_id'];
				  $bdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$brand_id'"));
				  ?>
                    <b>Brand ID</b> <a class="float-right"><?= $bdata['name']; ?></a>
                  </li>
				  
				  <li class="list-group-item">
                    <b>Working Hours</b> <a class="float-right"><?= $row['hours']; ?></a>
                  </li>
				  
				  <li class="list-group-item">
                    <b>Status</b> <a class="float-right"><?= $row['status']; ?></a>
                  </li>
				  
				  <li class="list-group-item">
                    <b>Posted On</b> <a class="float-right"><?= $row['created']; ?></a>
                  </li>
				  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Location</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Job Location</strong>

                <p class="text-muted">
				<?php
				$location = $row['location'];
				$locationdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM locations WHERE id = '$location'"));
				$loc = $locationdata['title'];
					  if(empty($loc))
					  {
						  $loc = $location;
					  }
				?>
                  <?= $loc; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Place of employment</strong>

                <p class="text-muted">
				<?php
				$place = $row['place'];
				$placedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM place WHERE id = '$place'"));
				?>
				<?= $placedata['title']; ?>
				</p>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Job Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Applicants</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    

                 <dl>
				 <dt>No. of Positions</dt>
                  <dd><?= $row['position']; ?></dd>
				  
				  <dt>Sector</dt>
                  <dd><?= $sdata['title']; ?></dd>
				 
                  <dt>Skill Level Required</dt>
                  <dd><?= $skldata['title']; ?></dd>
				  
                  <dt>Skill-Set required</dt>
                  <dd><?= $skdata['title']; ?></dd>
                  
				  <dt>Nature of Job</dt>
				  <dd><?= $naturedata['title']; ?></dd>
                
				<dt>Man-days required</dt>
                  <dd><?= $row['man_days']; ?></dd>
                
				<dt>Piece-rate</dt>
                  <dd><?= $row['piece_rate']; ?></dd>
                
				<dt>Experience</dt>
                  <dd><?= $lexperiencedata['title']; ?></dd>
                
				
				<dt>Job role</dt>
                  <dd><?= $row['role']; ?></dd>
                
				
				<dt>Gender Preference</dt>
                  <dd><?= $genderdata['title']; ?></dd>
                
				<dt>Education</dt>
                  <dd><?= $educationdata['title']; ?></dd>
                
				<dt>Salary package</dt>
                  <dd><?= $row['salary']; ?></dd>
				  
				  <dt>Salary Type</dt>
                  <dd><?= $stypedata['title']; ?></dd>
			
				
				</dl>

                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   <dl>
				   
				   <table id="example2" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Application Status</th>
                    <th>Applied On</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM job_application WHERE job_id = '$id' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno=0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  
					  $user_id = $row['user_id'];
					  
					  $workerdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM workers WHERE user_id = '$user_id'"));
					  
					  $loc = $locationdata['title'];
					  if(empty($loc))
					  {
						  $loc = $location;
					  }
					  //$image = base_url.'upload/users/'.
					  
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><a href="worker_profile.php?id=<?= $workerdata['user_id']; ?>"><?= $workerdata['name']; ?></a></td>
                    <td><?= $workerdata['phone']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                  </tr>
                  <?php
				  }
				  ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
				    <th>S. No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Application Status</th>
                    <th>Applied On</th>
                  </tr>
                  </tfoot>
                </table>
                
				</dl>
                    
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
		  
		  
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php
  include('inc/footer.php');
  ?>
