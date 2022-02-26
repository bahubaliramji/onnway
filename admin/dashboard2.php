<?php

include('inc/head2.php');

?>

  <?php

include('inc/sidebar2.php');

?>

<?php


$wjcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs WHERE brand_id = '$bid'"));

$wacount = 0;
$jquery = mysqli_query($con , "SELECT * FROM jobs WHERE brand_id = '$bid'");
 while($row = mysqli_fetch_array($jquery))
{
	$jid = $row['id'];
	$cc = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application WHERE job_id = '$jid'"));
	$wacount = $wacount + $cc;
} 


$cjcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs_contractor WHERE contractor_id = '$bid'"));

$cacount = 0;
$cquery = mysqli_query($con , "SELECT * FROM jobs_contractor WHERE contractor_id = '$bid'");
 while($row = mysqli_fetch_array($cquery))
{
	$jid = $row['id'];
	$cc = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application2 WHERE job_id = '$jid'"));
	$cacount = $cacount + $cc;
}


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
		
		
		
          
		  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: white;">
              <div class="inner">
                <h3><?= $wjcount; ?></h3>

                <p>Total Workers Jobs Posted</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: white;">
              <div class="inner">
                <h3><?= $wacount; ?></h3>

                <p>Total Workers Jobs Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-document"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: white;">
              <div class="inner">
                <h3><?= $cjcount; ?></h3>

                <p>Total Contractors Jobs Posted</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: white;">
              <div class="inner">
                <h3><?= $cacount; ?></h3>

                <p>Total Contractors Jobs Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-document"></i>
              </div>
            </div>
          </div>
		  
          <!-- ./col -->
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
