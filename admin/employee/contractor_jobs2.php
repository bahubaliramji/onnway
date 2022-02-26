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
            <h1 class="m-0 text-dark">Contractor Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
              <li class="breadcrumb-item active">Contractor Jobs</li>
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
                
                <a href="post_job2.php" class="btn btn-outline-success">POST JOB</a>
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example7" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
					<th></th>
                    <th><input id="jobid" class="form-control form-control-sm" type="text" placeholder="job"></th>
                    <th><input id="brand" class="form-control form-control-sm" type="text" placeholder="brand"></th>
                    <th><input id="sector" class="form-control form-control-sm" type="text" placeholder="sector"></th>
                    <th><input id="job_type" class="form-control form-control-sm" type="text" placeholder="job type"></th>
                    <th><input id="experience" class="form-control form-control-sm" type="text" placeholder="experience"></th>
                    <th><input id="man_days" class="form-control form-control-sm" type="text" placeholder="man days"></th>
                    <th><input id="piece" class="form-control form-control-sm" type="text" placeholder="piece rate"></th>
                    <th><input id="location" class="form-control form-control-sm" type="text" placeholder="location"></th>
                    <th><input id="status" class="form-control form-control-sm" type="text" placeholder="status"></th>
					<th><input type="text" style="width: auto;" class="form-control form-control-sm float-right" id="date"></th>
					
				  </tr>
          <tr>
                    <th>S. No.</th>
                    <th>Job ID</th>
                    <th>Brand ID</th>
                    <th>Sector</th>
                    <th>Job Type</th>
                    <th>Experience</th>
                    <th>Man-days required</th>
                    <th>Piece-rate</th>
                    <th>Job Location</th>
                    <th>Status</th>
                    <th>Posted On</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM jobs_contractor WHERE contractor_id = '$bid' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno=0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					  $brand_id = $row['contractor_id'];
					  $sector = $row['sector'];
					  $job_type = $row['job_type'];
					  $place = $row['place'];
					  
					  $bdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$brand_id'"));
					  $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector'"));
					  $skdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM roles WHERE id = '$job_type'"));
					  $placedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM place WHERE id = '$place'"));
					  
					  $image = $row['sample'];
					  
					  //$image = base_url.'upload/users/'.
					  
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><a href="contractor_job_info2.php?id=<?= $row['id']; ?>"><?= "CJ-".$row['id']; ?></a></td>
                    <td><?= $bdata['name']; ?></td>
                    <td><?= $sdata['title']; ?></td>
                    <td><?= $skdata['title']; ?></td>
                    <td><?= $row['experience']; ?></td>
                    <td><?= $row['days']; ?></td>
                    <td><?= $row['rate']; ?></td>
                    <td><?= $placedata['title']; ?></td>
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
