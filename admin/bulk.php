<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `fares` WHERE `fares`.`id` = '$del_id'";
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
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Bulk Import</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Bulk Import</li>
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


            $filename = $_FILES["file"]["tmp_name"];
            if ($_FILES["file"]["size"] > 0) {
              $file = fopen($filename, "r");
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $sql = "INSERT into fares (source,destination,truck_id,freight,other_charges,cgst,sgst,insurance) 
                   values ('" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "')";
                $result = mysqli_query($con, $sql);
                if (!isset($result)) {

                  echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"bulk.php\"
              </script>";
                } else {
                  echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"fares.php\"
          </script>";
                }
              }

              fclose($file);
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
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group">
                  <label for="inputEmail3">Upload CSV</label>

                  <input type="file" class="form-control" id="file" name="file" placeholder="file" required>

                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="submit" name="submit" class="btn btn-success" value="Add">
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