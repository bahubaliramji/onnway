<?php
include('inc/head.php');
include('inc/sidebar.php');
if (isset($_POST['submit'])) {
    $term_id = $_POST['term_id'];
    $term_desc = $_POST['term_desc'];
    $privacy_desc = $_POST['privacy_desc'];
    $payment_desc = $_POST['payment_desc'];


    $sql = "UPDATE termscondition
    SET 
            term_desc = '$term_desc',
            privacy_desc = '$privacy_desc',
            payment_desc = '$payment_desc'
            
            where term_id = '$term_id'
    ";

    $res = mysqli_query($con, $sql);

    if ($res == true) {
?>
        <script type="text/javascript">
            alert('Updated Successfully');
            window.location.href = "#";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed to Update!');
            window.location.href = "#";
        </script>
<?php
    }
}
?>
<!-- QUERY TO SELECT HEADINGS DATA -->
<?php
$term_id = $_GET['term_id'];
$sql = "SELECT * from termscondition where term_id = $term_id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Policies Settings</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="term_id" class="col-sm-2 control-label">ID</label>
                                    <input type="text" class="form-control" id="term_id" value="<?php echo $row['term_id']; ?>" name="term_id" readonly>
                                </div>
                            
                                <div class="form-group">
                                    <label for="term_desc" class="col-sm-2 control-label">Terms And Conditions</label>
                                    <textarea class="form-control" id="term_desc"name="term_desc" rows="5"><?php echo $row['term_desc']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="privacy_desc" class="col-sm-2 control-label">Privacy Policy</label>
                                    <textarea class="form-control" id="privacy_desc" name="privacy_desc"><?php echo $row['privacy_desc']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="payment_desc" class="col-sm-2 control-label">Payment Policy</label>
                                    <textarea class="form-control" id="payment_desc" name="payment_desc"><?php echo $row['payment_desc']; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="term_id" value="<?php echo $row['term_id']; ?>">
                                <button type="submit" name="submit" class="btn btn-primary">Accept</button>
                                <!--<a href="aboutus.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></a>-->
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