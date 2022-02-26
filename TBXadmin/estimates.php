<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'estimates';
$innersidepage = 'all_estimate';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 <html>
<head>
  <title>Estimate List</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysqli_query($dbhandle, "DELETE FROM  tbl_estimate WHERE id = '$deleteid'");
	
	if($sql){
 
		header("refresh:1;url=estimates.php");
	
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
	$query = mysqli_query($dbhandle, "UPDATE  tbl_estimate SET status = '$prostatus' WHERE id = '$sid'");
	header("refresh:1;url=estimates.php");
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

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">Estimate List</h3>

							

									<a href="add_estimate.php" style="float:right"><button  class="btn btn-info">+ Estimate City</button></a>

									</div><!-- /.box-header -->
				<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                           
							<li class="active" style="color:#f0193f">Estimate List</li>
						 </ol>
                      </div>
					  
					

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>From City </th>
													<th>To City</th>
													<th>Truck</th>
													<th>Price</th>
													<th>Action</th>
													
											</tr>

											</thead>

											<tbody>
<?php 
	
$row = mysqli_query($dbhandle, "select * from tbl_estimate order by id ");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){		

	$fromcity = mysqli_fetch_array(mysqli_query($dbhandle, "select * from  tbl_city where id = '".$fetch['from_id']."'"));
	$tocity = mysqli_fetch_array(mysqli_query($dbhandle, "select * from  tbl_city where id = '".$fetch['to_id']."'"));
$truck_type = mysqli_fetch_array(mysqli_query($dbhandle, "select * from  vehicle_list where id = '".$fetch['truck_type']."'"));

	?>
											<tr>
											
													
												<td><?php echo $x;?></td>
												<td><?php echo $fromcity['city_name'];?></td>
												<td><?php echo $tocity['city_name'];?></td>
                                               
												<td> <?php echo $truck_type['length'] ; ?>MT,  <?php echo $truck_type['dimension'] ; ?></td>
													<td> <?php echo $fetch['price'] ; ?></td>
                                                   <td>
                                                    <a href="estimate_edit.php?edit_id=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="estimates.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
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

