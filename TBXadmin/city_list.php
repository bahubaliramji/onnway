<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'city';
$innersidepage = 'citylist';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
 <html>
<head>
  <title>City List</title>
<?php include('include/head.php'); ?>
</head>

	<body class="skin-blue sidebar-mini">

		<div class="wrapper">

		<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php if(isset($_GET['del_id'])){
	 $deleteid = $_GET['del_id'];
	
	$sql = mysqli_query($dbhandle, "DELETE FROM tbl_city WHERE id = '$deleteid'");
	
	if($sql){
 
		header("refresh:1;url=city_list.php");
	
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
	$query = mysqli_query($dbhandle, "UPDATE tbl_city SET status = '$prostatus' WHERE id = '$sid'");
	header("refresh:1;url=city_list.php");
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

										<i class="fa fa-eye" aria-hidden="true"></i><h3 class="box-title">City List</h3>

							

									<a href="add_city.php" style="float:right"><button  class="btn btn-info">+ Add City</button></a>

									</div><!-- /.box-header -->
				<div class="box-body box box-warning">		
												 <div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                           
							<li class="active" style="color:#f0193f">City List</li>
						 </ol>
                      </div>
					  
					

										<table id="example1" class="table table-bordered table-striped">

											<thead>

											<tr>
													<th>S.No</th>
													<th>City Name</th>
													<th>State Name</th>
													<th>Category</th>
													<th>Action</th>
													
											</tr>

											</thead>

											<tbody>
<?php 
	
$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name ");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){		$catname = mysqli_fetch_array(mysqli_query($dbhandle, "select * from tbl_city_category where id = '".$fetch['category_id']."'"));
	?>
											<tr>
											
													
													<td><?php echo $x;?></td>
													<td><?php echo $fetch['city_name'];?></td>
													<td><?php echo $fetch['state_name'];?></td>
                                               
												<td> <?php echo $catname['category_name'] ; ?>              </td>
                                                   <td>
                                                    <a href="city_edit.php?edit_id=<?php echo $fetch['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                                                    	<a style="margin-left: 10px;" href="city_list.php?del_id=<?php echo $fetch['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
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

