<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');


$id = $_GET['id'];

$query2 = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
$data2 = mysqli_fetch_array($query2);


$query = mysqli_query($con, "SELECT * FROM provider_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_array($query);


$employeedata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM employee WHERE id = '$role'"));

$users = $employeedata['users'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Driver Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Driver Details</li>
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
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center"><?= $data['name']; ?></h3>

                            <p class="text-muted text-center"><?= $data2['phone']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Transport Name</b> <a class="float-right"><?= $data['transport_name']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right"><?= $data['email']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined On</b>
                                    <a class="float-right"><?= $data2['created']; ?></a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> City</strong>

                            <p class="text-muted">
                                <?= $data['city']; ?>
                            </p>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <?php

                    if (strpos($users, '2')) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Profile Actions
                                </h3>
                            </div><!-- /.card-header -->

                            <div class="card-footer">
                                <a class="btn btn-block btn-primary" href="edit_driver.php?id=<?= $id; ?>">EDIT</a>
                            </div>

                            <?php

                            $status = $data2['status'];

                            if ($status == 'active') {

                            ?>
                                <?php
                                if (isset($_POST['deactivate'])) {
                                    $question_insert = "UPDATE `users` SET `status` = 'inactive' WHERE id = '$id'";
                                    if (mysqli_query($con, $question_insert)) {
                                        header('Location:driver_details.php?id=' . $id);
                                    } else {
                                        $error = "Some error occurred";
                                    }
                                }
                                ?>
                                <form role="form" method="POST">

                                    <div class="card-footer">
                                        <button type="submit" name="deactivate" class="btn btn-block btn-danger">DEACTIVATE</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                            ?>

                                <?php
                                if (isset($_POST['activate'])) {
                                    $question_insert = "UPDATE `users` SET `status` = 'active' WHERE id = '$id'";
                                    if (mysqli_query($con, $question_insert)) {
                                        header('Location:driver_details.php?id=' . $id);
                                    } else {
                                        $error = "Some error occurred";
                                    }
                                }
                                ?>
                                <form role="form" method="POST">

                                    <div class="card-footer">
                                        <button type="submit" name="activate" class="btn btn-block btn-success">ACTIVATE</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>

                        </div>

                    <?php

                    }
                    ?>


                    <!-- /.nav-tabs-custom -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#transport" data-toggle="tab">Transport Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">KYC</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            <div class="tab-content">


                                <div class="active tab-pane" id="transport">

                                    <dl>

                                        <a href="add_truck3.php?id=<?= $id; ?>" class="btn btn-success pull-right">Add
                                            Truck</a>
                                        <dt>Trucks</dt>
                                        </br>
                                        <table id="example2" class="table table-bordered table-striped nowrap">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Truck Reg. No.</th>
                                                    <th>Driver Name</th>
                                                    <th>Driver Mobile</th>
                                                    <th>Truck Type</th>
                                                    <th>RC (Front)</th>
                                                    <th>RC (Back)</th>
                                                    <th>Addded On</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM mytrucksprovider WHERE provider_mobile_no = '$id' ORDER BY created DESC";
                                                $query_run = mysqli_query($con, $query);
                                                if (mysqli_num_rows($query_run) > 0) {

                                                    $sno = 0;
                                                    while ($row = mysqli_fetch_array($query_run)) {

                                                        $sno++;


                                                        $truck_type = $row['vehicle_type'];
                                                        $id2 = $row['id'];

                                                        $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                                                        $row4 = mysqli_fetch_array($query4);
                                                        $trucks = $row4['type'] . ' - ' . $row4['title'];

                                                ?>
                                                        <tr>
                                                            <td><?= $sno; ?></td>
                                                            <td><?= $row['truck_reg_no']; ?></td>
                                                            <td><?= $row['driver_name']; ?></td>
                                                            <td><?= $row['driver_mobile_no']; ?></td>
                                                            <td><?= $trucks; ?></td>
                                                            <td>
                                                                <div class="col-md-12">
                                                                    <dd><a href="http://localhost/onnway/android/Uploads/trucks/<?= $row['front']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/trucks/<?= $row['front']; ?>" style="width: 100%;height: auto;"></a>
                                                                    </dd>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="col-md-12">
                                                                    <dd><a href="http://localhost/onnway/android/Uploads/trucks/<?= $row['back']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/trucks/<?= $row['back']; ?>" style="width: 100%;height: auto;"></a>
                                                                    </dd>
                                                                </div>
                                                            </td>

                                                            <td><?= $row['created']; ?></td>

                                                            <td style="text-align-last: center;"><a href="edit_truck3.php?edit=<?= $id2; ?>&uid=<?= $id ?>"><i class="fas fa-pencil-alt"></i></a></td>
                                                            <td style="text-align-last: center;"><a href="#" onclick="MyFunction('<?= $id2; ?>');return false;"><i class="fas fa-trash-alt"></i></a></td>

                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>




                                        </br>

                                        <a href="add_route2.php?id=<?= $id; ?>" class="btn btn-success pull-right">Add
                                            Route</a>
                                        <dt>Operated Routes</dt>
                                        </br>
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Source</th>
                                                    <th>Destination</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query1 = "SELECT * FROM provider_source_des WHERE mobile_no = '$id'";
                                                $query_run1 = mysqli_query($con, $query1);
                                                if (mysqli_num_rows($query_run1) > 0) {

                                                    $sno1 = 0;
                                                    while ($row1 = mysqli_fetch_array($query_run1)) {
                                                        $id21 = $row1['id'];
                                                        $sno1++;
                                                ?>
                                                        <tr>
                                                            <td><?= $sno1; ?></td>
                                                            <td><?= $row1['source']; ?></td>
                                                            <td><?= $row1['destination']; ?></td>

                                                            <td style="text-align-last: center;"><a href="edit_route2.php?edit=<?= $id21; ?>&uid=<?= $id ?>"><i class="fas fa-pencil-alt"></i></a></td>
                                                            <td style="text-align-last: center;"><a href="#" onclick="MyFunction2('<?= $id21; ?>');return false;"><i class="fas fa-trash-alt"></i></a></td>

                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>












                                    </dl>

                                </div>






                                <div class="tab-pane" id="activity">

                                    <dl>








                                        </br>
                                        <dt>Aadhar Card (Front)</dt>

                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_aadhar']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_aadhar']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>

                                            <?php
                                            if ($data['fa_verify'] == 'pending') {
                                            ?>

                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit1'])) {


                                                        $type = 'front_aadhar';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify1'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET fa_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit1" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify1" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>



                                        </br>
                                        <dt>Aadhar Card (Back)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_aadhar']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_aadhar']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>

                                            <?php
                                            if ($data['ba_verify'] == 'pending') {
                                            ?>

                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit2'])) {


                                                        $type = 'back_aadhar';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify2'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET ba_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit2" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify2" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>


                                        </div>







                                        </br>
                                        <dt>Driving Liscense (Front)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_driving']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_driving']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>
                                            <?php
                                            if ($data['fd_verify'] == 'pending') {
                                            ?>
                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit3'])) {


                                                        $type = 'front_driving';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify3'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET fd_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit3" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify3" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>




                                        </br>
                                        <dt>Driving Liscense (Back)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_driving']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_driving']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>
                                            <?php
                                            if ($data['bd_verify'] == 'pending') {
                                            ?>

                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit4'])) {


                                                        $type = 'back_driving';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }

                                                    if (isset($_POST['verify4'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET bd_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit4" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify4" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>







                                        </br>
                                        <dt>Registration (Front)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_registration']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['front_registration']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>


                                            <?php
                                            if ($data['fr_verify'] == 'pending') {
                                            ?>

                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit5'])) {


                                                        $type = 'front_registration';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }

                                                    if (isset($_POST['verify5'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET fr_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }

                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit5" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify5" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>





                                        </br>
                                        <dt>Registration (Back)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_registration']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/pkyc/<?= $data['back_registration']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>
                                            <?php
                                            if ($data['br_verify'] == 'pending') {
                                            ?>
                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit6'])) {


                                                        $type = 'back_registration';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/pkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:driver_details.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify6'])) {


                                                        $insquery = "UPDATE provider_profile_tbl SET br_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:driver_details.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit6" class="btn btn-primary" value="Change Image">
                                                                    <input type="submit" name="verify6" class="btn btn-success" value="Verify">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-9">
                                                    <b style="color: green;">Verified</b>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>






                                    </dl>

                                </div>
                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->






            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('inc/footer.php');
?>