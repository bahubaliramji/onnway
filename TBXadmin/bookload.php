<?php session_start();
	include('include/config.php');
	$type = $_SESSION['type']; 
	$sidepage = 'Booking';
	$innersidepage = 'bookload';
	if($_SESSION['user_id']==''){
		header('location:index.php');
	}
	 ?>
<html>
	<head>
		<title>Post A Load</title>
		<?php include('include/head.php'); ?>
	</head>
	<body class="skin-blue sidebar-mini">
		<div class="wrapper">
		<?php include('include/header.php'); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php include('include/sidebar.php'); ?>
		<?php if(isset($_GET['del_id'])){
			$deleteid = $_GET['del_id'];
			
			$sql = mysqli_query($dbhandle, "DELETE FROM tbl_book_load WHERE id = '$deleteid'");
			
			if($sql){
			//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 
			header("refresh:1;url=bookload.php");
			
			}
			
			}?>
		<?php //Status active/deactive
			if($_GET['tag'])
			{
				if($_GET['tag']=='active'){
					$prostatus = 'inactive';
				}else{
					$prostatus = 'active';
				}
				$sid = $_GET['pids'];
				$query = mysqli_query($dbhandle, "UPDATE tbl_book_load SET status = '$prostatus' WHERE book_load_id = '$sid'");
				header("refresh:1;url=bookload.php");
			  //$query= $objT->ActivateDeactiveRowProgarm('user_data',"status",$_GET['active'],$_GET['id']);
			}	
			?>
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header with-border">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<h3 class="box-title">View Post a Load List</h3>
								<!--<a href="book_load.php" style="float:right"><button  class="btn btn-info">Book Post a Load</button></a>-->
							</div>
							<!-- /.box-header -->
							<div class="box-body box box-warning" style="overflow: scroll;">
								<div>
									<ol class="breadcrumb">
										<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
										<li><a href="booking.php">Booking</a></li>
										<li class="active" style="color:#f0193f">Post a Load</li>
									</ol>
								</div>
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Booking Id</th>
											<th>Name</th>
											<th>Type</th>
												<th>Truck Type</th>
											<th>Email Id</th>
											<th>Phone No</th>
											<th>Sourse</th>
											<th>Destinatoion</th>
											<th>Schedule Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$row = mysqli_query($dbhandle, "select * from tbl_book_load  order by id desc");


											  mysqli_query($dbhandle, "update tbl_book_load set news=1 ");
											$x=1;
											while($fetch = mysqli_fetch_array($row)){
												$email = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$fetch['loader_id']."'"));$status = mysqli_fetch_array(mysqli_query($dbhandle, "Select * from tbl_status where value = '".$fetch['status']."' "));
												
												  $vehicledata = mysqli_fetch_assoc(mysqli_query($dbhandle, "select * from vehicle_list where id='".$fetch['vehicle_type']."'"));
												?>
										<tr>
											<td><?php echo $x;?></td>
											<td><a href="book_load_details.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['booking_id'];?></a></td>
											<td><a href="loader_details.php?id=<?php echo $fetch['loader_id'];?>"><?php echo $email['name'];?></a></td>

											<td><?php echo $email['loader_type'];?></td>

											 <td><?php echo $vehicledata['dimension'].' / '.$vehicledata['length'];?>MT</td> 
											<td><?php echo $email['email'];?></td>
											<td><?php echo $email['mb_no'];?></td>
											<td><?php echo getCity($fetch['source']);?></td>
											<td><?php echo getCity($fetch['destination']);?></td>
											<td><?php echo $fetch['scheduled_date'].' '.$fetch['scheduled_time'] ;?></td>
											<td>																										<?php echo $status['name'] ;?>													</td>
											<td style="width: 141px; padding: 2px;">
												<a href="book_load_edit.php?edit_id=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
												<a style="margin-left: 10px;" href="bookload.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a>
											</td>
										</tr>
										<?php $x++; }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
			</section>
			</div>
		</div>
		<!-- ./wrapper -->
		<!-- DATA TABES SCRIPT -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>


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