<?php
include('inc/head.php');
include('inc/sidebar.php');
if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $c_content = $_POST['c_content'];
    


    $sql = "UPDATE current_updates SET 
            c_content = '$c_content'
            
            where c_id = '$c_id'
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
$c_id = $_GET['c_id'];
$sql = "SELECT * from current_updates where c_id = $c_id";
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
                    <h1 class="m-0 text-dark">Current Updates</h1>
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
                                    <label for="c_id" class="col-sm-2 control-label">ID</label>
                                    <input type="text" class="form-control" id="c_id" value="<?php echo $row['c_id']; ?>" name="c_id" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="c_content" class="col-sm-2 control-label">Content</label>
                                    <textarea class="form-control" id="c_content"name="c_content" rows="5"><?php echo $row['c_content']; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">
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