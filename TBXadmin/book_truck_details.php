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
    $select = mysqli_query($dbhandle, "select * from tbl_post_truck where id='".$editid."'");
	$data = mysqli_fetch_array($select);	



	$route_result = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_book_load WHERE assign_truck = '".$data['id']."'"));


if($_POST['status_update']){
 extract($_POST);

 $upda = mysqli_query($dbhandle, "update tbl_post_truck set oder_status='$oder_status',advance_payment='$advance_payment',document_status='$document_status',current_status='$current_status',balance_status='$balance_status' where id='".$editid."' ");


if($oder_status==2){

  $selects = mysqli_query($dbhandle, "select * from  tbl_vehicle_owner where vehicle_owner_id='".$data['vehicle_owner_id']."'");
	$vehicle_owner  = mysqli_fetch_array($selects);	
 $msg  = 'You booking for truck id '.$data['post_truck_id'].' scheduled '.$data['schedule_date'].' has been confirmed.';

	notifi($vehicle_owner['regid'],$msg,'Booking is confirmed','');
}

if($upda){
echo '<script>window.location="book_truck_details.php?id='.$_GET['id'].'&msg=success"</script>';
}else{
echo '<script>window.location="book_truck_details.php?id='.$_GET['id'].'&msg=error"</script>';
}


}
	
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title"> Post Truck Detail </h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Post Truck Detail</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<div class="row col-sm-5">	
												<div class="col-sm-5">		
													<label>Vehicle Owner :</label>	
												</div>					
											  <div class="col-sm-7">	
												<a href="vehicle_owner_details.php?id=<?php echo $data['vehicle_owner_id'];?>">Click Here For Details</a>		
											  </div>
										  </div>
										<div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Post Id.   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $data['post_truck_id'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Scheduled Date    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo $route_result['scheduled_date'].'-'.$route_result['scheduled_time'];?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Truck Reg No    :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getRegNoBytruckId($data['truck_id']);?>		
									  </div>								  									  </div>
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Route  :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php 
										   if($route_result['source']!=""){
												echo getCity($route_result['source'])."-".getCity($route_result['destination']);
										   }else{
											  echo getCity($data['source'])."-";
											  $destination = explode(',',$data['destination']);
												$cm = '';
												foreach($destination as $id =>$value){
													echo $cm.getCity($value);
													$cm = ',';
												}
										  }?>
										 </div>								  
									  </div>				  									  					    <div class="row col-sm-5">	
									  <div class="col-sm-5">	
									  <label>Order Status   :</label>		
									  </div>						
									  <div class="col-sm-7">	
									  <?php echo getFullStatus($route_result['status']);
											?>
									  </div>
									  </div>
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Advance Payment Status   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getFullStatus($route_result['payment_status_t']);?>		
									  </div>								  									  </div>
									  
									  <div class="row col-sm-5">	
									  
									  <div class="col-sm-5">		
									  <label>Current Status   :</label>	
									  </div>					
									  <div class="col-sm-7">	
									  <?php echo getFullStatus($route_result['delivery_status']);?>		
									  </div>								  									  </div>
									  <div class="row col-sm-5">
									  <div class="col-sm-5">	
									  <label>Balance Payment Status   :</label>										 </div>										 										 <div class="col-sm-7">		
									  <?php echo getFullStatus($route_result['bal_payment_status_t']);?>							
									  </div>								  									  </div>
																																					<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Truck Type  :</label>		
									  
									  </div>								
									  <div class="col-sm-7">			
									  <?php echo getTruckType($data['truck_type']);?>		
									  </div>	
									  </div>		
									  
									  <div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Weight  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $data['weight'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Driver Name  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $route_result['asighn_driver'];?>	
									  </div>								  									  </div>
										<div class="row col-sm-5">	
									  <div class="col-sm-5">		
									  <label>Driver Mobile No  :</label>	
									  
									  </div>							
									  <div class="col-sm-7">	
									  <?php echo $route_result['driver_contact_no'];?>	
									  </div>								  									  </div>									  
									  
									   
									  
									  
									  
									   
                                      

             			                    </div>






              <!--end student photo -->





									 </div>


								



										 
										</div>





                   <div class="box-body" style="display: none;">
									<form name="" id="" method="post" action="" enctype="multipart/form-data">
										<div class="col-xs-6">
											<div class="form-group">
										<label>Order Status</label> 
										<select name="oder_status" class="form-control">
								<option value="0" <?php if($data['oder_status']==0 ){ echo 'selected'; } ?>> Pending</option>
                                <option value="1" <?php if($data['oder_status']==1 ){ echo 'selected'; } ?>> Processing</option>
								<option value="2" <?php if($data['oder_status']==2 ){ echo 'selected'; } ?>> Confirm</option>
                                          </select>
                                              </div>
                                          </div>



                                          <div class="col-xs-6">
											<div class="form-group">
										<label>Advance payment Status</label> 
										<select name="advance_payment" class="form-control">
								<option value="0" <?php if($data['advance_payment']==0 ){ echo 'selected'; } ?>> Pending</option>
                                <option value="1" <?php if($data['advance_payment']==1 ){ echo 'selected'; } ?>> Processing</option>
								<option value="2" <?php if($data['advance_payment']==2 ){ echo 'selected'; } ?>> Confirm</option>
                                          </select>
                                              </div>
                                          </div>

                                            <div class="col-xs-6">
											<div class="form-group">
										<label>Document Status</label> 
										<select name="document_status" class="form-control">
								<option value="0" <?php if($data['document_status']==0 ){ echo 'selected'; } ?>> Pending</option>
                                <option value="1" <?php if($data['document_status']==1 ){ echo 'selected'; } ?>> Processing</option>
								<option value="2" <?php if($data['document_status']==2 ){ echo 'selected'; } ?>> Confirm</option>
                                          </select>
                                              </div>
                                          </div>

                                            <div class="col-xs-6">
											<div class="form-group">
										<label>Balance Status</label> 
										<select name="balance_status" class="form-control">
								<option value="0" <?php if($data['balance_status']==0 ){ echo 'selected'; } ?>> Pending</option>
                                <option value="1" <?php if($data['balance_status']==1 ){ echo 'selected'; } ?>> Processing</option>
								<option value="2" <?php if($data['balance_status']==2 ){ echo 'selected'; } ?>> Confirm</option>
                                        </select>
                                              </div>
                                          </div>


    <div class="col-xs-6">
											<div class="form-group">
										<label>Current Status</label> 
										<select name="current_status" class="form-control">
								<option value="0" <?php if($data['current_status']==0 ){ echo 'selected'; } ?>> Pending</option>
                                <option value="1" <?php if($data['current_status']==1 ){ echo 'selected'; } ?>> Processing</option>
								<option value="2" <?php if($data['current_status']==2 ){ echo 'selected'; } ?>> Confirm</option>
                                        </select>
                                              </div>
                                          </div>
                                          	<div class="col-xs-12">
									<div style="margin-left:140px;">
										 
											<input type="submit" class="btn btn-success" name="status_update" id="Update" value="Update">									</div> 
								</div> 

											</form>

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


