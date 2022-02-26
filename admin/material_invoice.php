<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if (mysqli_query($con, $del_query)) {
        $msg = "Truck Has Been Deleted";
    } else {
        $error = "Truck Hasn't Been Deleted";
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <?php



                date_default_timezone_set("Asia/Kolkata");


                $assign_id = $_GET['assign_id'];

                $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM invoice WHERE assign_id = '$assign_id'"));



                ?>

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Material Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Material Invoice</li>
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

                    <div class="row">

                        <?php

                        $samplequery = mysqli_query($con, "SELECT * FROM invoice WHERE assign_id = '$assign_id'");
                        while ($report_data = mysqli_fetch_array($samplequery)) {

                            $status = $report_data['status'];
                            $id = $report_data['id'];

                        ?>

                            <div class="col-sm-3">
                                <a href="<?= base_url2 . "android/Uploads/invoice/" . $report_data['name']; ?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="<?= base_url2 . "android/Uploads/invoice/" . $report_data['name']; ?>" class="img-fluid mb-2" alt="sample" />
                                </a>
                                <?php
                                if ($status == 'active') {
                                ?>
                                    <input class="btn btn-block btn-danger" type="button" value="DEACTIVATE" onclick="invoice(<?= $id; ?>, 'inactive')">
                                <?php
                                } else {
                                ?>
                                    <input class="btn btn-block btn-success" type="button" value="ACTIVATE" onclick="invoice(<?= $id; ?>, 'active')">
                                <?php
                                }
                                ?>

                            </div>

                        <?php
                        }
                        ?>
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