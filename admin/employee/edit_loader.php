<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['id']))
  {
    $edit_id = $_GET['id'];

    $edit_query = "SELECT * FROM loader_profile_tbl WHERE user_id = '$edit_id'";
    $edit_run = mysqli_query($con,$edit_query);
    $edit_row = mysqli_fetch_array($edit_run);
    $type = $edit_row['type'];
	
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Loader</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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

              
              $name = $_POST['name'];
              $email = $_POST['email'];
              $city = $_POST['city'];
              $type = $_POST['type'];
              $company = $_POST['company'];
              $gst = $_POST['gst'];

$question_insert = "UPDATE `loader_profile_tbl` SET 
`name` = '$name',
`email` = '$email',
`city` = '$city',
`type` = '$type',
`company` = '$company',
`gst` = '$gst'
WHERE user_id = '$edit_id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:loader_detail.php?id='.$edit_id);
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
                            <h3 class="card-title">Edit Data</h3>
                            <?php
				}
				?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" method="POST">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="name">Name</label>
                                    
                                        <input type="text" class="form-control" id="name"
                                            value="<?= $edit_row['name']; ?>" name="name" placeholder="Name" required>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="email">Email</label>
                                    
                                        <input type="email" class="form-control" id="email"
                                            value="<?= $edit_row['email']; ?>" name="email" placeholder="Email"
                                            required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    
                                        <input type="text" class="form-control" id="city"
                                            value="<?= $edit_row['city']; ?>" name="city" placeholder="City" required>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="type">Type</label>
                                    
                                        <select class="form-control" data-placeholder="" name="type"
                                            style="width: 100%;">

                                            <?php

if($type == "Company")
{
?>
                                            <option selected>Company</option>
                                            <?php
}
else
{
?>
                                            <option>Company</option>
                                            <?php
}
?>

                                            <?php

if($type == "Individual")
{
?>
                                            <option selected>Individual</option>
                                            <?php
}
else
{
?>
                                            <option>Individual</option>
                                            <?php
}
?>
                                        </select>
                                    
                                </div>



                                <div class="form-group">
                                    <label for="company">Company Name</label>
                                    
                                        <input type="text" class="form-control" id="company"
                                            value="<?= $edit_row['company']; ?>" name="company"
                                            placeholder="Company Name">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="gst">GST</label>
                                    
                                        <input type="text" class="form-control" id="gst"
                                            value="<?= $edit_row['gst']; ?>" name="gst" placeholder="GST" required>
                                    
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