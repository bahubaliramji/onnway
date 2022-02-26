<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $squery =  "SELECT * FROM knowledge_center WHERE id = '$id'";
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
          <h1 class="m-0 text-dark">Edit Knowledge Center Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="knowledge_center.php">Knowledge Center</a></li>
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


            $type = $_POST['type'];
            $heading = $_POST['heading'];
            $content = $_POST['content'];
            $video = $_POST['video'];
            $status = $_POST['status'];

            if (empty($type) or  empty($heading) or  empty($content) or empty($status)) {
              $error = "Please fill all fields";
            } else {

              $question_insert = "UPDATE knowledge_center SET type = '$type', heading = '$heading', content = '$content',video = '$video', status = '$status' WHERE id = '$id'";
              if (mysqli_query($con, $question_insert)) {


                $iidd = $id;

                $total = count($_FILES['files']['name']);

                // Loop through each file
                for ($i = 0; $i < $total; $i++) {

                  //Get the temp file path
                  $tmpFilePath = $_FILES['files']['tmp_name'][$i];

                  //Make sure we have a file path
                  if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "upload/knowledge/" . $_FILES['files']['name'][$i];
                    $fname = $_FILES['files']['name'][$i];
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                      //Handle other code here
                      $question_insert2 = "INSERT INTO `knowledge_files` (`knowledge_id`, `file`) 
                VALUES ('$iidd','$fname')";
                      mysqli_query($con, $question_insert2);
                    }
                  }
                }


                header('Location:knowledge_center.php');
              } else {
                $error = "Some error occurred";
              }
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
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="type">Type</label>
                  <select class="form-control" style="width: 100%;" name="type" aria-hidden="true">
                    <?php
                    $t = $data['type'];
                    if ($t == 'worker') {
                    ?>
                      <option value="worker" selected>Worker</option>
                    <?php
                    } else {
                    ?>
                      <option value="worker">Worker</option>
                    <?php
                    }
                    ?>
                    <?php
                    if ($t == 'brand') {
                    ?>
                      <option value="brand" selected>Brand</option>
                    <?php
                    } else {
                    ?>
                      <option value="brand">Brand</option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="heading">Heading</label>
                  <input type="text" class="form-control" value="<?= $data['heading']; ?>" name="heading" placeholder="Enter Heading">
                </div>

                <div class="form-group">
                  <label for="content">Content</label>
                  <div class="mb-3">
                    <textarea class="textarea" placeholder="Place some text here" name="content" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['content']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="video">Video URL</label>
                  <input type="text" value="<?= $data['video']; ?>" class="form-control" name="video" placeholder="Enter Video URL">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                    <?php
                    $s = $data['status'];
                    if ($s == 'active') {
                    ?>
                      <option value="active" selected>Active</option>
                    <?php
                    } else {
                    ?>
                      <option value="active">Active</option>
                    <?php
                    }
                    ?>
                    <?php
                    if ($s == 'inactive') {
                    ?>
                      <option value="inactive" selected>Inactive</option>
                    <?php
                    } else {
                    ?>
                      <option value="inactive">Inactive</option>
                    <?php
                    }
                    ?>
                  </select>
                </div>


                <div class="form-group">
                  <label>Files</label>

                  <?php

                  $filequery = "SELECT * FROM knowledge_files WHERE knowledge_id = '$id'";
                  $run_query1 = mysqli_query($con, $filequery);
                  while ($row2 = mysqli_fetch_array($run_query1)) {
                  ?>

                    <div class="input-group" style="width: 100%;">
                      <a type="text" href="<?= base_url . "upload/knowledge/" . $row2['file']; ?>" target="blank" class="form-control"><?= $row2['file']; ?></a>
                      <span class="input-group-append">
                        <button type="button" class="btn btn-info" onclick="deletenow(<?= $row2['id']; ?>)"><i class="fas fa-trash-alt"></i></button>
                      </span>
                    </div>
                    </br>
                  <?php
                  }
                  ?>

                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="files" name="files[]" multiple>
                      <label class="custom-file-label" for="files">Add Files</label>
                    </div>
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

<script>
  function deletenow(id) {

    console.log(id);

    $.ajax({
      url: 'data.php',
      method: 'post',
      data: 'aid=' + id
    }).done(function(dd) {

      if (dd == 'success') {
        location.reload();
      } else {
        window.alert("Some error occurred");
      }

    })

  }
</script>

<?php
include('inc/footer.php');
?>