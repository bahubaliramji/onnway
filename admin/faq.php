<?php

include('inc/head.php');
include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `faq` WHERE `faq`.`f_id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Why choose us Has Been Deleted";
    } else {
      $error = "Why choose us Hasn't Been Deleted";
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
            <h1 class="m-0 text-dark">FAQs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">FAQs</li>
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
                
                <a href="add_faq.php" class="btn btn-outline-success">ADD DATA</a>
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM faq";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $f_id = $row['f_id'];
					  
				  ?>
				  
                  <tr>
                    <td><?= $row['f_ques']; ?></td>
                    <td><?= $row['f_ans']; ?></td>
                    <!-- <td style="text-align-last: center;"><a href="edit_faq.php?edit=<?= $f_id; ?>"><i class="fas fa-pencil-alt"></i></a></td> -->
                    <td style="text-align-last: center;"><a href="faq.php?del=<?= $f_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  <?php
				  }
				  ?>
                 
                  </tbody>
                  
                </table>
              </div>
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
