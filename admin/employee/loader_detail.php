<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');


$id = $_GET['id'];

$query2 = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
$data2 = mysqli_fetch_array($query2);


$query = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$id'");
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
                    <h1 class="m-0 text-dark">Loader Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Loader Details</li>
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

                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="http://localhost/onnway/android/Uploads/profile/<?= $data['image']; ?>" alt="User profile picture">
                            </div>


                            <h3 class="profile-username text-center"><?= $data['name']; ?></h3>

                            <p class="text-muted text-center"><?= $data2['phone']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">

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

                            <hr>


                            <strong><i class="fas fa-book mr-1"></i> Type</strong>

                            <p><?= $data['type']; ?></p>


                            <hr>


                            <strong><i class="fas fa-book mr-1"></i> Company Name</strong>

                            <p><?= $data['company']; ?></p>

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
                                <a class="btn btn-block btn-primary" href="edit_loader.php?id=<?= $id; ?>">EDIT</a>
                            </div>

                            <?php

                            $status = $data2['status'];

                            if ($status == 'active') {

                            ?>
                                <?php
                                if (isset($_POST['deactivate'])) {
                                    $question_insert = "UPDATE `users` SET `status` = 'inactive' WHERE id = '$id'";
                                    if (mysqli_query($con, $question_insert)) {
                                        header('Location:loader_detail.php?id=' . $id);
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
                                        header('Location:loader_detail.php?id=' . $id);
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
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">KYC</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <dl>
                                        <dt>GST Number</dt>
                                        <dd><?= $data['gst']; ?></dd>

                                        </br>
                                        <dt>PAN Card</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/lkyc/<?= $data['pan']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/lkyc/<?= $data['pan']; ?>" style="width: 100%;height: auto;"></a>
                                                </dd>

                                            </div>


                                            <?php
                                            if ($data['pan_verify'] == 'pending') {
                                            ?>



                                                <div class="col-md-9">
                                                    <?php

                                                    if (isset($_POST['submit1'])) {


                                                        $type = 'pan';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/lkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE loader_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:loader_detail.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }



                                                    if (isset($_POST['verify1'])) {


                                                        $insquery = "UPDATE loader_profile_tbl SET pan_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:loader_detail.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>
                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="card-body">
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
                                        <dt>Aadhar Card (Front)</dt>

                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/lkyc/<?= $data['af']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/lkyc/<?= $data['af']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>

                                            <?php
                                            if ($data['af_verify'] == 'pending') {
                                            ?>
                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit2'])) {


                                                        $type = 'af';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/lkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE loader_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:loader_detail.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify2'])) {


                                                        $insquery = "UPDATE loader_profile_tbl SET af_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:loader_detail.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="card-body">
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
                                        <dt>Aadhar Card (Back)</dt>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <dd><a href="http://localhost/onnway/android/Uploads/lkyc/<?= $data['ab']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/lkyc/<?= $data['ab']; ?>" style="width: 100%;height: auto;"></a></dd>


                                            </div>


                                            <?php
                                            if ($data['ab_verify'] == 'pending') {
                                            ?>
                                                <div class="col-md-9">

                                                    <?php

                                                    if (isset($_POST['submit3'])) {


                                                        $type = 'ab';


                                                        $ythumb = $_FILES['image']['name'];
                                                        $ytmp_thumb = $_FILES['image']['tmp_name'];
                                                        $ypath1 = "../android/Uploads/lkyc/" . $ythumb;
                                                        if (move_uploaded_file($ytmp_thumb, $ypath1)) {
                                                            $imm = $ythumb;

                                                            $insquery = "UPDATE loader_profile_tbl SET $type = '$imm' WHERE user_id = '$id'";

                                                            $row = mysqli_query($con, $insquery);

                                                            if ($row) {
                                                                header('Location:loader_detail.php?id=' . $id);
                                                            } else {
                                                                echo $error = "Some error occurred";
                                                            }
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }


                                                    if (isset($_POST['verify3'])) {


                                                        $insquery = "UPDATE loader_profile_tbl SET ab_verify = 'verified' WHERE user_id = '$id'";

                                                        $row = mysqli_query($con, $insquery);

                                                        if ($row) {
                                                            header('Location:loader_detail.php?id=' . $id);
                                                        } else {
                                                            echo $error = "Some error occurred";
                                                        }
                                                    }

                                                    ?>

                                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                                        <div class="card-body">
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