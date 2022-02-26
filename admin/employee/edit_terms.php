<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM terms WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
	
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Terms & Conditions Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Terms & Conditions</li>
              <li class="breadcrumb-item active">Edit Data</li>
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

              
              $type = $_POST['type'];
              $content = $_POST['content'];
              $status = $_POST['status'];

              if(empty($content))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "UPDATE terms SET terms_and_conditions = '$content' WHERE id = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:terms.php');
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
				<h3 class="card-title">Edit Data</h3>
				<?php
				}
				?>
              </div>
			  
			  
			  
              <!-- /.card-header -->
               <form role="form" method="POST">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="content">Content</label>
                    <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="content"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['terms_and_conditions']; ?></textarea>
              </div>
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
