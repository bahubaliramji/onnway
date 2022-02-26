<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $squery =  "SELECT * FROM trucks WHERE id = '$id'";
  $data = mysqli_fetch_array(mysqli_query($con, $squery));
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Truck</h1>
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


            $title = $_POST['title'];
            $type = $_POST['type'];
            $max_load = $_POST['max_load'];
            $capcacity = $_POST['capcacity'];
            $box_length = $_POST['box_length'];
            $box_width = $_POST['box_width'];
            $height = $_POST['height'];

            $question_insert = "UPDATE `trucks` SET 
 `type` = '$type', 
 `title` = '$title',
 `max_load` = '$max_load',
 `capcacity` = '$capcacity',
 `box_length` = '$box_length',
 `box_width` = '$box_width',
 `height` = '$height'
 WHERE id = '$id'";
            if (mysqli_query($con, $question_insert)) {
              header('Location:trucks.php');
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
                <h3 class="card-title">Edit Data</h3>
              <?php
              }
              ?>
            </div>



            <!-- /.card-header -->
            <form role="form" method="POST">
              <div class="card-body">



                <div class="form-group">
                  <label for="state">Truck Type</label>
                  <select class="form-control" style="width: 100%;" name="type" aria-hidden="true">
                    <?php

                    if ($data['type'] == "open truck") {
                    ?>
                      <option selected>open truck</option>
                    <?php
                    } else {
                    ?>
                      <option>open truck</option>
                    <?php
                    }
                    ?>

                    <?php

                    if ($data['type'] == "container") {
                    ?>
                      <option selected>container</option>
                    <?php
                    } else {
                    ?>
                      <option>container</option>
                    <?php
                    }
                    ?>

                    <?php

                    if ($data['type'] == "trailer") {
                    ?>
                      <option selected>trailer</option>
                    <?php
                    } else {
                    ?>
                      <option>trailer</option>
                    <?php
                    }
                    ?>
                  </select>
                </div>



                <div class="form-group">
                  <label for="name">Title</label>
                  <input type="text" class="form-control" value="<?= $data['title']; ?>" name="title" placeholder="Enter title">
                </div>


                <div class="form-group">
                  <label for="max_load" class="col-sm-2 control-label">Max. Load</label>
                  <div class="col-sm-12">
                    <input type="number" step="any" class="form-control" value="<?= $data['max_load']; ?>" id="max_load" name="max_load" placeholder="Max. Load" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="capcacity" class="col-sm-2 control-label">Capcacity</label>
                  <div class="col-sm-12">
                    <input type="number" step="any" class="form-control" value="<?= $data['capcacity']; ?>" id="capcacity" name="capcacity" placeholder="Capcacity" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="box_length" class="col-sm-2 control-label">Box Length</label>
                  <div class="col-sm-12">
                    <input type="number" step="any" class="form-control" value="<?= $data['box_length']; ?>" id="box_length" name="box_length" placeholder="Box Length" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="box_width" class="col-sm-2 control-label">Box Width</label>
                  <div class="col-sm-12">
                    <input type="number" step="any" class="form-control" value="<?= $data['box_width']; ?>" id="box_width" name="box_width" placeholder="Box Width" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="height" class="col-sm-2 control-label">Height</label>
                  <div class="col-sm-12">
                    <input type="number" step="any" class="form-control" value="<?= $data['height']; ?>" id="height" name="height" placeholder="Height" required>
                  </div>
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