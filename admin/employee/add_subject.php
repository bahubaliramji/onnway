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
            <h1 class="m-0 text-dark">Add Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Subject</li>
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
              $type = $_POST['type'];

$question_insert = "INSERT INTO `subject` (`title`) VALUES ('$title')";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:subject.php');
                }
                else
                {
                  $error = "Some error occurred";
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
    <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Subject" required>
                  </div>
                </div> 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-success" value="Add Subject">
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
