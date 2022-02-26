<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'order';
$innersidepage = 'order';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Book Load Details</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
	<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php
   $editid = $_GET['id'];
   $path = $base_url."../upload/vehicle_documents/";
    $select = mysqli_query($dbhandle, "select * from tbl_book_load where id='".$editid."'");
	$data = mysqli_fetch_array($select);	

		
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title"> Order Info </h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Order Info</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>SHIPPING DETAILS :</u></label>		
												</div>
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u><a href="loader_details.php?id=<?php echo $data['loader_id'];?>">Loader Details</a></u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Source   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getCity($data['source']);?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Destination    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getCity($data['destination']);?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Total Distance In Km    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['distance'];?>		
									  </div>								  									  </div>
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Actual Price in INR  :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $data['cost'];?>
										 </div>								  
									  </div>				  									  					    <div class="row col-sm-5">	
									  <div class="col-sm-5">	
									  <label>Schedule Date   :</label>		
									  </div>						
									  <div class="col-sm-7">	
									  <?php echo $data['scheduled_date'];
											?>
									  </div>
									  </div>
									  <div class="row col-sm-5">	
										<div class="col-sm-5">		
											<label>Schedule Time   :</label>	
										</div>					
										<div class="col-sm-7">	
											<?php echo $data['scheduled_time'];?>		
										</div>
									  </div>
									  <div class="row col-sm-5">	
										<div class="col-sm-5">		
											<label>Vehicle Type   :</label>	
										</div>					
										<div class="col-sm-7">	
											<?php echo getVehicleType(getFullTruckType($data['vehicle_type'])['vehicle_type'])." - ";
											 if(getFullTruckType($data['vehicle_type'])['vehicle_type']==1){ echo "Full Bed - ";}
											 if(getFullTruckType($data['vehicle_type'])['vehicle_type']==2){ echo "Semi Bed - ";}
											echo getTruckType($data['vehicle_type']);?>		
										</div>
									  </div>
									  <div class="row col-sm-5">	
										<div class="col-sm-5">		
											<label>Material Type   :</label>	
										</div>					
										<div class="col-sm-7">	
											<?php echo $data['material_type'];?>		
										</div>
									  </div>
									  <div class="row col-sm-5">	
										<div class="col-sm-5">		
											<label>Weight in Ton  :</label>	
										</div>					
										<div class="col-sm-7">	
											<?php echo $data['weight'];?>		
										</div>
									  </div>
									  <div class="row col-sm-5">	
										<div class="col-sm-5">		
											<label>Booking Date  :</label>	
										</div>					
										<div class="col-sm-7">	
											<?php echo $data['booking_date'];?>		
										</div>
									  </div>
									  <div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>LOADING ADDRESS :</u></label>		
												</div>
											</div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Pick up Street Adress   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['pickup_street'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">
									  <div class="col-sm-5">	
									  <label>Pick up City   :</label>										 </div>										 										 <div class="col-sm-7">		
									  <?php echo getCity($data['pickup_city']);?>							
									  </div>								  									  </div>
																																					<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Pick up Pincode  :</label>		
									  
									  </div>								
									  <div class="col-sm-7">			
									  <?php echo $data['pickup_pincode'];?>		
									  </div>	
									  </div>		
									  
									  <div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Drop up Street Adress :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['drop_street'];?>	
									  </div> </div>
										
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Drop up City  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo getCity($data['destination_name']);?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Drop up Pincode  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['drop_pincode'];?>	
											</div>
										</div>
										
										
										
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>ASSIGN TRUCK DETAILS :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Assign Truck  :</label>	
											</div>							
											<div class="col-sm-7">	
											<?php $getTruckReg= mysqli_fetch_array(mysqli_query($dbhandle, "select truck_id,post_truck_id from tbl_post_truck where id='".$data['assign_truck']."'"));
											?>
												<a href="truck_details.php?id=<?php echo $getTruckReg['truck_id']?>"><?php echo $getTruckReg['post_truck_id'].'('.getRegNoBytruckId($getTruckReg['truck_id']).')';?>	</a>
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Assign Driver :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['asighn_driver'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Driver Mobile No  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['driver_contact_no'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Assign Truck Message  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['message'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Truck Amount  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['amount_truck'];?>	
											</div>
										</div>
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>Payment Status & Document Status Of Loader :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Advance Payment Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['payment_status']);?>
									<?php if($data['advance_pay_file']!=""){
										echo "<a href=".$path.$data['advance_pay_file']." target='_blank'>Download</a>";
									}?>												
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Payment Message  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['payment_message'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Document Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['document_status']);?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Balance Payment Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['bal_payment_status']);?>	
											</div>
										</div>
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>Payment Status Of Truck :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Advance Payment Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['payment_status_t']);?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Balance Payment Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['bal_payment_status_t']);?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Current Status  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo getStatus($data['delivery_status']);?>	
											</div>
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


