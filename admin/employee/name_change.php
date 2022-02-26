<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
 {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Truck Has Been Deleted";
    }
    else
    {
      $error = "Truck Hasn't Been Deleted";
    }

 }
 
  $row33 = mysqli_query($con,"UPDATE count SET name = 'unread'");

$employeedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM employee WHERE id = '$role'"));

$requests = $employeedata['requests'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Name Change Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Name Change Requests</li>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>New Name</th>
                  <th>Date</th>
                  <?php

if(strpos($requests, '2'))
{
?>
<th>Edit</th>
<?php
}
?>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM name_change_request ORDER BY created DESC";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run) > 0)
                     {   
                               
$sno = 0;							   
                      while ($row = mysqli_fetch_array($query_run))
                        {

$sno++;         

		 $id = $row['id'];
		 $user_id = $row['user_id'];
		 $name = $row['name'];
		 $created = $row['created'];
		 
		 
		 
		 $query2 = mysqli_query($con,"SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
		 $row2 = mysqli_fetch_array($query2);
		 
		 $query21 = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
		 $row22 = mysqli_fetch_array($query21);
		 
		 $type = $row22['type'];
		 
		 
                          
                          
                    ?>
                  <tr>
                    <td><?= $sno;?></td>
                    <?php
                    if($type == 'transporter')
                    {
                        ?>
                        <td><a href="provider_details.php?id=<?= $user_id;?>"><?= $row2['name'];?></a></td>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td><a href="driver_details.php?id=<?= $user_id;?>"><?= $row2['name'];?></a></td>
                        <?php
                    }
                    ?>
                    
                    <td><?= $name;?></td>
                    <td><?= $created;?></td>
                    <?php

if(strpos($requests, '2'))
{
?>
<td style="text-align-last: center;"><a href="update_name.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
<?php
}
?>
                    
                  </tr>
                  <?php }}?>
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
