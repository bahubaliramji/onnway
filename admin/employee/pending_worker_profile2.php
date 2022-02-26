<?php

include('inc/head3.php');

?>

  <?php

include('inc/sidebar3.php');

if(isset($_GET['id']))
  {
	  
	  $GLOBALS['base_url'] = base_url ;
	  
    $id = $_GET['id'];
    $sid = $_GET['sid'];
    $squery =  "SELECT * FROM workers WHERE user_id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
    $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$id'"));
	
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Worker Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard3.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="ongoing.php">Ongoing Surveys</a></li>
              <li class="breadcrumb-item active">Worker Profile</li>
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
                  <img style="height: 200px;width: auto;max-width: 100%;"
                       src="<?= base_url."upload/users/".$data['photo']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data['name']; ?></h3>

                <p class="text-muted text-center"><?= $udata['phone']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>D.O.B.</b> <a class="float-right"><?= $data['dob']; ?></a>
                  </li>
				  
				  <li class="list-group-item">
                    <b>Age</b> <a class="float-right"><?= $data['age']; ?></a>
                  </li>
				  
                  <li class="list-group-item">
                  <?php
$gender = $data['gender'];
$cgenderdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM gender WHERE id = '$gender'"));

?>
          
                  <b>Gender</b> <a class="float-right"><?= $cgenderdata['title']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Joined On</b> <a class="float-right"><?= $udata['created']; ?></a>
                  </li>
				  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Address</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Current Address</strong>

                <p class="text-muted">
                  <?= $data['cstreet']; ?>, <?= $data['carea']; ?>, <?= $data['cdistrict']; ?>, <?= $data['cstate']; ?>, <?= $data['cpin']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Permanent Address</strong>

                <p class="text-muted">
				<?= $data['pstreet']; ?>, <?= $data['parea']; ?>, <?= $data['pdistrict']; ?>, <?= $data['pstate']; ?>, <?= $data['ppin']; ?>
				</p>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Professional Info</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    

                 <dl>
				 <dt>Proof of Identity</dt>
				 <?php
				 $id_proof = $data['id_proof'];
				 $proofdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM proof WHERE id = '$id_proof'"));
				 
				 ?>
                  <dd><?= $proofdata['title']; ?></dd>
				  
				  <dt>ID Number</dt>
                  <dd><?= $data['id_number']; ?></dd>
				 
                  <dt>Category</dt>
				  <?php
				 $category = $data['category'];
				 $catdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM category WHERE id = '$category'"));
				 
				 ?>
                  <dd><?= $catdata['title']; ?></dd>
				  
                  <dt>Religion</dt>
				  <?php
				 $religion = $data['religion'];
				 $religiondata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM religion WHERE id = '$religion'"));
				 
				 ?>
                  <dd><?= $religiondata['title']; ?></dd>
                  
				  <dt>Education Status</dt>
                  <?php
				 $educational = $data['educational'];
				 $educationaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM education WHERE id = '$educational'"));
         if($educationaldata != null)
         {
            $ed = $educationaldata['title'];
         }
         else
         {
            $ed = $educational;
         }
				 ?>
				  <dd><?= $ed; ?></dd>
                
				<dt>Marital Status</dt>
				<?php
				 $marital = $data['marital'];
				 $maritaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM marital WHERE id = '$marital'"));
				 
				 ?>
                  <dd><?= $maritaldata['title']; ?></dd>
                
				<dt>Number of Children</dt>
                  <dd><?= $data['children']; ?></dd>
                
				<dt>Number of Children below 6 years</dt>
                  <dd><?= $data['belowsix']; ?></dd>
                
				
				<dt>Number of Children in the age group of 6-14 years</dt>
                  <dd><?= $data['sixtofourteen']; ?></dd>
                
				
				<dt>Number of Children in the age group of 15-18 years</dt>
                  <dd><?= $data['fifteentoeighteen']; ?></dd>
                
				<dt>Number of children going to school between 6-14 years</dt>
                  <dd><?= $data['goingtoschool']; ?></dd>

                  <dt>Number of children going to school between 15-18 years</dt>
                  <dd><?= $data['goingtoschool2']; ?></dd>
                
				<dt>Certified by Goodweave</dt>
				<?php
				 $certified = $data['certified'];
				 $certifieddata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$certified'"));
				 
				 ?>
                  <dd><?= $certifieddata['title']; ?></dd>
				  
				  <dt>Certificate Number</dt>
                  <dd><?= $data['certification_number']; ?></dd>
				  
				  <dt>Skill Level</dt>
				  <?php
				 $skill_level = $data['skill_level'];
				 $skill_leveldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skill_level WHERE id = '$skill_level'"));
				 
				 ?>
                  <dd><?= $skill_leveldata['title']; ?></dd>
				  
				  <dt>Annual Income</dt>
                  <dd><?= $data['annual_income']; ?></dd>
				  <dt>Other sources of Income</dt>
                  <dd><?= $data['other_source']; ?></dd>
				
				</dl>

                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   <dl>
				   
				   <?php
				   $ski1 = $data['sector'];
    
           
		
           $ski_arr1 = explode (",", $ski1);
           
           $sktitle1 = array();
           
           foreach ($ski_arr1 as $value) {
           $ddd1 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$value'"));
         $sktitle1[] = $ddd1['title'];
       }
           $sist1 = implode(', ', $sktitle1);


				   ?>
				   
                  <dt>Sector</dt>
                  <dd><?= $sist1; ?></dd>
                  
				  <?php
				  $ski = $data['skills'];
		
		$ski_arr = explode (",", $ski);
		
		$sktitle = array();
		
		foreach ($ski_arr as $value) {
      if($value == '59')
      {
        $sktitle[] = $data['otherwork'];
      }
      else
      {
        $ddd = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skills WHERE id = '$value'"));
        $sktitle[] = $ddd['title'];
      }
    
}
		$sist = implode(', ', $sktitle);
				  ?>
				  
				  <dt>Skills</dt>
                  <dd><?= $sist; ?></dd>
                  
				  <dt>Years of Experience</dt>
                  <dd><?= $data['experience']; ?></dd>
                
				<dt>Current Employment Status</dt>
				<?php
				 $employment = $data['employment'];
				 $employmentdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM employement WHERE id = '$employment'"));
				 
				 ?>
                  <dd><?= $employmentdata['title']; ?></dd>
                
				<dt>Employer (Previous/Current)</dt>
                  <dd><?= $data['employer']; ?></dd>
                
				<dt>Owns a home based unit</dt>
				<?php
				 $home = $data['home'];
				 $homedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$home'"));
				 
				 ?>
                  <dd><?= $homedata['title']; ?></dd>
                
				<dt>Number of Workers</dt>
                  <dd><?= $data['workers']; ?></dd>
                
				<dt>Production machinaries/ tools</dt>
                  <dd><?= $data['looms']; ?></dd>
                
        <dt>Preferred Location of Work</dt>
        
        <?php
				 $location = $data['location'];
				 $locationdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM locations WHERE id = '$location'"));
         if($locationdata != null)
         {
            $ed = $locationdata['title'];
         }
         else
         {
            $ed = $location;
         }
				 ?>

                  <dd><?= $ed; ?></dd>
                
				</dl>
                    
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
		  
		  <!-- /.col -->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                 <h3 class="card-title">
                  Profile Actions
                </h3>
              </div><!-- /.card-header -->
                
				<?php
            if(isset($_POST['approve']))
            {
				
				$question_insert = "UPDATE `workers` SET `status` = 'submitted' WHERE `user_id` = '$id'";
                if(mysqli_query($con,$question_insert))
                {
					
					$question_insert = "UPDATE `assigned_surveys` SET `status` = 'submitted', `officer_id` = '$oid' WHERE `id` = '$sid'";
					mysqli_query($con,$question_insert);
                  header('Location:dashboard3.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
              
            } 
            ?>
				
				<form role="form" method="POST">
                
                <div class="card-footer">
                  <button type="submit" name="approve" class="btn btn-block btn-success">APPROVE</button>
                </div>
              </form>
				</br>
				
				<?php
            if(isset($_POST['reject']))
            {
				$reason = $_POST['reason'];
				
				$question_insert = "UPDATE `workers` SET `status` = 'rejected', reject_reason = '$reason' WHERE `user_id` = '$id'";
                if(mysqli_query($con,$question_insert))
                {
					
					$question_insert = "UPDATE `assigned_surveys` SET `status` = 'rejected', `officer_id` = '$oid' WHERE `id` = '$sid'";
					mysqli_query($con,$question_insert);
                  header('Location:dashboard3.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
              
            } 
            ?>
				
				<form role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="reason">Reject Reason</label>
                    <input type="text" class="form-control" name="reason" placeholder="Enter Reject Reason" required>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reject" class="btn btn-block btn-danger">REJECT</button>
                </div>
              </form>
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
