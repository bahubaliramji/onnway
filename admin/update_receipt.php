<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM receipt WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);

    $id = $edit_row['id'];
    $order_id = $edit_row['order_id'];
    $user_id = $edit_row['user_id'];
    $type = $edit_row['type'];
    $pid = $edit_row['pid'];
    $insused = $edit_row['insused'];
    $pvalue = $edit_row['pvalue'];
    $inin = $edit_row['inin'];
    $status = $edit_row['status'];
    $created = $edit_row['created'];

    $query2 = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
    $row2 = mysqli_fetch_array($query2);


    $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
    $row3 = mysqli_fetch_array($query3);

    $name = $row2['name'];
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


                        $amount = $_POST['amount'];


                        $question_insert = "UPDATE `orders` SET 
`paid_amount` = '$amount',
`paid_percent` = '$type',
`promo_code` = '$pid',
`pvalue` = '$pvalue',
`insurance_used` = '$insused'
WHERE id = '$order_id'";
                        if (mysqli_query($con, $question_insert)) {
                            $question_insert2 = "UPDATE `receipt` SET 
`status` = 'accepted',
`amount` = '$amount' WHERE id = '$edit_id'";

                            if (mysqli_query($con, $question_insert2)) {
                                header('Location:receipts.php?id=' . $edit_id);
                            } else {
                                $error = "Some error occurred2";
                            }
                        } else {
                            $error = "Some error occurred1";
                        }
                    }

                    if (isset($_POST['submit2'])) {


                        $amount = $_POST['amount'];



                        $question_insert2 = "UPDATE `receipt` SET 
`status` = 'rejected'
WHERE id = '$edit_id'";

                        if (mysqli_query($con, $question_insert2)) {
                            header('Location:receipts.php?id=' . $edit_id);
                        } else {
                            $error = "Some error occurred";
                        }
                    }

                    ?>

                    <div class="card">
                        <div class="card-header">
                            <?php
                            if ($error) {
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
                                    <label for="order_id" class="col-sm-2 control-label">Order ID</label>

                                    <input type="text" class="form-control" id="order_id" value="ORDER #<?= $order_id; ?>" name="order_id" disabled>

                                </div>


                                <div class="form-group">
                                    <label for="Loader" class="col-sm-2 control-label">Loader</label>

                                    <input type="Loader" class="form-control" id="Loader" value="<?= $name; ?>" name="Loader" placeholder="Loader" disabled>

                                </div>

                                <div class="form-group">
                                    <label for="Loader" class="col-sm-2 control-label">PROMO Value</label>

                                    <input type="Loader" class="form-control" id="Loader" value="<?= $pvalue; ?>" name="Loader" placeholder="Loader" disabled>

                                </div>

                                <div class="form-group">
                                    <label for="Loader" class="col-sm-2 control-label">Insurance Value</label>

                                    <input type="Loader" class="form-control" id="Loader" value="<?= $inin; ?>" name="Loader" placeholder="Loader" disabled>

                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-sm-2 control-label">Receipt</label>

                                    <a type="text" class="form-control" href="<?= base_url2 . 'android/Uploads/receipt/' . $edit_row['image']; ?>" target="blank"><?= base_url2 . 'android/Uploads/receipt/' . $edit_row['image']; ?></a>

                                </div>






                                <div class="form-group">
                                    <label for="amount" class="col-sm-2 control-label">Amount</label>

                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" value="0" required>

                                </div>






                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Accept</button>
                                <button type="submit" name="submit2" class="btn btn-danger">Reject</button>
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