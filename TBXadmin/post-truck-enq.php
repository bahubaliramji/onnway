<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'Booking';
$innersidepage = 'truck_enq';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 
<html>
<head>
  <title>Post A Truck Enquiry</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>

<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	$sql = mysqli_query($dbhandle, "DELETE FROM tbl_post_truck_enq WHERE id = '$deleteid'");
	if($sql){
		header("refresh:1;url=post-truck-enq.php");

	}
}?>
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header with-border">
										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">Post A Truck Enquiry</h3>

									</div><!-- /.box-header -->
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active" style="color:#f0193f">Post A Truck Enquiry</li>
						 </ol>
                      </div>

										<table id="example1" class="table table-bordered table-striped">											<thead>											<tr>													<th>S.No</th>													<th>Name</th>													<th>Phone No</th>													<th>Sourse</th>													<th>Truck Reg No</th>																										<th>Enquiry Date</th>																			<th>Action</th>																		</tr>											</thead>											<tbody>										<?php 	$row = mysqli_query($dbhandle, "select * from tbl_post_truck_enq order by id desc");$x=1;while($fetch = mysqli_fetch_array($row)){	 	?>											<tr>																																					<td><?php echo $x;?></td>													<td><?php echo $fetch['name'];?></td>													<td><?php echo $fetch['mobile'];?></td>																										<td><?php echo $fetch['source'];?></td>													<td><?php echo $fetch['truck_reg_no'];?></td>													<td><?php echo $fetch['post_date'];?></td>													<td>													<a href="truck_enq_details.php?id=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>View More</span></a>																										<a style="margin-left: 10px;" href="post-truck-enq.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>																									</tr><?php $x++; }?>																													</tbody>										</table>

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

