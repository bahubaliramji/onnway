<?php session_start();

include('include/config.php');

$type = $_SESSION['type']; 

$sidepage = 'vehicle';

$innersidepage = 'vehiclealltruck';

if($_SESSION['user_id']==''){

	header('location:index.php');

}

 ?>

<html>

<head>

<title>Technobrix | Vehicle</title>

<?php include('include/head.php'); ?>

</head>

<body class="skin-blue sidebar-mini">



<div class="wrapper">

<?php include('include/header.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->

<?php include('include/sidebar.php'); ?>

<?php if(isset($_GET['del_id'])){

 $deleteid = $_GET['del_id'];

 $sql = mysqli_query($dbhandle, "DELETE FROM tbl_trucks WHERE id = '$deleteid'");

	

	if($sql){

//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 

		header("refresh:1;url=vehicle-transporter.php");

	

	}



}?>





<?php //Status active/deactive



if($_GET['tag'])

{

	if($_GET['tag']=='3'){

		$prostatus = '1';

	}else{

		$prostatus = '3';

	}

	$sid = $_GET['pids'];

	$query = mysqli_query($dbhandle, "UPDATE tbl_trucks SET status = '$prostatus' WHERE id = '$sid'");

	header("refresh:1;url=vehicle-transporter.php");

  //$query= $objT->ActivateDeactiveRowProgarm('user_data',"status",$_GET['active'],$_GET['id']);

}	

?>

			<!--<link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />



			<!-- Content Wrapper. Contains page content -->



			



			<div class="content-wrapper">



				<!-- Content Header (Page header) -->



				







				<!-- Main content -->



				<section class="content">



					<div class="row">



						<div class="col-xs-12">



							<div class="box">

								<div class="box-header with-border">



										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">View All Truck List</h3>



							



									<!--<a href="vehicletransporter_register.php" style="float:right"><button  class="btn btn-info">Truck register</button></a>--.



									</div><!-- /.box-header -->

<div class="box-body box box-warning">		

												 <div>

                        <ol class="breadcrumb">

                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                            <li><a href="vehicle_register.php">Vehicle Register</a></li>

							<li class="active" style="color:#f0193f">All Truck List</li>

						 </ol>

                      </div>



										<table id="example1" class="table table-bordered table-striped">



											<thead>



											<tr>

													<th>S.No</th>

													<th>Truck reg No </th>
													
													<th>Truck type</th>

													<th>Load Passsing</th>
													
													<th>Vehicle Owner</th>
													
													<th>Email</th>

													<th>Driver Name</th>

													<th>Driver Mobile No</th>
													
													<th>Track Location</th>

													<th>Action</th>						

												</tr>



											</thead>



											<tbody>



	<?php 

	$sql = "select * from tbl_trucks ";
	if($_GET['v_id']!=""){
		$sql .= " where vehicle_owner_id='".$_GET['v_id']."' ";
	}
		$sql .= "order by id desc";
$row = mysqli_query($dbhandle, $sql);

$x=1;

	

while($fetch = mysqli_fetch_array($row)){

	?>

											<tr>

											

													

													<td><?php echo $x;?></td>

													<td><a href="truck_details.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['truck_reg_no'];?></a></td>

													<td><?php echo getTruckType($fetch['truck_type']);?></td>

													<td><?php echo $fetch['load_passing'];?></td>
													<td> <a href="vehicle_owner_details.php?id=<?php echo $fetch['vehicle_owner_id'];?>"><?php echo  getVehicleOwnerInfo($fetch['vehicle_owner_id'])['name'];?></a></td>
													<td><?php echo  getVehicleOwnerInfo($fetch['vehicle_owner_id'])['email'];?></td>

													<td><?php echo $fetch['driver_name'];?></td>
													<td><?php echo $fetch['mobile_no'];?></td>
<td><a href="track_truck.php?id=<?php echo $fetch['id'];?>">Track Location</a></td>
                                                   

													<td style="padding: 2px; width: 141px;">

                                                    <a href="vehicle_truck_edit_reg.php?edit_id=<?php echo $fetch['id'];?>"><span class="edit-style btn btn-success btn-xs" style=""><i class="fa fa-edit"></i>Edit</span></a>

                                                    	<a style="margin-left: 10px;" href="vehicle-all-truck.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>

												</tr>



	

<?php $x++; }?>



	



												



											</tbody>



										</table>



									</div>

		  



							</div>



						</div>



					</section>



				</div>



			</div><!-- ./wrapper -->



     



			<!-- DATA TABES SCRIPT -->



			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>



			<script src="bootstrap/js/bootstrap.min.js"></script>



			<script src="plugins/datatables/jquery.dataTables.min.js"></script>



			<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>



			<!-- AdminLTE App -->



			<script src="dist/js/app.min.js"></script>



    



			<?php //include("web_files/footer.php");?>



   



			<!-- page script -->



			<script type="text/javascript">



			  $(function () {



				$("#example1").DataTable();



				$('#example2').DataTable({



				  "paging": true,



				  "lengthChange": false,



				  "searching": false,



				  "ordering": true,



				  "info": true,



				  "autoWidth": false



				});



			  });



			</script>





		</body>



	</html>

	<style>

	tr{

		text-align:center;

	}

	th{

		text-align:center;

	}

	

	</style>



