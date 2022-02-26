<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'ordermanage';
$innersidepage = 'order';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 

 <html>
<head>
  <title>Technobrix | Order Management</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>

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

										<i class="fa fa-files-o"></i><h3 class="box-title">Order Management</h3>
										
										<a href="#" style="float:right"><button class="btn btn-info" id="invo1">Invoice</button></a>

							

									<!--<a href="employee_login_reg.php" style="float:right"><button  class="btn btn-info">+ Add Employee Login</button></a>-->

									</div><!-- /.box-header -->
									
<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active" style="color:#f0193f">Order Management</li>
						 </ol>
                      </div>
					  
					

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>Booking No.</th>
													<th>Booking Name</th>
													<th>Delivery Status</th>
													<th>Payment Status</th>
													<th>Action</th>
																		
												</tr>

											</thead>

											<tbody>

											<tr>
													
													<td>1</td>
													<td>00101</td>
													<td> Mukul Rawat</td>
													<td>Complete</td>
													<td>Complete</td>
													<td>
                                                    <a href="#"><span class="btn btn-success btn-xs" id="edit21"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="#" class="btn btn-danger btn-xs" id="delete21" onClick="return confirm('Are you sure want to delete?')">Delete</a>
												   </td>
												</tr>
												
												<tr>
													
													<td>2</td>
													<td>00102</td>
													<td> Amit Soni</td>
													<td>Pending</td>
													<td>Pending</td>
													
											
                                                   
													<td>
                                                    <a href="#"><span class="btn btn-success btn-xs" id="edit22"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="#" class="btn btn-danger btn-xs" id="delete22" onClick="return confirm('Are you sure want to delete?')">Delete</a>
												   </td>
												</tr>

	

												

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
	button#invo1 {
    width: 97px;
}
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

