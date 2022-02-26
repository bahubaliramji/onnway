<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['id']))
  {
	  
	  $GLOBALS['base_url'] = base_url ;
	  
    $id = $_GET['id'];
    $squery =  "SELECT * FROM jobs_contractor WHERE id = '$id'";
    $row = mysqli_fetch_array(mysqli_query($con , $squery));
    $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$id'"));
	
	$brand_id = $row['contractor_id'];
					  $sector = $row['sector'];
					  $job_type = $row['job_type'];
					  $place = $row['place'];
					  
					  $bdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$brand_id'"));
					  $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector'"));
					  $skdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM roles WHERE id = '$job_type'"));
					  $placedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM place WHERE id = '$place'"));
					  
            $image1 = $row['sample1'];
            $image2 = $row['sample2'];
            $image3 = $row['sample3'];
            $image4 = $row['sample4'];
            $image5 = $row['sample5'];
	
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
              <li class="breadcrumb-item active"><a href="contractor_jobs.php">Contractor Jobs</a></li>
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
                    <b>Job ID</b> <a class="float-right"><?= "CJ-".$row['id']; ?></a>
                  </li>
				
                  <li class="list-group-item">
                    <b>Brand ID</b> <a class="float-right"><?= $bdata['name']; ?></a>
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
				 
				  <dt>Sector</dt>
                  <dd><?= $sdata['title']; ?></dd>
				 
                  <dt>Job Type</dt>
                  <dd><?= $skdata['title']; ?></dd>
				  
                  <dt>Experience</dt>
                  <dd><?= $row['experience']; ?></dd>
                  
				
				<dt>Man-days required</dt>
                  <dd><?= $row['days']; ?></dd>
                
				<dt>Piece-rate</dt>
                  <dd><?= $row['rate']; ?></dd>
                
        <dt>Design/Sample</dt>
        <?php
        if(!empty($image1))
        {
        ?>
                  <dd>
				  
				  
				  
                      <a href="<?= base_url.'upload/sample/'.$image1; ?>" data-toggle="lightbox">
                        <?= base_url.'upload/sample/'.$image1; ?>
                      </a>
                    
				  </dd>
                
        <?php
        }
        ?>
        
        
        <?php
        if(!empty($image2))
        {
        ?>
                  <dd>
				  
				  
				  
                      <a href="<?= base_url.'upload/sample/'.$image2; ?>" data-toggle="lightbox">
                        <?= base_url.'upload/sample/'.$image2; ?>
                      </a>
                    
				  </dd>
                
        <?php
        }
        ?>


<?php
        if(!empty($image3))
        {
        ?>
                  <dd>
				  
				  
				  
                      <a href="<?= base_url.'upload/sample/'.$image3; ?>" data-toggle="lightbox">
                        <?= base_url.'upload/sample/'.$image3; ?>
                      </a>
                    
				  </dd>
                
        <?php
        }
        ?>


<?php
        if(!empty($image4))
        {
        ?>
                  <dd>
				  
				  
				  
                      <a href="<?= base_url.'upload/sample/'.$image4; ?>" data-toggle="lightbox">
                        <?= base_url.'upload/sample/'.$image4; ?>
                      </a>
                    
				  </dd>
                
        <?php
        }
        ?>


<?php
        if(!empty($image5))
        {
        ?>
                  <dd>
				  
				  
				  
                      <a href="<?= base_url.'upload/sample/'.$image5; ?>" data-toggle="lightbox">
                        <?= base_url.'upload/sample/'.$image5; ?>
                      </a>
                    
				  </dd>
                
        <?php
        }
        ?>

			
				
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
				  
				  $query = "SELECT * FROM job_application2 WHERE job_id = '$id' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno=0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  
					  $user_id = $row['user_id'];
					  
					  $workerdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM contractors WHERE user_id = '$user_id'"));
					  
					  $loc = $locationdata['title'];
					  if(empty($loc))
					  {
						  $loc = $location;
					  }
					  //$image = base_url.'upload/users/'.
					  
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><a href="contractor_profile.php?id=<?= $workerdata['user_id']; ?>"><?= $workerdata['name']; ?></a></td>
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
