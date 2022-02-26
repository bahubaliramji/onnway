<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM transport_change_request WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);

    $id = $edit_row['id'];
    $user_id = $edit_row['user_id'];
    echo $transport = $edit_row['transport'];
    echo $city = $edit_row['city'];

    $query2 = mysqli_query($con, "SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
    $row2 = mysqli_fetch_array($query2);

    $transport_name = $row2['transport_name'];
    $oldcity = $row2['city'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Profile</h1>
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

                        //print($_POST);

                        $transport1 = $_POST['transport1'];
                        $city1 = $_POST['city1'];


                        $question_insert = "UPDATE `provider_profile_tbl` SET 
`transport_name` = '$transport1',
`city` = '$city1'
WHERE user_id = '$user_id'";
                        if (mysqli_query($con, $question_insert)) {
                            $question_insert2 = "DELETE FROM `transport_change_request` WHERE id = '$edit_id'";

                            if (mysqli_query($con, $question_insert2)) {
                                header('Location:transport_change.php');
                            } else {
                                $error = "Some error occurred";
                            }
                        } else {
                            $error = "Some error occurred";
                        }
                    }

                    if (isset($_POST['submit2'])) {


                        $amount = $_POST['amount'];



                        $question_insert2 = "DELETE FROM `transport_change_request` WHERE id = '$edit_id'";

                        if (mysqli_query($con, $question_insert2)) {
                            header('Location:transport_change.php');
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
                                    <label for="name" class="col-sm-2 control-label">Old Transport Name</label>
                                    <input type="text" class="form-control" id="name" value="<?= $transport_name; ?>" name="name" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="Loader" class="col-sm-2 control-label">New Transport Name</label>
                                    <input type="text" class="form-control" id="transport1" value="<?= $transport; ?>" name="transport1" placeholder="Loader" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Old City</label>
                                    <input type="text" class="form-control" id="name" value="<?= $oldcity; ?>" name="name" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="Loader" class="col-sm-2 control-label">New City</label>
                                    <input type="text" class="form-control" id="city1" value="<?= $city; ?>" name="city1" placeholder="Loader" readonly>
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Accept</button>
                                <button type="submit" name="submit2" class="btn btn-danger">Delete</button>
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
