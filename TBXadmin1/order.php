<?php
session_start();
include ('include/config.php');

$type = $_SESSION['type'];
$sidepage = 'order';
$innersidepage = 'order';

if ($_SESSION['user_id'] == '')
{
	header('location:index.php');
} ?><html>	<head>		<title>Technobrix | Order Management</title>		<?php
include ('include/head.php');
 ?>	</head>	<body class="skin-blue sidebar-mini">		<div class="wrapper">		<?php
include ('include/header.php');
 ?>		<!-- Left side column. contains the logo and sidebar -->		<?php
include ('include/sidebar.php');
 ?>		<?php

if (isset($_GET['del_id']))
{
	$deleteid = $_GET['del_id'];
	$sql = mysqli_query($dbhandle, "DELETE FROM tbl_book_load WHERE id = '$deleteid'");
	if ($sql)
	{
		header("refresh:1;url=order.php");
	}
} ?>		<!--<link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />			<!-- Content Wrapper. Contains page content -->		<div class="content-wrapper">			<!-- Content Header (Page header) -->			<!-- Main content -->			<section class="content">				<div class="row">					<div class="col-xs-12">						<div class="box">							<div class="box-header with-border">								<i class="fa fa-files-o"></i>								<h3 class="box-title">Order Management</h3>								<!--<a href="employee_login_reg.php" style="float:right"><button  class="btn btn-info">+ Add Employee Login</button></a>-->							</div>							<!-- /.box-header -->							<div class="box-body box box-warning">								<div>									<ol class="breadcrumb">										<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>										<li class="active" style="color:#f0193f">Order Management</li>									</ol>								</div>								<table id="example1" class="table table-bordered table-striped">									<thead>										<tr>										
											<th>Sr No.</th>
											<th>Lr No.</th>
											<th>Scheduled Date</th>	
											<th>Route</th>	
											<th>Load Post No</th>	
											<th>Truck Post No</th>
											<th>Status</th>
											<th>Advance Payment Status</th>	
											<th>Document Status</th>	
											<th>Current Status</th>	
											<th>Bal Payment Status</th>	
											<th>Action</th>			
											</tr>		
											</thead>
											<tbody>									<?php
$row = mysqli_query($dbhandle, "select * from tbl_book_load where status!=1 order by id desc");
$x = 1;

while ($fetch = mysqli_fetch_array($row))
{
	$TruckLoadId = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT id,post_truck_id FROM tbl_post_truck WHERE id = '" . $fetch['assign_truck'] . "'"));
	 ?>										<tr>	
	<td><?php echo $x;?></td>			
	<td><?php	echo $fetch['lr_no']; ?></td>	
	<td> <?php	echo $fetch['scheduled_date']." ".$fetch['scheduled_time']; ?></td>		
	<td><?php	echo getCity($fetch['source'])."-".getCity($fetch['destination']); ?></td>		
	<td><a href="book_load_details.php?id=<?php echo $fetch['id'];?>"><?php	echo $fetch['booking_id']; ?></a></td>		
	<td><a href="book_truck_details.php?id=<?php echo $TruckLoadId['id'];?>"><?php	echo $TruckLoadId['post_truck_id']; ?></a></td>	
	<td><?php	echo getFullStatus($fetch['status']); ?></td>		
	<td><?php	echo getFullStatus($fetch['payment_status']); ?></td>		
	<td><?php	echo getFullStatus($fetch['document_status']); ?></td>		
	<td><?php	echo getFullStatus($fetch['delivery_status']); ?></td>		
	<td><?php	echo getFullStatus($fetch['bal_payment_status']); ?></td>		
	<td width="141px; paging:2px;">							<a href="order_management_edit.php?edit_id=<?php
	echo $fetch['id']; ?>"><span class="btn btn-success btn-xs" id="edit21"><i class="fa fa-edit"></i>Edit</span></a>												<a style="margin-left: 10px;" href="order.php?del_id=<?php
	echo $fetch['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a>											</td>										</tr>										<?php
	$x++;
} ?>																			</tbody>								</table>							</div>						</div>					</div>			</section>			</div>		</div>		<!-- ./wrapper -->		<!-- DATA TABES SCRIPT -->		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>		<script src="bootstrap/js/bootstrap.min.js"></script>		<script src="plugins/datatables/jquery.dataTables.min.js"></script>		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>		<!-- AdminLTE App -->		<script src="dist/js/app.min.js"></script>		<?php //include("web_files/footer.php");
 ?>		<!-- page script -->		<script type="text/javascript">

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

			</script>	</body></html><style>
	tr{
		text-align:center;
	}
	th{
		text-align:center;
	}
	
	</style>