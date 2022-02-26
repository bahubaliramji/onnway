<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['id']))
 {
$uid = $_GET['id'];

 }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Truck</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Truck</li>
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

              
              $truck_reg_no = $_POST['truck_reg_no'];
              $driver_name = $_POST['driver_name'];
              $driver_mobile_no = $_POST['driver_mobile_no'];
              $vehicle_type = $_POST['type'];

$ythumb1 = $_FILES['front']['name'];
$ytmp_thumb1 = $_FILES['front']['tmp_name'];
 $ypath1 = "../android/Uploads/trucks/".$ythumb1 ;


$ythumb2 = $_FILES['back']['name'];
$ytmp_thumb2 = $_FILES['back']['tmp_name'];
 $ypath2 = "../android/Uploads/trucks/".$ythumb2 ;

if(move_uploaded_file($ytmp_thumb1,$ypath1))
{
     $front = $ythumb1;
}

if(move_uploaded_file($ytmp_thumb2,$ypath2))
{
     $back = $ythumb2;
}


$question_insert = "INSERT INTO mytrucksprovider SET 
provider_mobile_no = '$uid', 
truck_reg_no = '$truck_reg_no', 
driver_name = '$driver_name', 
driver_mobile_no = '$driver_mobile_no', 
vehicle_type = '$vehicle_type',
front = '$front',
back = '$back'
";

                if(mysqli_query($con,$question_insert))
                {
                  header('Location:provider_details.php?id='.$uid);
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
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="truck_reg_no">Truck Reg. No.</label>
                                    
                                        <input type="text" class="form-control" id="truck_reg_no"
                                            value="<?= $truck_reg_no; ?>" name="truck_reg_no"
                                            placeholder="Truck Reg. No." required>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="driver_name">Driver Name</label>
                                    
                                        <input type="text" class="form-control" id="driver_name"
                                            value="<?= $driver_name; ?>" name="driver_name" placeholder="Driver Name"
                                            required>
                                    
                                </div>



                                <div class="form-group">
                                    <label for="driver_mobile_no">Driver Mobile</label>
                                    
                                        <input type="text" class="form-control" id="driver_mobile_no"
                                            value="<?= $driver_mobile_no; ?>" name="driver_mobile_no"
                                            placeholder="Driver Mobile" required>
                                    
                                </div>




                                <div class="form-group">
                                    <label for="inputEmail3">Truck Type</label>
                                    
                                        <select class="form-control" data-placeholder="" name="type"
                                            style="width: 100%;">

                                            <?php
                    $query = "SELECT * FROM trucks";
                    $query_run = mysqli_query($con,$query);           
                      while ($row = mysqli_fetch_array($query_run))
                        {

$rid = $row['id'];

if($rid == $vehicle_type)
{
		 
                    ?>

                                            <option value="<?= $row['id']; ?>" selected><?= $row['type'];?> -
                                                <?= $row['title'];?></option>


                                            <?php
}
else
{
    ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['type'];?> -
                                                <?= $row['title'];?></option>

                                            <?php
    
    
    
}
}
                      ?>

                                        </select>
                                    
                                </div>

<div class="form-group">
                                    <label for="front">RC (Front)</label>
                                    
                                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="front" name="front" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                      </div>
                                  
                                </div>

<div class="form-group">
                                    <label for="back">RC (Back)</label>
                                    
                                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="back" name="back" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                      </div>
                                  
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-success" value="Add Truck">
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