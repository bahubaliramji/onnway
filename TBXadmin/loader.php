<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'loader';
$innersidepage = 'loadercompany';
if($_SESSION['user_id']==''){
	header('location:index.php');
} 
$ldType = $_REQUEST['type'];
 ?>
 

 <html>
<head>
  <title>Loader</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysqli_query($dbhandle, "DELETE FROM tbl_loader WHERE id = '$deleteid'");
	
	if($sql){
//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 
		header("refresh:1;url=loader.php?type='".$ldType."'");
	
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
	$query = mysqli_query($dbhandle, "UPDATE tbl_loader SET status = '$prostatus' WHERE id = '$sid'");
	header("refresh:1;url=loader.php?type='".$ldType."'");
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

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">View Company Loader List</h3>

							

								<!--	<a href="company_register.php" style="float:right"><button  class="btn btn-info">Company Loader register</button></a>
-->
									</div><!-- /.box-header -->
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Loader Register</a></li>
							<li class="active" style="color:#f0193f"><?php echo  $_GET['type'];?></li>
						 </ol>
                      </div>

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>Name</th>
													<th>Mobile Number</th>
													<th>Email</th>
													<th>Company Name</th>
													<th>Status</th>
													<th>Action</th>						
												</tr>

											</thead>

											<tbody>

	<?php 
	
$row = mysqli_query($dbhandle, "select * from tbl_loader where loader_type = '".$ldType."'");

  mysqli_query($dbhandle, "update tbl_loader set news=1 where loader_type = '".$ldType."'");



$x=1;
while($fetch = mysqli_fetch_array($row)){
	?>
											<tr>
											
													
													<td><?php echo $x;?></td>
													<td><a href="loader_details.php?id=<?php echo  $fetch['id'];?>"><?php echo $fetch['name'];?></a></td>
													<td><?php echo $fetch['mb_no'];?></td>
													<td><?php echo $fetch['email'];?></td>
													<td><?php echo $fetch['company_name'];?></td>
												<td> <?php if($fetch['status']=='1'){ ?><a href="loader.php?pids=<?=$fetch['id'];?>&tag=<?=$fetch['status'];?>&type=<?php echo $ldType;?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">active</span></a>
                                                <?php } else if($fetch['status']=='3') {?>
                                                <a href="loader.php?pids=<?=$fetch['id'];?>&tag=<?=$fetch['status'];?>&type=<?php echo $ldType;?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-danger">Deactivate</span></a>
						<?php } ?> 



												</td>
                                                   
													<td>
                                                    <a href="loader_company_edit_reg.php?edit_id=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="loader.php?del_id=<?php echo $fetch['id'];?>&type=<?php echo $ldType;?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
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

