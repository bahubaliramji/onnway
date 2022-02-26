<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'Booking';
$innersidepage = 'bookloadenq';
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
    $select = mysqli_query($dbhandle, "select * from tbl_post_load_enq where id='".$editid."'");
	$data = mysqli_fetch_array($select);		$user = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$data['user_id']."'"));		$roww = mysqli_query($dbhandle, "select * from vehicle_list where id = '".$data['vihicle_type']."'");	$fetchh = mysqli_fetch_array($roww) ;	 	//$vihicle_type = $data['vihicle_type'] ;
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Book Post a Load</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Post a Load Enquiry</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											
										
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Source  :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $data['sourse'];?>
										 </div>								  
									  </div>									  									  									    <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Destination  :</label>										 </div>										 <div class="col-sm-7">										   <?php echo $data['destination'];?>										 </div>								  									  </div>									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Vehicle Type  :</label>										 </div>										 										 <div class="col-sm-7">										   <?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?>										 </div>								  									  </div>									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Material Type  :</label>										 </div>										 <div class="col-sm-7"> 										   <?php echo $data['material_type']; ?>										 </div>								  									  </div>									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Weight  :</label>										 </div>										 <div class="col-sm-7">										   <?php echo $data['weight'];?>										 </div>								  									  </div>									  									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Qty  :</label>										 </div>										 <div class="col-sm-7">										   <?php echo $data['qty'];?>										 </div>								  									  </div>									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Schedule Date  :</label>										 </div>										 <div class="col-sm-7">										   <?php echo $data['schedule_date'];?>										 </div>								  									  </div>									  									   <div class="row col-sm-5">									     <div class="col-sm-5">										    <label>Enquiry Date  :</label>										 </div>										 <div class="col-sm-7">										   <?php echo $data['enq_date'];?>										 </div>								  									  </div>									  
									  
									   
									  
									  
									  
									   
                                      

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


