<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'Booking';
$innersidepage = 'bookload';
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
   
	if(isset($_POST['submit'])){
			  if (empty($_POST["source"]) ) {
        $source_error = "please  enter source";
    }
    else {
        $source = $_POST["source"];
    }
		
        $destination = $_POST["destination"];
         $destinationn=implode(',',$destination);
    
     if (empty($_POST["material"])) {
        $material_error = "enter material";
    }
    else {
        $material = $_POST["material"];
    }
     
     

     if (empty($_POST["weight"])) {
        $weight_error = "enter weight";
    }
    else {
        $weight = $_POST["weight"];
    }
 
        $dimension = $_POST["dimension"];
    
       if (empty($_POST["vehicletype"])) {
        $vehicletype_error = "enter vehicle type";
    }
    else {
        $vehicletype = $_POST["vehicletype"];
    }
      if (empty($_POST["noofvehicle"])) {
        $noofvehicle_error = "enter no of vehicle";
    }
    else {
        $noofvehicle = $_POST["noofvehicle"];
    }
     if (empty($_POST["scheduleddate"])) {
        $date_error = "select date";
    }
    else {
        $scheduleddate = $_POST["scheduleddate"];
    }

		/*$source = $_POST['source'];
		$destination = $_POST['destination'];
       

		$material = $_POST['material'];
		$weight = $_POST['weight'];
		$dimension = $_POST['dimension'];
		$vehicletype = $_POST['vehicletype'];
		$noofvehicle = $_POST['noofvehicle'];
		$scheduleddate = $_POST['scheduleddate'];*/
		$status= "active";
		$post_type= "Post a Load";
	//	foreach($destination)
		$query = mysqli_query($dbhandle, "Insert INTO tbl_book_load(source,destination,material_type,weight,dimension,vehicle_type,no_vehicle
			,scheduled_date,post_type,status)VALUE('".$source."','".$destinationn."','".$material."','".$weight."','".$dimension."'
		,'".$vehicletype."','".$noofvehicle."','".$scheduleddate."','".$post_type."','".$status."')");
		/*if($query){
			$message = $obj->msg('success','Employee Added Successfully');
		}
		else{
			$message = $obj->msg('error','Please Try Again');
		} */
	}?>

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Book Post a Load</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="booking.php">Booking</a></li>
							<li class="active" style="color:#f0193f">Post a Load</li>
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
										   <input type="text" name="source" class="form-control" value="">
										   <span style="color:red"> <?php echo $source_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Destination :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select name="destination[]" class="form-control" multiple>
										  <option value="">Select</option>
										  <option value="Destination1">Destination1</option>
										  <option value="Destination2">Destination2</option>
										  <option value="Destination3">Destination3</option>
										  </select>
										  <span style="color:red"> <?php echo $destination_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Material Type<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <select name="material" class="form-control" >
										  <option value="">Select</option>
										  <option value="Type1">Type1</option>
										  <option value="Type2">Type2</option>
										  <option value="Type3">Type3</option>
										  </select>
										  <span style="color:red"> <?php echo $material_error;?></span>
										 </div>								  
									  </div>
									  
									  

									   <div class="row">
									     <div class="col-sm-3">
										    <label>Weight<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="weight" class="form-control" value="">
										   <span style="color:red"> <?php echo $weight_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Dimension :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="dimension" class="form-control" value="">
										   <span style="color:red"> <?php echo $dimension_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Vehicle Type<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select name="vehicletype" class="form-control">
										  <option value="">Select</option>
										  <option value="Type1">Type1</option>
										  <option value="Type2">Type2</option>
										  <option value="Type3">Type3</option>
										  </select>
										  <span style="color:red"> <?php echo $vehicletype_error;?></span>
										 </div>								  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>No. of Vehicle<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="noofvehicle" class="form-control" value="">
										   <span style="color:red"> <?php echo $noofvehicle_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Shedualed date<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
									  <input type="text" name="scheduleddate" id="datepicker" class="form-control" value="">
									  <span class="cal1"><i class="fa fa-calendar cal-style" aria-hidden="true"></i></span>
									  <span style="color:red"> <?php echo $date_error;?></span>
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


