<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');


if(isset($_GET['edit']))
 {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM posted_trucks WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con,$edit_query);
    $edit_row = mysqli_fetch_array($edit_run);
    $source = $edit_row['source'];
    $destination = $edit_row['destination'];
    $truck_id = $edit_row['truck_type'];
    $schedule = $edit_row['schedule'];
    $weight = $edit_row['weight'];
    $material = $edit_row['material'];
    $load_passing = $edit_row['load_passing'];
    $length = $edit_row['length'];
    $width = $edit_row['width'];
    $height = $edit_row['height'];
 }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Full Load Truck</h1>
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

              
              $source = $_POST['source'];
              $destination = $_POST['destination'];
              $schedule = $_POST['schedule'];
              $weight = $_POST['weight'];
              $material = $_POST['material'];
              $load_passing = $_POST['load_passing'];
              $type = $_POST['type'];
              $pickup_pincode = $_POST['pickup_pincode'];
              $pickup_phone = $_POST['pickup_phone'];
              $drop_address = $_POST['drop_address'];
              $drop_city = $_POST['drop_city'];
              $drop_pincode = $_POST['drop_pincode'];
              $drop_phone = $_POST['drop_phone'];

$question_insert = "UPDATE posted_trucks SET 
source = '$source',
destination = '$destination',
schedule = '$schedule',
truck_type = '$type',
load_passing = '$load_passing'
WHERE id = '$edit_id'";

                if(mysqli_query($con,$question_insert))
                {
                  header('Location:edit_full_load_posted.php?edit='.$edit_id);
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
                                    <label for="inputEmail3">Source</label>

                                    <input type="text" class="form-control" id="source" value="<?= $source; ?>"
                                        name="source" placeholder="Source" required>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Destination</label>

                                    <input type="text" class="form-control" id="destination"
                                        value="<?= $destination; ?>" name="destination" placeholder="Destination"
                                        required>

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Truck Type</label>

                                    <select class="form-control" data-placeholder="" name="type" style="width: 100%;">

                                        <?php
                    $query = "SELECT * FROM trucks";
                    $query_run = mysqli_query($con,$query);           
                      while ($row = mysqli_fetch_array($query_run))
                        {

$rid = $row['id'];

if($rid == $truck_id)
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
                                    <label for="load_passing">Load Passing</label>

                                    <input type="text" class="form-control" id="load_passing"
                                        value="<?= $load_passing; ?>" name="load_passing" placeholder="Load Passing"
                                        required>

                                </div>

                                <div class="form-group">
                                    <label for="schedule">Schedule Date</label>

                                    <input type="text" class="form-control" id="schedule" value="<?= $schedule; ?>"
                                        name="schedule" placeholder="Schedule Date" required>

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