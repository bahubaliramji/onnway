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
            <h1 class="m-0 text-dark">Post Job</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
              <li class="breadcrumb-item"><a href="contractor_jobs2.php">Contractor Jobs</a></li>
              <li class="breadcrumb-item active">Post Job</li>
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

              
			  $sector = $_POST['sector'];
              $job_type = $_POST['job_type'];
              $experience = $_POST['experience'];
              $days = $_POST['days'];
              $rate = $_POST['rate'];
              $place = $_POST['place'];
              $location = $_POST['location'];
              
              $display_name = $_POST['display_name'];
              $display_phone = $_POST['display_phone'];
              $display_person = $_POST['display_person'];
              $display_email = $_POST['display_email'];


              $dna = 'false';
              $dph = 'false';
              $dpe = 'false';
              $dem = 'false';

              if($display_name)
              {
                $dna = 'true';
              }
              if($display_phone)
              {
                $dph = 'true';
              }
              if($display_person)
              {
                $dpe = 'true';
              }
              if($display_email)
              {
                $dem = 'true';
              }

              if(empty($sector))
              {
                $error = "Please fill all fields";
              }
              else
			  {
                  
                


                $ythumb1 = $_FILES['sample1']['name'];
$ytmp_thumb1 = $_FILES['sample1']['tmp_name'];
 $ypath1 = "upload/sample/".$ythumb1 ;
move_uploaded_file($ytmp_thumb1,$ypath1);
	
	
	$imm1 = $ythumb1;


$ythumb2 = $_FILES['sample2']['name'];
$ytmp_thumb2 = $_FILES['sample2']['tmp_name'];
 $ypath2 = "upload/sample/".$ythumb2 ;
move_uploaded_file($ytmp_thumb2,$ypath2);
	
	
	$imm2 = $ythumb2;
	
	
	$ythumb3 = $_FILES['sample3']['name'];
$ytmp_thumb3 = $_FILES['sample3']['tmp_name'];
 $ypath3 = "upload/sample/".$ythumb3 ;
move_uploaded_file($ytmp_thumb3,$ypath3);
	
	
	$imm3 = $ythumb3;
	
	
	$ythumb4 = $_FILES['sample4']['name'];
$ytmp_thumb4 = $_FILES['sample4']['tmp_name'];
 $ypath4 = "upload/sample/".$ythumb4 ;
move_uploaded_file($ytmp_thumb4,$ypath4);
	
	
	$imm4 = $ythumb4;
	
	
	$ythumb5 = $_FILES['sample5']['name'];
$ytmp_thumb5 = $_FILES['sample5']['tmp_name'];
 $ypath5 = "upload/sample/".$ythumb5 ;
move_uploaded_file($ytmp_thumb5,$ypath5);
	
	
	$imm5 = $ythumb5;






				  $question_insert = "INSERT INTO jobs_contractor (contractor_id, sector , title , job_type , 
                  experience , days , sample1, sample2, sample3, sample4, sample5 , rate, place, display_name, display_phone, display_person, display_email
                  ) VALUES 
                      ('$bid', '$sector' , 'Contractor' , '$job_type' , 
                      '$experience' , '$days' , '$imm1', '$imm2', '$imm3', '$imm4', '$imm5' , '$rate', '$place', '$dna', '$dph', '$dpe', '$dem'
                      )";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:contractor_jobs2.php');
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
               <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                



				<div class="form-group">
                    <label for="sector">Sector</label>
                    <select class="form-control" style="width: 100%;" name="sector" aria-hidden="true">
                    <option value="">--- Select ---</option>
					<?php
					$query = "SELECT * FROM sectors WHERE status = 'active'";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
                    <option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                  </select>
                  </div>
                



                  <div class="form-group">
                    <label for="job_type">Job Type</label>
                    <select class="form-control" style="width: 100%;" name="job_type" aria-hidden="true">
					
                  </select>
                  </div>
                  

                  <div class="form-group">
                    <label for="experience">Experience</label>
                    <select class="form-control" style="width: 100%;" name="experience" aria-hidden="true">
					<?php
					$query = "SELECT * FROM experience WHERE status = 'active'";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
                    <option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                  </select>
                  </div>

                  <div class="form-group">
                    <label for="days">Man days required</label>
                    <input type="number" class="form-control" name="days" placeholder="Enter man days">
                  </div>

                  <div class="form-group">
                    <label for="rate">Piece rate</label>
                    <input type="text" class="form-control" name="rate" placeholder="Enter piece rate">
                  </div>


                  <div class="form-group">
                    <label for="place">Job Location</label>
                    <select class="form-control" style="width: 100%;" name="place" aria-hidden="true">
					<?php
					$query = "SELECT * FROM place WHERE status = 'active'";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
                    <option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                  </select>
                  </div>



                  <div class="form-group">
                    <label for="exampleInputFile">Design/ Samples</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sample1" name="sample1">
                        <label class="custom-file-label" for="sample1">Sample 1</label>
                      </div>
                    </div>
</br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sample2" name="sample2">
                        <label class="custom-file-label" for="sample2">Sample 2</label>
                      </div>
                    </div>
                    </br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sample3" name="sample3">
                        <label class="custom-file-label" for="sample3">Sample 3</label>
                      </div>
                    </div>
                    </br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sample4" name="sample4">
                        <label class="custom-file-label" for="sample4">Sample 4</label>
                      </div>
                    </div>
                    </br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sample5" name="sample5">
                        <label class="custom-file-label" for="sample5">Sample 5</label>
                      </div>
                    </div>

                  </div>
                 
                 

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="display_name" name="display_name">
                    <label class="form-check-label" for="display_name">Display name of business</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="display_phone" name="display_phone">
                    <label class="form-check-label" for="display_phone">Display contact number</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="display_person" name="display_person">
                    <label class="form-check-label" for="display_person">Display contact person</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="display_email" name="display_email">
                    <label class="form-check-label" for="display_email">Display email ID</label>
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
