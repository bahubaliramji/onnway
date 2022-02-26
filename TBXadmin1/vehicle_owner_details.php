<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehicleowner';
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
    $select = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id='".$editid."'");
	$data = mysqli_fetch_array($select);	

		
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title"> Vehicle Owner Info </h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Vehicle Owner Info</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>CONTACT PERSON INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>First Name   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['name'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Last Name    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['last_name'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Mobile Number    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['mb_no'];?>		
									  </div>								  									  </div>
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Email  :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $data['email'];?>
										 </div>								  
									  </div>				  									  					    <div class="row col-sm-5">	
									  <div class="col-sm-5">	
									  <label>Aadhar   :</label>		
									  </div>						
									  <div class="col-sm-7">	
									  <?php echo $data['aadhar_no'];
											?>
									  </div>
									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Transport Name   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['transport_name'];?>		
									  </div>								  									  </div>
									  <div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>CONTACT  INFORMATION :</u></label>		
												</div>
											</div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Address   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['address'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">
									  <div class="col-sm-5">	
									  <label>City   :</label>										 </div>										 										 <div class="col-sm-7">		
									  <?php echo $data['city'];?>							
									  </div>								  									  </div>
																																					<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Pin Code  :</label>		
									  
									  </div>								
									  <div class="col-sm-7">			
									  <?php echo $data['pincode'];?>		
									  </div>	
									  </div>		
									  
									  <div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Alt Contact Name   :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['alt_contact_person'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Alt Mobile Number   :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['alt_mb_no'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Designation  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['designation'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Agent Pan No.  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['agent_pan_card_no'];?>	
											</div>
										</div>
										
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Agent Aadhar No.  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['agent_aadhar_card_no'];?>	
											</div>
										</div>
										<?php if($data['agent_pan_card_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>PAN File   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$data['agent_pan_card_file'];?>" target="_blank">Download File</a>	
											</div>
										</div>
										<?php }?>
										<?php if($data['agent_aadhar_card_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>AADHAR FILE   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$data['agent_aadhar_card_file'];?>" target="_blank">Download File</a>	
											</div>
										</div>
										<?php }?>
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>Bank  INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Bank Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['bank_name'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Branch Address  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['branch_address'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>IFSC Code  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['ifsc_code'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Beneficiery Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['benificiary_name'];?>	
											</div>
										</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Account no  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['acc_no'];?>	
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
													<label style="font-size: 157%;"><u>COMPANY  INFORMATION :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Company Name  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['company_name'];?>	
											</div>
										</div>
										<?php if($data['pan_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>PAN File   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$data['pan_file'];?>" target="_blank"><?php echo $data['pan_no'];?></a>	
											</div>
										</div>
										<?php }?>
										<?php if($data['tin_file']!=""){?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>GST FILE   :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="<?php echo $path.$data['gst_file'];?>" target="_blank"><?php echo $data['gst_no'];?></a>	
											</div>
										</div>
										<?php }?>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>TDS Declaration form   :</label>	
											</div>							
											<div class="col-sm-7">	
											<a href="<?php echo $path.$data['tds_file'];?>" target="_blank"><?php echo $data['tds_dclaration'];?></a>
											</div>
										</div>
										
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>Company Type  :</label>	
											</div>							
											<div class="col-sm-7">	
												<?php echo $data['company_type'];?>	
											</div>
										</div>
										<?php if($data['vehicle_owner_type']=='owner'){?>
										<div class="row">
												<div class="col-sm-12">	
													<label style="font-size: 157%;"><u>VIEW ALL TRUCK POSTED :</u></label>		
												</div>
											</div>
										<div class="row col-sm-5">	
											<div class="col-sm-5">		
												<label>See All Posted Truck By Him  :</label>	
											</div>							
											<div class="col-sm-7">	
												<a href="vehicle-all-truck.php?v_id=<?php echo $data['vehicle_owner_id'];?>">View All Truck Here</a>
											</div>
										</div>
										<?php }?>
										
										

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


