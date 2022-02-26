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
                    <h1 class="m-0 text-dark">Add Referral Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Referral Codes</li>
                        <li class="breadcrumb-item active">Add Data</li>
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

              
                $code = $_POST['code'];
                $mobile = $_POST['mobile'];
  
                if(empty($code) or empty($mobile))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "INSERT INTO `referral` (`code`,`mobile`) 
                VALUES ('$code','$mobile')";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:refer.php');
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
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" placeholder="Enter Code"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile"
                                        required>
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