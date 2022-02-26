<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `offer_banner` WHERE `offer_banner`.`id` = '$del_id'";
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
            <h1 class="m-0 text-dark">Offer Banners</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Offer Banners</li>
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
                
				<a href="add_obanner.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
					<th>Image</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM offer_banner ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $category = $row['category'];
					 
					 $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM category WHERE id = '$category'"));
					  
				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td>
                    
                    <a href="<?= base_url.'upload/obanner/'.$row['image']; ?>" data-toggle="lightbox" data-title="category image">
                        <img src="<?= base_url.'upload/obanner/'.$row['image']; ?>" class="img-fluid mb-2" alt="category image" style="height: 50px;">
                      </a>
                    
                    </td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                    <td style="text-align-last: center;"><a href="edit_obanner.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="obanners.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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
