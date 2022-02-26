<?php
include('inc/head.php');
include('inc/sidebar.php');
if (isset($_POST['submit'])) {
    $a_id = $_POST['a_id'];
    $a_content = $_POST['a_content'];
    $a_text = $_POST['a_text'];
	$a_img1_title = $_POST['a_img1_title'];
	$a_img2_title = $_POST['a_img2_title'];
	$a_img3_title = $_POST['a_img3_title'];
	$a_img4_title = $_POST['a_img4_title'];
    //image update & upload in image folder
    $old_img = $_POST['old_img'];
    print_r($_FILES['new_img']['name']);
    if (isset($_FILES['new_img']['name'])) {
        $new_img = $_FILES['new_img']['name'];
        if ($new_img != "") {
            $source_path = $_FILES['new_img']['tmp_name'];
            $destination_path = "upload/" . $new_img;
            move_uploaded_file($source_path, $destination_path);
        } else {
            $destination_path = $old_img;
        }
    } else {
        $destination_path = $old_img;
    }
	//image 1
    $old_img1 = $_POST['old_img1'];
    print_r($_FILES['new_img1']['name']);
    if (isset($_FILES['new_img1']['name'])) {
        $new_img1 = $_FILES['new_img1']['name'];
        if ($new_img1 != "") {
            $source_path1 = $_FILES['new_img1']['tmp_name'];
            $destination_path1 = "upload/" . $new_img1;
            move_uploaded_file($source_path1, $destination_path1);
        } else {
            $destination_path1 = $old_img1;
        }
    } else {
        $destination_path1 = $old_img1;
    }
	//image 2
    $old_img2 = $_POST['old_img2'];
    print_r($_FILES['new_img2']['name']);
    if (isset($_FILES['new_img2']['name'])) {
        $new_img2 = $_FILES['new_img2']['name'];
        if ($new_img2 != "") {
            $source_path2 = $_FILES['new_img2']['tmp_name'];
            $destination_path2 = "upload/" . $new_img2;
            move_uploaded_file($source_path2, $destination_path2);
        } else {
            $destination_path2 = $old_img2;
        }
    } else {
        $destination_path2 = $old_img2;
    }
	//image 3
    $old_img3 = $_POST['old_img3'];
    print_r($_FILES['new_img3']['name']);
    if (isset($_FILES['new_img3']['name'])) {
        $new_img3 = $_FILES['new_img3']['name'];
        if ($new_img3 != "") {
            $source_path3 = $_FILES['new_img3']['tmp_name'];
            $destination_path3 = "upload/" . $new_img3;
            move_uploaded_file($source_path3, $destination_path3);
        } else {
            $destination_path3 = $old_img3;
        }
    } else {
        $destination_path3 = $old_img3;
    }
	//image 4
    $old_img4 = $_POST['old_img4'];
    print_r($_FILES['new_img4']['name']);
    if (isset($_FILES['new_img4']['name'])) {
        $new_img4 = $_FILES['new_img4']['name'];
        if ($new_img4 != "") {
            $source_path4 = $_FILES['new_img4']['tmp_name'];
            $destination_path4 = "upload/" . $new_img4;
            move_uploaded_file($source_path4, $destination_path4);
        } else {
            $destination_path4 = $old_img4;
        }
    } else {
        $destination_path4 = $old_img4;
    }


    $sql = "UPDATE aboutus SET 
            a_content = '$a_content',
            a_text = '$a_text',
			a_img1_title = '$a_img1_title',a_img2_title = '$a_img2_title',a_img3_title = '$a_img3_title',a_img4_title = '$a_img4_title',
            a_img = '$destination_path',
			a_img1 = '$destination_path1',
			a_img2 = '$destination_path2',
			a_img3 = '$destination_path3',
			a_img4 = '$destination_path4'
            
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
                                    <label for="a_img1_title" class="col-sm-2 control-label">Image1 Title</label>
                                    <input type="text" class="form-control" id="a_img1_title" value="<?php echo $row['a_img1_title']; ?>" name="a_img1_title">
                                </div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Old Image</label>
										<img src="<?php echo $row['a_img1']; ?>" width="100px">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Select New Image</label>
										<input type="file" class="form-control" id="new_img1" name="new_img1">
									</div>
								</div>
								<div class="form-group">
                                    <label for="a_img2_title" class="col-sm-2 control-label">Image2 Title</label>
                                    <input type="text" class="form-control" id="a_img2_title" value="<?php echo $row['a_img2_title']; ?>" name="a_img2_title">
                                </div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Old Image</label>
										<img src="<?php echo $row['a_img2']; ?>" width="100px">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Select New Image</label>
										<input type="file" class="form-control" id="new_img2" name="new_img2">
									</div>
								</div>
								<div class="form-group">
                                    <label for="a_img3_title" class="col-sm-2 control-label">Image3 Title</label>
                                    <input type="text" class="form-control" id="a_img3_title" value="<?php echo $row['a_img3_title']; ?>" name="a_img3_title">
                                </div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Old Image</label>
										<img src="<?php echo $row['a_img3']; ?>" width="100px">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Select New Image</label>
										<input type="file" class="form-control" id="new_img3" name="new_img3">
									</div>
								</div>
								<div class="form-group">
                                    <label for="a_img4_title" class="col-sm-2 control-label">Image4 Title</label>
                                    <input type="text" class="form-control" id="a_img4_title" value="<?php echo $row['a_img4_title']; ?>" name="a_img4_title">
                                </div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Old Image</label>
										<img src="<?php echo $row['a_img4']; ?>" width="100px">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Select New Image</label>
										<input type="file" class="form-control" id="new_img4" name="new_img4">
									</div>
								</div>
								
								
								
                                
                                <div class="form-group">
                                    <label for="a_content" class="col-sm-2 control-label">Content</label>
                                    <textarea class="form-control" id="a_content"name="a_content" rows="5"><?php echo $row['a_content']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="a_text" class="col-sm-2 control-label">Long Text</label>
                                    <textarea class="form-control" id="a_text" name="a_text"><?php echo $row['a_text']; ?></textarea>
                                </div>
								 <div class="form-group">
                                    <label for="banner" class="col-sm-2 control-label">About us Banner</label>
                                </div>
								<div class="row">
								<div class="form-group col-md-6">
                                	<!--  <label for="exampleInputPassword1">Old Image</label>-->
                                    <center><img src="<?php echo $row['a_img']; ?>" width="350px"></center>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Select New Image</label>
                                    <input type="file" class="form-control" id="new_img" name="new_img">
                                </div>
								</div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="old_img" value="<?php echo $row['a_img']; ?>">
								 <input type="hidden" name="old_img1" value="<?php echo $row['a_img1']; ?>">
								 <input type="hidden" name="old_img2" value="<?php echo $row['a_img2']; ?>">
								 <input type="hidden" name="old_img3" value="<?php echo $row['a_img3']; ?>">
								 <input type="hidden" name="old_img4" value="<?php echo $row['a_img4']; ?>">
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