<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
 {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `fares` WHERE `fares`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Truck Has Been Deleted";
    }
    else
    {
      $error = "Truck Hasn't Been Deleted";
    }

 }
 
 $employeedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM employee WHERE id = '$role'"));

$data = $employeedata['data'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fares</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Fares</li>
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
                
                <?php

if(strpos($data, '4'))
{
?>
<div class="card-header">
                
				<a href="add_fare.php" class="btn btn-outline-success">ADD DATA</a>
				
				<a href="bulk.php" class="btn btn-outline-info">BULK IMPORT</a>
				
				
              </div>

<?php
}

?>
                
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Source</th>
                  <th>Destination</th>
                  <th>Truck</th>
                  <th>Freight</th>
                  <th>Other Charges</th>
                  <th>CGST</th>
                  <th>SGST</th>
                  <th>Insurance</th>
                  <th>Added Date</th>
                  <?php

if(strpos($data, '2'))
{
?>
<th>Edit</th>

<?php
}

?>

<?php

if(strpos($data, '3'))
{
?>
<th>Delete</th>

<?php
}

?>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM fares ORDER BY created DESC";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run) > 0)
                     {   
                               
$sno = 0;							   
                      while ($row = mysqli_fetch_array($query_run))
                        {

$sno++;         

		 $id = $row['id'];
		 
		 
                          
                          $source = $row['source'];
                          $destination = $row['destination'];
                          $truck_id = $row['truck_id'];
                          
                          
                          $tdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM trucks WHERE id = '$truck_id'"));
                          
                          
                          $freight = $row['freight'];
                          $other_charges = $row['other_charges'];
                          $cgst = $row['cgst'];
                          $sgst = $row['sgst'];
                          $insurance = $row['insurance'];
                          $created = $row['created'];
                    ?>
                  <tr>
                    <td><?= $sno;?></td>
                    <td><?= $source;?></td>
                    <td><?= $destination;?></td>
                    <td><?= $tdata['type'];?> - <?= $tdata['title'];?></td>
                    <td>₹<?= $freight;?></td>
                    <td>₹<?= $other_charges;?></td>
                    <td>₹<?= $cgst;?></td>
                    <td>₹<?= $sgst;?></td>
                    <td>₹<?= $insurance;?></td>
                    <td><?= $created;?></td>
                    <?php

if(strpos($data, '2'))
{
?>
<td style="text-align-last: center;"><a href="edit_fare.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>

<?php
}

?>

<?php

if(strpos($data, '3'))
{
?>
<td style="text-align-last: center;"><a href="fares.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>

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
