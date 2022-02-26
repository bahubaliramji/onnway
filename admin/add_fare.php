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
                    <h1 class="m-0 text-dark">Add Fare</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Fare</li>
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
                        $freight = $_POST['freight'];
                        $other_charges = $_POST['other_charges'];
                        $cgst = $_POST['cgst'];
                        $sgst = $_POST['sgst'];
                        $insurance = $_POST['insurance'];
                        $type = $_POST['type'];

                        $question_insert = "INSERT INTO `fares` (source ,destination , truck_id , freight , other_charges , cgst , sgst , insurance ) 
                VALUES ('$source','$destination','$type','$freight','$other_charges','$cgst','$sgst','$insurance')";
                        if (mysqli_query($con, $question_insert)) {
                            header('Location:fares.php');
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
                                <h3 class="card-title">Add Data</h3>
                            <?php
                            }
                            ?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" method="POST">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputEmail3">Source</label>

                                    <input type="text" class="form-control" id="source" name="source" placeholder="Source" required>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Destination</label>

                                    <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination" required>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Truck Type</label>

                                    <select class="form-control" data-placeholder="" name="type" style="width: 100%;">

                                        <?php
                                        $query = "SELECT * FROM trucks";
                                        $query_run = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($query_run)) {


                                        ?>

                                            <option value="<?= $row['id']; ?>"><?= $row['type']; ?> - <?= $row['title']; ?>
                                            </option>


                                        <?php

                                        }
                                        ?>

                                    </select>

                                </div>



                                <div class="form-group">
                                    <label for="inputEmail3">Freight</label>

                                    <input type="number" class="form-control" id="freight" name="freight" placeholder="Freight" required>

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Other Charges</label>

                                    <input type="number" class="form-control" id="other_charges" name="other_charges" placeholder="Other Charges">

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">CGST</label>

                                    <input type="number" class="form-control" id="cgst" name="cgst" placeholder="CGST">

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">SGST</label>

                                    <input type="number" class="form-control" id="sgst" name="sgst" placeholder="SGST">

                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Insurance</label>

                                    <input type="number" class="form-control" id="insurance" name="insurance" placeholder="Insurance">

                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-success" value="Add Fare">
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