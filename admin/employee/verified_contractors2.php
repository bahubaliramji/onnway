<?php

include('inc/head2.php');

?>

<?php

include('inc/sidebar2.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Verified Contractors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
                        <li class="breadcrumb-item active">Verified Contractors</li>
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
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Sector</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Work Type</th>
                                        <th>Experience</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
          
          $qqq1 = mysqli_query($con , "SELECT * FROM brands WHERE user_id = '$bid'");
$ddata2 = mysqli_fetch_array($qqq1);

$sector = $ddata2['sector'];

				  $query = "SELECT * FROM contractors WHERE sector IN ($sector) ORDER BY id DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  $image = $row['photo'];
					  $user_id = $row['user_id'];
					  
					  $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
					  
					  //$image = base_url.'upload/users/'.
            
            $sectorski = $row['sector'];
		
		$sectorski_arr = explode (",", $sectorski);
		
		$sectorsktitle = array();
		
		foreach ($sectorski_arr as $value) {
    $sectorddd = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$value'"));

	$sectorsktitle[] = $sectorddd['title'];

	
	
}
		$sectorsist = implode(', ', $sectorsktitle); 


    $ski = $row['work_type'];
		
		$ski_arr = explode (",", $ski);
		
		$sktitle = array();
		
		foreach ($ski_arr as $value) {
    $ddd = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skills WHERE id = '$value'"));

	$sktitle[] = $ddd['title'];

	
	
}
		$sist = implode(', ', $sktitle); 

					  
				  ?>

                                    <tr>
                                        <td><?= $sno; ?></td>

                                        <td><a
                                                href="contractor_profile2.php?id=<?= $user_id; ?>"><?= $row['name']; ?></a>
                                        </td>
                                        <td>Contractor</td>
                                        <td><?= $sectorsist; ?></td>
                                        <td><?= $udata['phone']; ?></td>

                                        <?php
				 $gender = $row['gender'];
				 $genderdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM gender WHERE id = '$gender'"));
				 
				 ?>

                                        <td><?= $genderdata['title']; ?></td>
                                        
                                        
                                        <td><?= $row['cdistrict']; ?></td>
                                        <td><?= $row['cstate']; ?></td>
                                        <td><?= $sist; ?></td>
                                        <td><?= $row['experience']; ?></td>
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