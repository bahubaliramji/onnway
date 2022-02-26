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
                    <h1 class="m-0 text-dark">Add Location</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Locations Management</li>
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
                    if (isset($_POST['submit'])) {


                        $city = $_POST['city'];
                        $lat = $_POST['lat'];
                        $lng = $_POST['lng'];

                        if (empty($city) or empty($lat)) {
                            $error = "Please fill all fields";
                        } else {

                            $question_insert = "INSERT INTO `location` (`city`,`lat`,`lng`) 
                VALUES ('$city','$lat','$lng')";
                            if (mysqli_query($con, $question_insert)) {
                                header('Location:location.php');
                            } else {
                                $error = "Some error occurred";
                            }
                        }
                    }
                    ?>

                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($error)) {
                            ?>
                                <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
                            <?php
                            } else {
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
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                                </div>

                                <div class="form-group">
                                    <label for="lat">Latitude</label>
                                    <input type="text" class="form-control" name="lat" placeholder="Enter Latitude" required>
                                </div>

                                <div class="form-group">
                                    <label for="lng">Longitude</label>
                                    <input type="text" class="form-control" name="lng" placeholder="Enter Longitude" required>
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