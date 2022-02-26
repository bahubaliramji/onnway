<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'loader';
$innersidepage = 'loaderindividual';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 

 <html>
<head>
  <title>Technobrix | Loader</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>

<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysqli_query($dbhandle, "DELETE FROM tbl_loader_individual WHERE tbl_l_individual_id = '$deleteid'");
	
	if($sql){
//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 
		header("refresh:1;url=individual-loader.php");
	
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
	$query = mysqli_query($dbhandle, "UPDATE tbl_loader_individual SET status = '$prostatus' WHERE tbl_l_individual_id = '$sid'");
	header("refresh:1;url=individual-loader.php");
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

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">View Individual Loader List</h3>

							

									<!--<a href="individual_register.php" style="float:right"><button  class="btn btn-info">Individual Loader register</button></a> -->

									</div><!-- /.box-header -->
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Loader Register</a></li>
							<li class="active" style="color:#f0193f">Individual Loader</li>
						 </ol>
                      </div>

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>First Name</th>
													
													<th>Last Name</th>
													<th>Mobile Number</th>
													<th>Email</th>
													<th>Status</th>
													<th>Action</th>						
												</tr>

											</thead>

											<tbody>

	<?php 
	
$row = mysqli_query($dbhandle, "select * from tbl_loader_individual");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
	?>
											<tr>
											
													
													<td><?php echo $x;?></td>
													<td><?php echo $fetch['f_name'];?></td>
													<td><?php echo $fetch['l_name'];?></td>
													<td><?php echo $fetch['mb_no'];?></td>
													<td><?php echo $fetch['email'];?></td>
													
													<!--<td><img src="upload/emp_image/<?php/* echo $fetch['profile_img'];*/?>"></td>-->
                                               
												<td> <?php if($fetch['status']=='active'){ ?><a href="individual-loader.php?pids=<?=$fetch['tbl_l_individual_id'];?>&tag=<?=$fetch['status'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">active</span></a>
                                                <?php } else if($fetch['status']=='inactive') {?>
                                                <a href="individual-loader.php?pids=<?=$fetch['tbl_l_individual_id'];?>&tag=<?=$fetch['status'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-danger">Deactivate</span></a>
						<?php }?> 



												</td>
                                                   
													<td>
                                                    <a href="individual_edit_register.php?edit_id=<?php echo $fetch['tbl_l_individual_id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="individual-loader.php?del_id=<?php echo $fetch['tbl_l_individual_id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
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

