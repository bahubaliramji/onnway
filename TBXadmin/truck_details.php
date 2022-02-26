<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehiclealltruck';
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
    $select = mysqli_query($dbhandle, "select * from tbl_trucks where id='".$editid."'");
	$data = mysqli_fetch_array($select);	
	$owner_result = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_vehicle_owner WHERE vehicle_owner_id = '".$data['vehicle_owner_id']."'"));
	
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title"> Vehicle Truck Info </h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Vehicle Truck Info</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>TRUCK INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Truck Type    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getTruckType($data['truck_type']);?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Load Passing    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['load_passing'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Truck Permit No     :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['truck_permit_no'];?> 
									  <?php if($data['truck_permit_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['truck_permit_file'];?>" target="_blank">Download</a>	<?php }?>	
									  </div>								  									  </div>
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Truck Reg. No.   :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $data['truck_reg_no'];?>
										   <?php if($data['truck_reg_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['truck_reg_file'];?>" target="_blank">Download</a>	<?php }?>
										 </div>								  
									  </div>				  									  					    <div class="row col-sm-5">	
									  <div class="col-sm-5">	
									  <label>Truck validity & Insurance   :</label>		
									  </div>						
									  <div class="col-sm-7">	
									  <?php echo $data['truck_validity'];
											?>
											<?php if($data['insurance_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['insurance_file'];?>" target="_blank">Download</a>	<?php }?>
									  </div>
									  </div>
									  
									  <div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>DRIVER  INFORMATION :</u></label>		
												</div>
											</div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Driver Name   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['driver_name'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">
									  <div class="col-sm-5">	
									  <label>Driver Mobile No   :</label>										 </div>										 										 <div class="col-sm-7">		
									  <?php echo $data['mobile_no'];?>							
									  </div>								  									  </div>
																																					<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Driving Lic. No.  :</label>		
									  
									  </div>								
									  <div class="col-sm-7">			
									  <?php echo $data['dl'];?>	
										<?php if($data['dl_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['dl_file'];?>" target="_blank">Download</a>	<?php }?>									  
									  </div>	
									  </div>		
									  
									  <div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Aadhar No.   :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['aadhar_no'];?>
										<?php if($data['aadhar_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['aadhar_file'];?>" target="_blank">Download</a>	<?php }?>
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Fitness Certificate    :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['fitness_cert_no'];?>	
									  <?php if($data['fitness_cert_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['fitness_cert_file'];?>" target="_blank">Download</a>	<?php }?>
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Authorised driver certificate  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['auth_driver_cert_no'];?>
									<?php if($data['auth_driver_cert_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['auth_driver_cert_file'];?>" target="_blank">Download</a>	<?php }?>									  
									  </div>								  									  </div>
									  
									  <div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>OWNER INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>First Name   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $owner_result['name'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Last Name    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $owner_result['last_name'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Mobile Number    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $owner_result['mb_no'];?>		
									  </div>								  									  </div>
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Email  :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $owner_result['email'];?>
										 </div>								  
									  </div>				  									  					    <div class="row col-sm-5">	
									  <div class="col-sm-5">	
									  <label>Aadhar   :</label>		
									  </div>						
									  <div class="col-sm-7">	
									  <?php echo $owner_result['aadhar_no'];
											?>
									  </div>
									  </div>
									  
									  <div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>OWNER CONTACT INFORMATION :</u></label>		
												</div>
											</div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Address   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $owner_result['address'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">
									  <div class="col-sm-5">	
									  <label>City   :</label>										 </div>										 										 <div class="col-sm-7">		
									  <?php echo $owner_result['city'];?>							
									  </div>								  									  </div>
																																					<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Pin Code  :</label>		
									  
									  </div>								
									  <div class="col-sm-7">			
									  <?php echo $owner_result['pincode'];?>		
									  </div>	
									  </div>		
									  
									  <div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Alt Contact Name   :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $owner_result['alt_contact_person'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Alt Mobile Number   :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $owner_result['alt_mb_no'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Designation  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $owner_result['designation'];?>	
									  </div>								  									  </div>
										
										
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>OWNER BANK  INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Bank Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['bank_name'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Branch Address  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['branch_address'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>IFSC Code  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['ifsc_code'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Beneficiery Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['benificiary_name'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Account no  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['acc_no'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label> &nbsp;</label>	
											</div>							
											<div class="col-sm-7">	
												&nbsp;	
											</div>
										</div>
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>OWNER COMPANY  INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Company Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['company_name'];?>	
											</div>
										</div>
										<?php if($owner_result['pan_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>PAN File   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$owner_result['pan_file'];?>" target="_blank">Download File</a>	
											</div>
										</div>
										<?php }?>
										<?php if($owner_result['tin_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>S.T./GSTN FILE   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$owner_result['tin_file'];?>" target="_blank">Download File</a>	
											</div>
										</div>
										<?php }?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>TDS Declaration form   :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['tds_dclaration'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Tan/Cin No.  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $owner_result['tan_no'];?>	
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


