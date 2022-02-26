<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle1';
$innersidepage = 'vehicle';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 

 <html>
<head>
  <title>Vehicle List</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysqli_query($dbhandle, "DELETE FROM vehicle_list WHERE id = '$deleteid'");
	
	if($sql){
//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 
		header("refresh:1;url=vehicle_list.php");
	
	}

}?>


<?php //Status active/deactive

if($_GET['tag'])
{
	
	$pids = $_GET['pids'];
	$tag = $_GET['tag'];
	$query = mysqli_query($dbhandle, "UPDATE vehicle_list SET status = '$tag' WHERE id = '$pids'");
	header("refresh:1;url=vehicle_list.php");
  //$query= $objT->ActivateDeactiveRowProgarm('user_data',"status",$_GET['active'],$_GET['id']);
}	
?>
			

			<div class="content-wrapper">

				<!-- Content Header (Page header) -->

				



				<!-- Main content -->

				<section class="content">

					<div class="row">

						<div class="col-xs-12">

							<div class="box">
								<div class="box-header with-border">

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">Vehicle List</h3>

							

									<a href="add_vehicle.php" style="float:right"><button  class="btn btn-info">+ Add Vehicle</button></a>

									</div><!-- /.box-header -->
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="">Vehicle Management</a></li>
							<li class="active" style="color:#f0193f">Vehicle List</li>
						 </ol>
                      </div>
					  
					

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>Weight</th>
													<th>Dimension</th>
													<th>Price/Km</th>
													<th>Status</th>
													<th>Action</th>						
												</tr>

											</thead>

											<tbody>
<?php 
	
$row = mysqli_query($dbhandle, "select * from vehicle_list order by vehicle_reg_no");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
	?>
											<tr>
											
													
													<td><?php echo $x;?></td> 
													<td><?php echo $fetch['length'];?> MT </td>
													<td><?php echo $fetch['dimension'];?></td>
													<td><?php echo $fetch['price_km'];?></td>
													
                                               
												<td> 
												<?php if($fetch['status']=='0'){ ?><a href="vehicle_list.php?pids=<?=$fetch['id'];?>&tag=1" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a>
                                                <?php } else {?>
                                                <a href="vehicle_list.php?pids=<?=$fetch['id'];?>&tag=0" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-danger">Deactivate</span></a>
						<?php }?> 



												</td>
                                                   
													<td>
                                                    <a href="edit_vehicle.php?edit=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="vehicle_list.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
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
	button#add-emp {
    float: right;
	    margin-right: 10px;
	
}
	div#example1_filter {
    display: none;
}
	tr{
		text-align:center;
	}
	th{
		text-align:center;
	}
	
	</style>

