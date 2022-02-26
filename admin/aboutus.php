<?php
include('inc/head.php');
include('inc/sidebar.php');
if (isset($_POST['submit'])) {
    $a_id = $_POST['a_id'];
    $a_content = $_POST['a_content'];
    $a_text = $_POST['a_text'];
    //image update & upload in image folder
    $old_img = $_POST['old_img'];
    print_r($_FILES['new_img']['name']);
    if (isset($_FILES['new_img']['name'])) {
        $new_img = $_FILES['new_img']['name'];
        if ($new_img != "") {
            $source_path1 = $_FILES['new_img']['tmp_name'];
            $destination_path1 = "upload/" . $new_img;
            move_uploaded_file($source_path1, $destination_path1);
        } else {
            $destination_path1 = $old_img;
        }
    } else {
        $destination_path1 = $old_img;
    }


    $sql = "UPDATE aboutus SET 
            a_content = '$a_content',
            a_text = '$a_text',
            a_img = '$destination_path1'
            
            where a_id = '$a_id'
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
            window.location.href = "aboutus.php";
        </script>
<?php
    }
}
?>
<!-- QUERY TO SELECT HEADINGS DATA -->
<?php
$a_id = $_GET['a_id'];
$sql = "SELECT * from aboutus where a_id = $a_id";
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
                    <h1 class="m-0 text-dark">About Us Settings</h1>
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
                                    <label for="a_id" class="col-sm-2 control-label">ID</label>
                                    <input type="text" class="form-control" id="a_id" value="<?php echo $row['a_id']; ?>" name="a_id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Old Image</label>
                                    <img src="<?php echo $row['a_img']; ?>" width="500px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select New Image</label>
                                    <input type="file" class="form-control" id="new_img" name="new_img">
                                </div>
                                <div class="form-group">
                                    <label for="a_content" class="col-sm-2 control-label">Content</label>
                                    <textarea class="form-control" id="a_content"name="a_content" rows="5"><?php echo $row['a_content']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="a_text" class="col-sm-2 control-label">Long Text</label>
                                    <textarea class="form-control" id="a_text" name="a_text"><?php echo $row['a_text']; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="old_img" value="<?php echo $row['a_img']; ?>">
                                <input type="hidden" name="a_id" value="<?php echo $row['a_id']; ?>">
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