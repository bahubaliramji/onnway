<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM promo_banner WHERE id = '$id'";
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
                    <h1 class="m-0 text-dark">Edit Promotional Banner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Promotional Banners</li>
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
                $cat = $_POST['cat'];
              $status = $_POST['status'];

              if(empty($status))
              {
                $error = "Please fill all fields";
              }
              else
			  {

                $ythumb1 = $_FILES['image']['name'];
                $ytmp_thumb1 = $_FILES['image']['tmp_name'];
                $ypath1 = "upload/pbanner/".$ythumb1;
                if(move_uploaded_file($ytmp_thumb1,$ypath1))
                {

                    $imm1 = $ythumb1;

                    $question_insert = "UPDATE promo_banner SET 
                    category = '$cat', 
                    image = '$imm1',
                    status = '$status'
                    WHERE id = '$id'";
                }
                else {
                    $question_insert = "UPDATE promo_banner SET  
                    category = '$cat', 
                    status = '$status'
                    WHERE id = '$id'";
                }

				  
				 
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:pbanners.php');
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
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image"><?= $data['image']; ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="location_id">Location</label>
                                    <select class="form-control" style="width: 100%;" name="location_id"
                                        aria-hidden="true" required>
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
                                    <label for="cat">Category</label>
                                    <select class="form-control" style="width: 100%;" name="cat" aria-hidden="true" required>
                                    <?php
                                    $lid = $data['location_id'];
					$query = "SELECT * FROM category ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id1 = $row['id'];
					 $sid1 = $data['category'];
					 
					 if($id1 == $sid1)
					 {
						 
					?>
                                        <option value="<?= $id1; ?>" selected><?= $row['name']; ?></option>
                                        <?php
					 }
					 else
					 {
						 ?>
                                        <option value="<?= $id1; ?>"><?= $row['name']; ?></option>
                                        <?php
					 }
				  }
					?>
                                    </select>
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