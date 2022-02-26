<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM loader_profile_request WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);

    $id = $edit_row['id'];
    $user_id = $edit_row['user_id'];
    $name = $edit_row['name'];
    $email = $edit_row['email'];
    $city = $edit_row['city'];
    $type = $edit_row['type'];
    $company = $edit_row['company'];
    $gst = $edit_row['gst'];

    $query2 = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
    $row2 = mysqli_fetch_array($query2);



    $oldname = $row2['name'];
    $oldemail = $row2['email'];
    $oldcity = $row2['city'];
    $oldtype = $row2['type'];
    $oldcompany = $row2['company'];
    $oldgst = $row2['gst'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Receipt</h1>
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


                        // $name = $_POST['name'];
                        // $email = $_POST['email'];
                        // $city = $_POST['city'];
                        // $type = $_POST['type'];
                        // $company = $_POST['company'];
                        // $gst = $_POST['gst'];


                        $question_insert = "UPDATE `loader_profile_tbl` SET
                        name = '$name',
                        email = '$email',
                        city = '$city',
                        type = '$type',
                        company = '$company',
                        gst = '$gst' WHERE user_id = '$user_id'";
                        if (mysqli_query($con, $question_insert)) {
                            $question_insert2 = "DELETE FROM `loader_profile_request` WHERE id = '$edit_id'";

                            if (mysqli_query($con, $question_insert2)) {
                                header('Location:loader_change.php');
                            } else {
                                $error = "Some error occurred";
                            }
                        } else {
                            $error = "Some error occurred";
                        }
                    }

                    if (isset($_POST['submit2'])) {


                        $amount = $_POST['amount'];



                        $question_insert2 = "DELETE FROM `loader_profile_request` WHERE id = '$edit_id'";

                        if (mysqli_query($con, $question_insert2)) {
                            header('Location:loader_change.php');
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

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old Name</label>

                                            <input type="text" class="form-control" id="name1" value="<?= $oldname; ?>" name="name1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New Name</label>

                                            <input type="text" class="form-control" id="name" value="<?= $name; ?>" name="name" placeholder="Loader" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old Email</label>

                                            <input type="text" class="form-control" id="email1" value="<?= $oldemail; ?>" name="email1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New Email</label>

                                            <input type="text" class="form-control" id="email" value="<?= $email; ?>" name="email" placeholder="Loader" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old City</label>

                                            <input type="text" class="form-control" id="city1" value="<?= $oldcity; ?>" name="city1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New City</label>

                                            <input type="text" class="form-control" id="city" value="<?= $city; ?>" name="city" placeholder="Loader" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old Type</label>

                                            <input type="text" class="form-control" id="type1" value="<?= $oldtype; ?>" name="type1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New Type</label>

                                            <input type="text" class="form-control" id="type" value="<?= $type; ?>" name="type" placeholder="Loader" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old Company Name</label>

                                            <input type="text" class="form-control" id="company1" value="<?= $oldcompany; ?>" name="company1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New Company Name</label>

                                            <input type="text" class="form-control" id="company" value="<?= $company; ?>" name="company" placeholder="Loader" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old GST</label>

                                            <input type="text" class="form-control" id="gst1" value="<?= $oldgst; ?>" name="gst1" disabled>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Loader" class="col-sm-2 control-label">New GST</label>

                                            <input type="text" class="form-control" id="gst" value="<?= $gst; ?>" name="gst" placeholder="Loader" disabled>

                                        </div>
                                    </div>


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
