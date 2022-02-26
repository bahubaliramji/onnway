<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['id']))
  {
	  
	  $GLOBALS['base_url'] = base_url ;
	  
    $id = $_GET['id'];
    $squery =  "SELECT * FROM brands WHERE user_id = '$id'";
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
            <h1 class="m-0 text-dark">Brand Profile (<?= 'B00'.$id; ?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="verified_brands.php">Verified Profiles</a></li>
              <li class="breadcrumb-item active">Brand Profile</li>
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
                       src="<?= base_url."upload/logo/".$data['logo']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data['name']; ?></h3>

                <p class="text-muted text-center"><?= $udata['phone']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
				
				<li class="list-group-item">
                    <b>Business Name</b> <a class="float-right"><?= $data['business_name']; ?></a>
                  </li>
				
                  <li class="list-group-item">
                    <b>Contact Person</b> <a class="float-right"><?= $data['contact_person']; ?></a>
                  </li>
				  
				  <li class="list-group-item">
                    <b>Company Contact Details</b> <a class="float-right"><?= $data['contact_details']; ?></a>
                  </li>
				  
                  <li class="list-group-item">
                    <b>Approved On</b> <a class="float-right"><?= $udata['created']; ?></a>
                  </li>
				  <li class="list-group-item">
                    <b>Profile Status</b> <a class="float-right"><?= $udata['status']; ?></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Brand Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Pictures</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    

                 <dl>
				 <dt>Type of Firm</dt>
				 <?php
				 $firm_type = $data['firm_type'];
				 $proofdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM firm_type WHERE id = '$firm_type'"));
				 
				 ?>
                  <dd><?= $proofdata['title']; ?></dd>
				  
				  <dt>Type of Firm Regiatration</dt>
				  <?php
				 $firm_registration_type = $data['firm_registration_type'];
				 $firm_registration_typeata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM firm_type_registration WHERE id = '$firm_registration_type'"));
				 
				 ?>
                  <dd><?= $firm_registration_typeata['title']; ?></dd>
				 
                  <dt>Registration Number</dt>
				  <?php
				 $category = $data['category'];
				 $catdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM category WHERE id = '$category'"));
				 
				 ?>
                  <dd><?= $data['registration_number']; ?></dd>
				  
                  <dt>Sector</dt>
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
                  <dd><?= $sist1; ?></dd>
                  
                  <dt>Types of Unit/ Processes</dt>
				<?php
				$ski = $data['processes'];
		
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
                  <dd><?= $sist; ?></dd>


				  <dt>Manufacturing Units</dt>
                  <?php
				 $educational = $data['educational'];
				 $educationaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM education WHERE id = '$educational'"));
				 
				 ?>
				  <dd><?= $data['manufacturing_units']; ?></dd>
                
				<dt>Factory Outlets</dt>
				<?php
				 $marital = $data['marital'];
				 $maritaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM marital WHERE id = '$marital'"));
				 
				 ?>
                  <dd><?= $data['factory_outlet']; ?></dd>
                
				<dt>Types of Products</dt>
                  <dd><?= $data['products']; ?></dd>
                
				<dt>Exporting Countries</dt>
                  <dd><?= $data['country']; ?></dd>
                
				
				<dt>Total Workers</dt>
                  <dd><?= $data['workers']; ?></dd>
                
				
				<dt>Goodweave Certification</dt>
				<?php
				 $certified = $data['certification'];
				 $certifieddata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$certified'"));
				 
				 ?>
                  <dd><?= $certifieddata['title']; ?></dd>
                
				<dt>Certificate Expiry Date</dt>
                  <dd><?= $data['expiry']; ?></dd>
                
				<dt>Website Address</dt>
				
                  <dd><?= $data['website']; ?></dd>
				  
				  <dt>Email Address</dt>
                  <dd><?= $data['email']; ?></dd>
				  
				  
				</dl>

                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   
                <div class="row">
				
				<?php
				
				$samplequery = mysqli_query($con , "SELECT * FROM sample WHERE user_id = '$id'");
				while($report_data = mysqli_fetch_array($samplequery))
	{
				?>
				
                  <div class="col-sm-4">
                    <a href="<?= base_url."upload/cont_sample/".$report_data['file']; ?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="<?= base_url."upload/cont_sample/".$report_data['file']; ?>" class="img-fluid mb-2" alt="sample"/>
                    </a>
                  </div>
				  
				  <?php
	}
				  ?>
                </div>
              
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
				$status = $udata['status'];
				if($status == 'active')
				{
				?>
				
				<?php
            if(isset($_POST['deactivate']))
            {
				
				$question_insert = "UPDATE `users` SET `status` = 'inactive' WHERE `id` = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:verified_brands.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
              
            } 
            ?>
				
				<form role="form" method="POST">
                
                <div class="card-footer">
                  <button type="submit" name="deactivate" class="btn btn-block btn-danger">DEACTIVATE</button>
                </div>
              </form>
                <?php
				}
				else
				{
				?>
				
				<?php
            if(isset($_POST['activate']))
            {
				
				$question_insert = "UPDATE `users` SET `status` = 'active' WHERE `id` = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:verified_brands.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
              
            } 
            ?>
				
				<form role="form" method="POST">
                
                <div class="card-footer">
                  <button type="submit" name="activate" class="btn btn-block btn-success">ACTIVATE</button>
                </div>
              </form>
				<?php
				}
				?>
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
