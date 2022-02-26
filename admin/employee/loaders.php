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

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Loaders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Loaders</li>
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
                  <!--<th>Image</th>-->
                  <th>Name</th>
                  <th>KYC Status</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>Type</th>
                  <th>Company Name</th>
                  <th>Added Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM users WHERE type = 'loader' ORDER BY created DESC";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run) > 0)
                     {   
                               
$sno = 0;							   
                      while ($row = mysqli_fetch_array($query_run))
                        {

$sno++;         

		 $id = $row['id'];
		 
		 
		 $query2 = mysqli_query($con,"SELECT * FROM loader_profile_tbl WHERE user_id = '$id'");
		 $row2 = mysqli_fetch_array($query2);
		 
                          $name = $row2['name'];
                          $image = $row2['image'];
                          $email = $row2['email'];
                          $city = $row2['city'];
                          $type = $row2['type'];
                          $company = $row2['company'];
                          $pan_verify = $row2['pan_verify'];
                          $af_verify = $row2['af_verify'];
                          $ab_verify = $row2['ab_verify'];
                          
                          $st = 'PENDING';
                          
                          if($pan_verify == 'verified' && $af_verify == 'verified' && $ab_verify == 'verified')
                          {
                              $st = 'VERIFIED';
                          }
                          
                          if(empty($company))
                          {
                              $company = '---';
                          }
                          
                          $date = $row['created'];
                           $phone = $row['phone'];
                    ?>
                  <tr>
                    <td><?= $sno;?></td>
                   <!-- <td><?= $image;?></td>-->
                    <td><a href="loader_detail.php?id=<?= $id;?>"><?= $name;?></a></td>
                    <td><?= $st;?></td>
                    <td><?= $phone;?></td>
                    <td><?= $email;?></td>
                    <td><?= $city;?></td>
                    <td><?= $type;?></td>
                    <td><?= $company;?></td>
                    <td><?= $date;?></td>
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
