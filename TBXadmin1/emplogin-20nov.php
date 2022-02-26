<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'login';
$innersidepage = 'emplogin';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 

 <html>
<head>
  <title>Technobrix | Empolyee Login</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysql_query("DELETE FROM tbl_emp_login WHERE emp_id = '$deleteid'");
	
	if($sql){
//$sms = "<p style='text-align:center;color:green;'>Employee deleted successfully</p>"; 
		header("refresh:1;url=emplogin.php");
	
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
	$query = mysql_query("UPDATE tbl_emp_login SET status = '$prostatus' WHERE emp_id = '$sid'");
	header("refresh:1;url=emplogin.php");
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

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">Employee Login</h3>

							

									<a href="employee_login_reg.php" style="float:right"><button  class="btn btn-info">+ Add Employee Login</button></a>

									</div><!-- /.box-header -->
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="login_management.php">Login Management</a></li>
							<li class="active" style="color:#f0193f">Employee Login</li>
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
													<th>Company Name</th>
													<th>Status</th>
													<th>Action</th>						
												</tr>

											</thead>

											<tbody>
<?php 
	
$row = mysql_query("select * from tbl_emp_login");
$x=1;
	
while($fetch = mysql_fetch_array($row)){
	?>
											<tr>
											
													
													<td><?php echo $x;?></td>
													<td><?php echo $fetch['f_name'];?></td>
													<td><?php echo $fetch['l_name'];?></td>
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['email'];?></td>
													<td><?php echo $fetch['company_name'];?></td>
													<!--<td><img src="upload/emp_image/<?php/* echo $fetch['profile_img'];*/?>"></td>-->
                                               
												<td> <?php if($fetch['status']=='active'){ ?><a href="emplogin.php?pids=<?=$fetch['emp_id'];?>&tag=<?=$fetch['status'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">active</span></a>
                                                <?php } else if($fetch['status']=='inactive') {?>
                                                <a href="emplogin.php?pids=<?=$fetch['emp_id'];?>&tag=<?=$fetch['status'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-danger">Deactivate</span></a>
						<?php }?> 



												</td>
                                                   
													<td>
                                                    <a href="emp_login_edit_reg.php?edit_id=<?php echo $fetch['emp_id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="emplogin.php?del_id=<?php echo $fetch['emp_id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
												</tr>
<?php $x++; }?>
	<!--<tr>
													
													<td>1</td>
													<td>mukul</td>
													<td>Rawat</td>
													<td>7894563214</td>
													<td>mukul@gmail.com</td>
													<td>Technobrix</td>
                                                    <td><a href="#" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-danger">Deactive</span></a></td>
													<td>
                                                    <a href="#"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="#" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
												</tr>-->

												

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

