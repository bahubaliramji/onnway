<?php

include('inc/head.php');

include('inc/sidebar.php');


if (isset($_POST['submit'])) {
    $b_id = $_POST['b_id'];
    $b_keys = $_POST['b_keys'];
    $b_value = $_POST['b_value'];

    $sql = "UPDATE business_settings SET 
            b_keys = '$b_keys',
            b_value = '$b_value'
            
            where b_id = '$b_id'
    ";

    $res = mysqli_query($con, $sql);

    if ($res == true) {
?>
        <script type="text/javascript">
            alert('Updated Successfully');
            window.location.href = "business_settings.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed to Update!');
            window.location.href = "business_update.php";
        </script>
<?php
    }
}
?>
<!-- QUERY TO SELECT HEADINGS DATA -->
<?php
if (isset($_POST['edit'])) {
    $b_id = $_POST['b_id'];
    $sql = "SELECT * from business_settings where b_id=$b_id";

    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Business Settings</h1>
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
                        <form role="form" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="b_id" class="col-sm-2 control-label">ID</label>
                                    <input type="text" class="form-control" id="b_id" value="<?php echo $row['b_id']; ?>" name="b_id" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="b_keys" class="col-sm-2 control-label">Title</label>
                                    <input type="b_keys" class="form-control" id="b_keys" value="<?php echo $row['b_keys']; ?>" name="b_keys" >
                                </div>

                                <div class="form-group">
                                    <label for="b_value" class="col-sm-2 control-label">Content</label>
                                    <textarea class="form-control" id="b_value" name="b_value"><?php echo $row['b_value']; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Accept</button>
                                <a href="business_settings.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></a>
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