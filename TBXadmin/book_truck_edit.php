<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'Booking';
$innersidepage = 'booktruck';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Technobrix | Book</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php
   $editid = $_GET['edit_id'];
	if(isset($_POST['submit'])){
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$truck_register_number = $_POST['truck_register_number'];
		$trucktype = $_POST['trucktype'];
		$weight = $_POST['weight'];
		
		$status= "active";
		$path = "upload/book_truck_image/";
     
	$permit =$_FILES['permit']['name'];
	$tmp_path = $_FILES['permit']['tmp_name'];
	
	move_uploaded_file($tmp_path,$path.$permit);
		
		if($permit==""){
	$update = mysqli_query($dbhandle, "UPDATE tbl_book_truck SET source = '$source', destination = '$destination', truck_reg_no = '$truck_register_number',
	 truck_type = '$trucktype', weight = '$weight'
	 WHERE book_truck_id = '$editid'");	
}	else{$update = mysqli_query($dbhandle, "UPDATE tbl_book_truck SET source = '$source', destination = '$destination', truck_reg_no = '$truck_register_number',
	 truck_type = '$trucktype', weight = '$weight'
	, permit = '$permit' WHERE book_truck_id = '$editid'");	}
	}
$select = mysqli_query($dbhandle, "select * from tbl_book_truck where book_truck_id='".$editid."'");
	$data = mysqli_fetch_array($select);
	?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

			<!-- Content Wrapper. Contains page content -->

			<div class="content-wrapper">

				<!-- Content Header (Page header) -->

             
				<!-- Main content -->

				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Book Post a Truck</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="booking.php">Booking</a></li>
							<li class="active" style="color:#f0193f">Post a Truck</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											
										
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Source<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="source" class="form-control" value="<?php echo $data['source'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Destination :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select name="destination" class="form-control" multiple>
										  <option value="">Select</option>
										  <option value="Destination1">Destination1</option>
										  <option value="Destination2">Destination2</option>
										  <option value="Destination3">Destination3</option>
										  </select>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Register Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="text" name="truck_register_number" class="form-control" value="<?php echo $data['truck_reg_no'];?>">
										 </div>								  
									  </div>
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Type<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select name="trucktype" class="form-control">
		<option value="Type1"<?php if ($data['truck_type'] == Type1) { echo ' selected="selected"'; }  ?>>Type1</option>
										
		<option value="Type2"<?php if ($data['truck_type'] == Type2) { echo ' selected="selected"'; }  ?>>Type2</option>
		<option value="Type3"<?php if ($data['truck_type'] == Type3) { echo ' selected="selected"'; }  ?>>Type3</option>	
										  </select>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Weight<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="weight" class="form-control" value="<?php echo $data['weight'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Permit :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="permit" class="form-control" value="">
										 </div>								  
									  </div>
									  
									 

						 <div class="col-sm-6">
										<button type="submit" class="btn btn-primary" name="submit" id="pro1">Register</button>
											</div>
             			                    </div>






              <!--end student photo -->





									 </div>


								



										 
										</div>
									  </div>
									  
									  
									  
										</div><!--end of general info-->	

									</div>

								</div>

							

						</div>

					</div>

				</section>

			</div>
            <?php include("web_files/footer.php");?>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			<!-- Bootstrap 3.3.2 JS -->
			<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- AdminLTE App -->
			<script src="dist/js/app.min.js"></script>
			<script src="dist/js/demo.js"></script>





   		
			  
<style>
button#pro1 {
    margin-left: 178px;
}
.col-sm-1.cmstyle p {
    margin-left: -18px;
    margin-top: 7px;
}
.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
.form-group {
    margin-bottom: 0px; 
}
.star{
	color: red;
}
.breadcrumb>li+li:before{
	    content: ">";
}
.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
div#general_info .row {
    margin: 10px 0 10px 0;
}
.checkbox-inline{
	font-weight: 700;
}
.more-stop-style{
margin-left: 178px;
}
.button-route{
margin-top: 10px;
}
.form-control[readonly]{
	background-color:#fff !important;
}
#res1{
	margin-left: 10px;
}
.area-drop .from-control {
    width: 100%;
    height: 34px;
    border-radius: 4px;
    outline: none;
    border: none;
    border: 1px solid #d2d6de;
    padding-left: 18px;
}
#general_info{
	margin-top: -38px ;
}
span.cal1 {
    position: absolute;
    right: 15px;
    top: 0px;
    border: 1px solid #d2ded6;
    width: 38px;
    height: 34px;
    text-align: center;
    border-radius: 0 4px 4px 0;
    line-height: 34px;
}


button#s1 {
    width: 110px;
    margin-left: -14px;
}
.radiostyle {
    margin-left: 177px;
}

</style>
<script>
  $( function() {
				 $("#datepicker").datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              } );
</script>


