<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `knowledge_center` WHERE `knowledge_center`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      echo "<script>alert('Deleted successfully'); </script> ";
    }
    else
    {
      echo "<script>alert('Error occurred'); </script> ";
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
            <h1 class="m-0 text-dark">Knowledge Center</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Knowledge Center</li>
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
                
				<a href="add_knowledge.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Type</th>
                    <th>Heading</th>
                    <th>Content</th>
                    <th>Video URL</th>
                    <th>Files</th>
                    <th>Status</th>
                    <th>Posted On</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM knowledge_center ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					  $filequery = "SELECT * FROM knowledge_files WHERE knowledge_id = '$id'";
					  $run_query1 = mysqli_query($con , $filequery);
					  
					  $fls = array();
					  
					  while($row2 = mysqli_fetch_array($run_query1))
					  {
						  $fls[] = $row2['file'];
					  }
					  $fl = implode(', ', $fls); 
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td><?= $row['heading']; ?></td>
                    <td><a href="edit_knowledge.php?edit=<?= $id; ?>">View Content</a></td>
					<td><a href="<?= $row['video']; ?>" target="blank"><?= $row['video']; ?></a></td>
                    <td><?= $fl; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                    <td style="text-align-last: center;"><a href="edit_knowledge.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="knowledge_center.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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
