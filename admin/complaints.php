<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `survey_officer` WHERE `survey_officer`.`id` = '$del_id'";
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
            <h1 class="m-0 text-dark">Complaints Section</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Complaints Section</li>
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
                
				<a href="add_complaint.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Body</th>
                    <th>Reply</th>
                    <th>Text Status</th>
                    <th>Status</th>
					<th>Edit</th>
                    <th>Placed On</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM complaint ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $user_id = $row['user_id'];
					 
					 $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
					  
					  $type = $sdata['type'];
					  if($type == 'worker')
	{
		
		$iidd = 'W00'.$sdata['id'];
		
		
	}
	else if($type == 'brand')
	{
		
		$iidd = 'B00'.$sdata['id'];
	}
	else
	{
		
		$iidd = 'C00'.$sdata['id'];
	}
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <?php
					if($type == 'worker')
					{
					?>
					<td><a href="worker_profile.php?id=<?= $sdata['id']; ?>"><?= $iidd; ?></a></td>
					<?php
					}
					else if($type == 'brand')
					{
					?>
					<td><a href="brand_profile.php?id=<?= $sdata['id']; ?>"><?= $iidd; ?></a></td>
					<?php
					}
					else
					{
					?>
					<td><a href="contractor_profile.php?id=<?= $sdata['id']; ?>"><?= $iidd; ?></a></td>
					<?php
					}
					?>
                    <td><?= $sdata['name']; ?></td>
                    <td><?= $sdata['phone']; ?></td>
                    <td><?= $row['subject']; ?></td>
                    <td><?= $row['body']; ?></td>
                    <td><?= $row['reply']; ?></td>
                    <td><?= $row['text_status']; ?></td>
                    <td><?= $row['status']; ?></td>
					<td style="text-align-last: center;"><a href="edit_complaint.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><?= $row['created']; ?></td>
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
