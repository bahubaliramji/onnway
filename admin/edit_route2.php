<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $uid = $_GET['uid'];

    $edit_query = "SELECT * FROM provider_source_des WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);
    $source = $edit_row['source'];
    $destination = $edit_row['destination'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Route</h1>
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
                    if (isset($_POST['submit'])) {


                        $source = $_POST['source'];
                        $destination = $_POST['destination'];

                        $question_insert = "UPDATE provider_source_des SET 
source = '$source', 
destination = '$destination'
WHERE id = '$edit_id'";

                        if (mysqli_query($con, $question_insert)) {
                            header('Location:driver_details.php?id=' . $uid);
                        } else {
                            $error = "Some error occurred";
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
                                <h3 class="card-title">Edit Data</h3>
                            <?php
                            }
                            ?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" method="POST">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="source">Source</label>

                                    <input type="text" class="form-control" id="source" value="<?= $source; ?>" name="source" placeholder="Source" required>

                                </div>


                                <div class="form-group">
                                    <label for="destination">Destination</label>

                                    <input type="text" class="form-control" id="destination" value="<?= $destination; ?>" name="destination" placeholder="Destination" required>

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