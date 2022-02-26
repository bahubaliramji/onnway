<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM category WHERE id = '$id'";
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
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Categories</li>
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

              
                $location_id = $_POST['location_id'];
              $name = $_POST['name'];
              $status = $_POST['status'];

              if(empty($location_id) or empty($name))
              {
                $error = "Please fill all fields";
              }
              else
			  {

                $ythumb1 = $_FILES['image']['name'];
                $ytmp_thumb1 = $_FILES['image']['tmp_name'];
                $ypath1 = "upload/cat/".$ythumb1;
                if(move_uploaded_file($ytmp_thumb1,$ypath1))
                {

                    $imm1 = $ythumb1;

                    $question_insert = "UPDATE category SET 
                    location_id = '$location_id', 
                    name = '$name', 
                    image = '$imm1',
                    status = '$status'
                    WHERE id = '$id'";
                }
                else {
                    $question_insert = "UPDATE category SET 
                    location_id = '$location_id', 
                    name = '$name', 
                    status = '$status'
                    WHERE id = '$id'";
                }

				  
				 
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:categories.php');
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
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="location_id">Location</label>
                                    <select class="form-control" style="width: 100%;" name="location_id"
                                        aria-hidden="true">
                                        <?php
					$query = "SELECT * FROM location ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id1 = $row['id'];
					 $sid1 = $data['location_id'];
					 
					 if($id1 == $sid1)
					 {
						 
					?>
                                        <option value="<?= $id1; ?>" selected><?= $row['city']; ?></option>
                                        <?php
					 }
					 else
					 {
						 ?>
                                        <option value="<?= $id1; ?>"><?= $row['city']; ?></option>
                                        <?php
					 }
				  }
					?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="<?= $data['name']; ?>" name="name"
                                        placeholder="Enter Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image"><?= $data['image']; ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                                        <?php
					$s = $data['status'];
					if($s == 'active')
					{
					?>
                                        <option value="active" selected>Active</option>
                                        <?php
					}
					else
					{
					?>
                                        <option value="active">Active</option>
                                        <?php
					}
					?>
                                        <?php
					if($s == 'inactive')
					{
					?>
                                        <option value="inactive" selected>Inactive</option>
                                        <?php
					}
					else
					{
					?>
                                        <option value="inactive">Inactive</option>
                                        <?php
					}
					?>
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