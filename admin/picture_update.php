<?php

include('inc/head.php');

include('inc/sidebar.php');
if (isset($_POST['submit'])) {

    $b_id = $_POST['b_id'];

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


    $sql3 = "UPDATE business_settings SET 

            img = '$destination_path1'
            
            
            where b_id = '$b_id'    ";

    $res3 = mysqli_query($con, $sql3);

    if ($res3 == true) {
?>
        <script type="text/javascript">
            alert('Updated Successfully');
            window.location.href = "picture.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed to Update!');
            window.location.href = "picture.php";
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
                    <h1 class="m-0 text-dark">Picture Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Picture</li>
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
                            <h3 class="card-title">Edit Picture</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Old Image</label>
                                    <img src="<?php echo $row['img']; ?>" width="500px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select New Image</label>
                                    <input type="file" class="form-control" id="new_img" name="new_img">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="old_img" value="<?php echo $row['img']; ?>">
                                <input type="hidden" name="b_id" value="<?php echo $row['b_id']; ?>">
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