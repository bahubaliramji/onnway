<?php
 include'inc/head.php';

 if(isset($_GET['id']))
 {
    /*$del_id = $_GET['del'];
    $del_query = "DELETE FROM `school` WHERE `school`.`school_id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "School Has Been Deleted";
    }
    else
    {
      $error = "School Hasn't Been Deleted";
    }*/

 }
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'inc/header.php';?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include 'inc/sidebar.php';?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">Full Load Enquiries</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h4 class="text-center">
                <?php
                if(isset($msg))
                {
                  echo "<span style='color:green'>$msg</span>";
                }
                else if(isset($error))
                {
                  echo "<span style='color:red'>$error</span>";
                }
                ?>                  
              </h4>              
              <!--<a href="school-add.php" class="btn btn-success pull-right">Add School</a>-->
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Order ID</th>
                  <th>Loader Name</th>
                  <th>Loader Phone</th>
                  <th>Source</th>
                  <th>Destination</th>
                  <th>Truck Type</th>
                  <th>Scheduled Date</th>
                  <th>Weight</th>
                  <th>Material</th>
                  <th>Payable Freight</th>
                  <th>Pickup Address</th>
                  <th>Drop Address</th>
                  <th>Status</th>
                  <th>Booking Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM orders WHERE laod_type = 'full' AND (status = 'placed' OR status = 'assigned to driver' OR status = 'started' OR status = 'completed' OR status = 'cancelled') ORDER BY created DESC";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run) > 0)
                     {   
                               
$sno = 0;							   
                      while ($row = mysqli_fetch_array($query_run))
                        {

$sno++;         

		 $id = $row['id'];
		 $user_id = $row['user_id'];
		 $source = $row['source'];
		 $destination = $row['destination'];
		 $truck_type = $row['truck_type'];
		 
		 $query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
		 $row4 = mysqli_fetch_array($query4);
		 
		 $schedule = $row['schedule'];
		 $weight = $row['weight'];
		 $material = $row['material'];
		 
		 $query5 = mysqli_query($con,"SELECT * FROM tbl_material WHERE id = '$material'");
		 $row5 = mysqli_fetch_array($query5);
		 
		 $freight = $row['freight'];
		 $other_charges = $row['other_charges'];
		 $cgst = $row['cgst'];
		 $sgst = $row['sgst'];
		 $insurance = $row['insurance'];
		 
		 $fr = $freight + $other_charges + $cgst + $sgst + $insurance;
		 
		 $pickup_address = $row['pickup_address'];
		 $drop_address = $row['drop_address'];
		 $status = $row['status'];
		 $created = $row['created'];
		 
		 $query2 = mysqli_query($con,"SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
		 $row2 = mysqli_fetch_array($query2);
		 
		 
		 $query3 = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
		 $row3 = mysqli_fetch_array($query3);
		 
		 
                          $name = $row2['name'];
                          $phone = $row3['phone'];
                          
                          $trucks = $row4['type'].' - '.$row4['title'];
                          $mater = $row5['material_name'];
                          
                          if(empty($company))
                          {
                              $company = '---';
                          }
                          
                    ?>
                  <tr>
                    <td><?= $sno;?></td>
                    <td><?= $id;?></td>
                    <td><?= $name;?></td>
                    <td><?= $phone;?></td>
                    <td><?= $source;?></td>
                    <td><?= $destination;?></td>
                    <td><?= $trucks;?></td>
                    <td><?= $schedule;?></td>
                    <td><?= $weight;?></td>
                    <td><?= $mater;?></td>
                    <td>₹<?= $fr;?></td>
                    <td><?= $pickup_address;?></td>
                    <td><?= $drop_address;?></td>
                    <td><?= $status;?></td>
                    <td><?= $created;?></td>
                  </tr>
                  <?php }}?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</div>
</body>
</html>
