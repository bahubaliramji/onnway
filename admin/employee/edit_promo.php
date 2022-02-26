<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM promo WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
	
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Promo Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Promo Codes</li>
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
            if(isset($_POST['submit']))
            {

              
                $code = $_POST['code'];
                $discount = $_POST['discount'];
                $uses = $_POST['uses'];

              if(empty($code) or empty($discount))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "UPDATE promo SET code = '$code', discount = '$discount', uses = '$uses' WHERE id = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:promo.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
				
				
			  }
            } 
            ?>

                    <div class="card">
                        <div class="card-header">
                            <?php
				if($error)
				{
				?>
                            <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
                            <?php
				}
				else
				{
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
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" value="<?= $data['code']; ?>" name="code" placeholder="Enter Code"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" class="form-control" value="<?= $data['discount']; ?>" name="discount" placeholder="Enter Discount"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="uses">No. of uses</label>
                                    <input type="number" class="form-control" value="<?= $data['uses']; ?>" name="uses" placeholder="Enter Uses"
                                        required>
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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