<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'Booking';
$innersidepage = 'booktruck_info';
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
<?php
	$editid = $_GET['edit_id'];
	$path = $base_url."../upload/documents/";
	$random_key = strtotime(date('Y-m-d H:i:s'));
   if(isset($_POST['submit'])){	  
		$truck_reg_no = $_POST['truck_reg_no'];
		$truck_status = $_POST['truck_status'];
		

		$update = mysqli_query($dbhandle, "UPDATE tbl_post_truck_info SET truck_reg_no = '$truck_reg_no', truck_status = '$truck_status' WHERE id = '$editid'");
		$sms = '<p class="success-msg">Details Updated Successfully</p>' ;

}


	
	$select = mysqli_query($dbhandle, "select * from tbl_post_truck_info where id='".$editid."'");
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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Post Truck Detail by Agent/Transporter</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Edit  Post Truck </a></li>
							<li class="active" style="color:#f0193f">Edit Post Truck Detail by Agent/Transporter</li>
						 </ol>
						
						  
                      </div>
		<div id="general_info">
			<form method="post" action="#" enctype="multipart/form-data">
				<br><br>
		<?php
				if (isset($sms)) {
					echo $sms;
				}			
				?> 
		<div class="row">
				 <div class="col-sm-5">
					<label style="font-size: 157%;"><u>Post Info :</u></label>
				</div>
										 							  
				</div>
				<div class="row">
				 <div class="col-sm-3">
				 <label>Truck Reg No<span style="color:red">*</span> :</label>
					</div>
										 
			 <div class="col-sm-4">
				 <input type="text" name="truck_reg_no" class="form-control" value="<?php echo $data['truck_reg_no'];?>">
				</div>								  
			 </div>
									  
			  <div class="row">
				 <div class="col-sm-3">
				 <label>Source   :</label>
			</div>
										 
				<div class="col-sm-4">
					<?php echo getCity($data['source'])?>
				</div>								  
			</div>
				 <div class="row">
				 <div class="col-sm-3">
					<label>Destination<span style="color:red">*</span> :</label>
				</div>
			 <div class="col-sm-4">
				 <?php 
				  
					  
					  $destination = explode(',',$data['destination']);
						$cm = '';
						foreach($destination as $id =>$value){
							echo $cm.getCity($value);
							$cm = ',';
						}
				 
							?>
		</div>								  
			 </div>
									  
				 <div class="row">
				<div class="col-sm-3">
					 <label>Truck Type<span style="color:red">*</span> :</label>
			 </div>
				<div class="col-sm-4">
					 <?php echo getTruckType($data['truck_type']);?>
					</div>								  
				 </div>
					<div class="row">
				 <div class="col-sm-3">
				 <label>Weight   :</label>
			</div>
										 
				<div class="col-sm-4">
					<?php echo $data['weight'];?>
				</div>								  
			</div>	
			<div class="row">
				 <div class="col-sm-3">
				 <label>Scheduled Date   :</label>
			</div>
										 
				<div class="col-sm-4">
					<?php echo $data['schedule_date'];?>
				</div>								  
			</div>			
				<div class="row">
				 <div class="col-sm-3">
				 <label>Truck Status<span style="color:red">*</span> :</label>
					</div>
										 
			 <div class="col-sm-4">
				 <select name="truck_status" id="" class="form-control">
				 	<option value="1" <?php echo ($data['truck_status']==1)?'selected':'';?>>Pending</option>
				 	<option value="2" <?php echo ($data['truck_status']==2)?'selected':'';?>>Processing</option>
				 	<option value="3" <?php echo ($data['truck_status']==3)?'selected':'';?>>Confirm</option>
				 	<option value="4" <?php echo ($data['truck_status']==4)?'selected':'';?>>Booked</option>
				 	<option value="6" <?php echo ($data['truck_status']==6)?'selected':'';?>>Ready To Move</option>
				 	<option value="7" <?php echo ($data['truck_status']==7)?'selected':'';?>>On the Way</option>
				 	<option value="8" <?php echo ($data['truck_status']==8)?'selected':'';?>>Delivered</option>
				 	<option value="9" <?php echo ($data['truck_status']==9)?'selected':'';?>>Cancelled</option>
				 </select>
				</div>								  
			 </div>					  
								

						 <div class="col-sm-6">
										<button type="submit" class="btn btn-primary" id="pro1" name="submit" >Update</button>
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


<script>
										 $(document).ready(function(){
											$("#selec-1").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
	
	
	
}); 
										 });
										 </script>



   		
			  
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


