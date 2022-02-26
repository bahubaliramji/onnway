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
              <li class="breadcrumb-item"><a href="worker_jobs2.php">Worker Jobs</a></li>
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

              
              $title = $_POST['title'];
              $position = $_POST['position'];
			  $sector = $_POST['sector'];
              $skill_level = $_POST['skill_level'];
              $skills = $_POST['skills'];
              $nature = $_POST['nature'];
              $man_days = $_POST['man_days'];
              $piece_rate = $_POST['piece_rate'];
              $place = $_POST['place'];
              $location = $_POST['location'];
              $experience = $_POST['experience'];
              $role = $_POST['role'];
              $gender = $_POST['gender'];
              $education = $_POST['education'];
              $hours = $_POST['hours'];
              $salary = $_POST['salary'];
              $stype = $_POST['stype'];
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

              if(empty($title) or empty($position) or empty($role) or empty($sector))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "INSERT INTO jobs 
                  (brand_id , title, position, sector, skill_level , skills, nature , man_days, piece_rate, place , 
                  location , experience , role , gender , education , hours , salary , stype , display_name , display_phone , display_person , display_email) VALUES 
                  ('$bid' , '$title', '$position', '$sector', '$skill_level' , '$skills' , '$nature', '$man_days', '$piece_rate', '$place' , 
                  '$location' , '$experience' , '$role' , '$gender' , '$education' , '$hours' , '$salary' , '$stype' , '$dna' , '$dph' , '$dpe' , '$dem')";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:worker_jobs2.php');
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
                    <label for="title">Job Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                  </div>

                  <div class="form-group">
                    <label for="position">No. of positions</label>
                    <input type="number" class="form-control" name="position" placeholder="Enter position" required>
                  </div>



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
                    <label for="skill_level">Skill level required</label>
                    <select class="form-control" style="width: 100%;" name="skill_level" aria-hidden="true">
					<?php
					$query = "SELECT * FROM skill_level_job WHERE status = 'active'";
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
                    <label for="skills">Skill set required</label>
                    <select class="form-control" style="width: 100%;" name="skills" aria-hidden="true">
					
                  </select>
                  </div>
                  

                  <div class="form-group">
                    <label for="nature">Nature of job</label>
                    <select class="form-control" style="width: 100%;" name="nature" aria-hidden="true">
					<?php
					$query = "SELECT * FROM nature WHERE status = 'active'";
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
                    <label for="man_days">Man days required</label>
                    <input type="number" class="form-control" name="man_days" placeholder="Enter man days">
                  </div>

                  <div class="form-group">
                    <label for="piece_rate">Piece rate</label>
                    <input type="text" class="form-control" name="piece_rate" placeholder="Enter piece rate">
                  </div>


                  <div class="form-group">
                    <label for="place">Place of employment</label>
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
                    <label for="location">Job location</label>
                    <select class="form-control" style="width: 100%;" name="location" aria-hidden="true">
					<?php
					$query = "SELECT * FROM locations WHERE status = 'active'";
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
                    <label for="role">Job role</label>
                    <input type="text" class="form-control" name="role" placeholder="Enter job role" required>
                  </div>


                  <div class="form-group">
                    <label for="gender">Gender preference</label>
                    <select class="form-control" style="width: 100%;" name="gender" aria-hidden="true">
					<?php
					$query = "SELECT * FROM gender_prefence WHERE status = 'active'";
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
                    <label for="education">Education</label>
                    <select class="form-control" style="width: 100%;" name="education" aria-hidden="true">
					<?php
					$query = "SELECT * FROM education_job WHERE status = 'active'";
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
                    <label for="hours">Working hours</label>
                    <input type="text" class="form-control" name="hours" placeholder="Enter hours">
                  </div>

                  <div class="form-group">
                    <label for="salary">Salary package</label>
                    <input type="text" class="form-control" name="salary" placeholder="Enter salary package">
                  </div>

                  <div class="form-group">
                    <label for="stype">Salary type</label>
                    <select class="form-control" style="width: 100%;" name="stype" aria-hidden="true">
					<?php
					$query = "SELECT * FROM salary_type WHERE status = 'active'";
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
