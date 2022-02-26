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
                    <h1 class="m-0 text-dark">Add Sub Category 2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Sub Categories 2</li>
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

              
              $location_id = $_POST['location_id'];
              $cat = $_POST['cat'];
              $subcat1 = $_POST['subcat1'];
              $name = $_POST['name'];
              $status = $_POST['status'];

              if(empty($location_id) or empty($name))
              {
                $error = "Please fill all fields";
              }
              else
			  {

                
				  
                    $question_insert = "INSERT INTO `sub_cat2` (
                        `location_id`,
                        `cat`,
                        `subcat1`,
                        `name`,
                        `status`
                        ) 
                  VALUES (
                      '$location_id',
                      '$cat',
                      '$subcat1',
                      '$name',
                      '$status'
                      )";
                  if(mysqli_query($con,$question_insert))
                  {
                    header('Location:sub_categories2.php');
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
                                    <label for="location_id">Location</label>
                                    <select class="form-control" style="width: 100%;" name="location_id"
                                        aria-hidden="true" required>
                                        <option value="">--- Select ---</option>
                                        <?php
					$query = "SELECT * FROM location ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
                                        <option value="<?= $id; ?>"><?= $row['city']; ?></option>
                                        <?php
				  }
					?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cat">Category</label>
                                    <select class="form-control" style="width: 100%;" name="cat" aria-hidden="true"
                                        required>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="subcat1">Sub Category 1</label>
                                    <select class="form-control" style="width: 100%;" name="subcat1" aria-hidden="true">

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true"
                                        required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
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