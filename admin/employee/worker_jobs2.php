<?php

include('inc/head2.php');

?>

  <?php

include('inc/sidebar2.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Worker Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
              <li class="breadcrumb-item active">Worker Jobs</li>
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
                
                <a href="post_job.php" class="btn btn-outline-success">POST JOB</a>
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example6" class="table table-bordered table-striped" style="background: white;">
                  <thead>
                  <tr>
					<th></th>
                    <th><input id="jobid" class="form-control form-control-sm" type="text" placeholder="job"></th>
                    <th><input id="brand" class="form-control form-control-sm" type="text" placeholder="brand"></th>
                    <th><input id="title" class="form-control form-control-sm" type="text" placeholder="title"></th>
                    <th><input id="positions" class="form-control form-control-sm" type="text" placeholder="positions"></th>
                    <th><input id="sector" class="form-control form-control-sm" type="text" placeholder="sector"></th>
                    <th><input id="skill_level" class="form-control form-control-sm" type="text" placeholder="skill level"></th>
                    <th><input id="skill_set" class="form-control form-control-sm" type="text" placeholder="skill set"></th>
                    <th><input id="nature" class="form-control form-control-sm" type="text" placeholder="nature"></th>
                    <th><input id="man_days" class="form-control form-control-sm" type="text" placeholder="man days"></th>
                    <th><input id="piece" class="form-control form-control-sm" type="text" placeholder="piece rate"></th>
                    <th><input id="place" class="form-control form-control-sm" type="text" placeholder="place"></th>
                    <th><input id="location" class="form-control form-control-sm" type="text" placeholder="location"></th>
                    <th><input id="experience" class="form-control form-control-sm" type="text" placeholder="experience"></th>
                    <th><input id="role" class="form-control form-control-sm" type="text" placeholder="role"></th>
                    <th><input id="gender" class="form-control form-control-sm" type="text" placeholder="gender"></th>
                    <th><input id="education" class="form-control form-control-sm" type="text" placeholder="education"></th>
                    <th><input id="hours" class="form-control form-control-sm" type="text" placeholder="hours"></th>
                    <th><input id="salary" class="form-control form-control-sm" type="text" placeholder="salary"></th>
                    <th><input id="stype" class="form-control form-control-sm" type="text" placeholder="stype"></th>
                    <th><input id="status" class="form-control form-control-sm" type="text" placeholder="status"></th>
					<th><input type="text" style="width: auto;" class="form-control form-control-sm float-right" id="date"></th>
				  </tr>
          <tr>
                    <th>S. No.</th>
                    <th>Job ID</th>
                    <th>Brand ID</th>
                    <th>Title</th>
                    <th>No. of Positions</th>
                    <th>Sector</th>
                    <th>Skill Level Required</th>
                    <th>Skill-Set required</th>
                    <th>Nature of Job</th>
                    <th>Man-days required</th>
                    <th>Piece-rate</th>
                    <th>Place of employment</th>
                    <th>Job Location</th>
                    <th>Experience</th>
                    <th>Job role</th>
                    <th>Gender Preference</th>
                    <th>Education</th>
                    <th>Working Hours</th>
                    <th>Salary package</th>
                    <th>Salary Type</th>
                    <th>Status</th>
                    <th>Posted On</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM jobs WHERE brand_id = '$bid' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno=0;
				  while($row = mysqli_fetch_array($run_query))
				  {
            $sno++;
					  
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
					  //$image = base_url.'upload/users/'.
					  
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><a href="worker_job_info2.php?id=<?= $row['id']; ?>"><?= "WJ-".$row['id']; ?></a></td>
                    <td><?= $bdata['name']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['position']; ?></td>
                    <td><?= $sdata['title']; ?></td>
                    <td><?= $skldata['title']; ?></td>
                    <td><?= $skdata['title']; ?></td>
                    <td><?= $naturedata['title']; ?></td>
                    <td><?= $row['man_days']; ?></td>
                    <td><?= $row['piece_rate']; ?></td>
                    <td><?= $placedata['title']; ?></td>
                    <td><?= $loc; ?></td>
                    <td><?= $lexperiencedata['title']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td><?= $genderdata['title']; ?></td>
                    <td><?= $educationdata['title']; ?></td>
                    <td><?= $row['hours']; ?></td>
                    <td><?= $row['salary']; ?></td>
                    <td><?= $stypedata['title']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
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
