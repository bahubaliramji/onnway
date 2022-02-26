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
  <title>Technobrix | Vehicle</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php
   
	if(isset($_POST['submit'])){

		if (empty($_POST["name"]) || !preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
        $nameError = "please  enter name only in letter";
    }
    else {
        $name = $_POST["name"];
    }
	 if (empty($_POST["city"])) {
        $city_error = "enter city";
    }
    else {
        $city = $_POST["city"];
    }	
    
     if (empty($_POST["phone"]) || !preg_match('/^[0-9]*$/', $_POST["phone"])) {
        $mb_error = "enter mobile number in format";
    }
    else {
        $mb_no = $_POST["phone"];
    }
      if (empty($_POST["address"])) {
        $address_error = "enter address";
    }
    else {
        $address = $_POST["address"];
    }
     if (empty($_POST["email"]) || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"])) {
        $email_error = "enter email in right format";
    }
    else {
        $email = $_POST["email"];
    }

     if (empty($_POST["password"])) {
        $password_error = "enter password";
    }
    else {
        $password = $_POST["password"];
    }
     if (empty($_POST["no_truck"])) {
        $notruck_error = "enter no. of truck";
    }
    else {
        $no_truck = $_POST["no_truck"];
    }
     if (empty($_POST["driver_name"])) {
        $driver_error = "enter driver name";
    }
    else {
        $driver_name = $_POST["driver_name"];
    }
    
    if (empty($_POST["driver_phone"])) {
        $driverphone_error = "enter driver phone";
    }
    else {
        $driver_phone = $_POST["driver_phone"];
    }
      if (empty($_POST["truck_type"])) {
        $trucktype_error = "select Truck Type";
    }
    else {
        $truck_type = $_POST["truck_type"];
    }
     if (empty($_POST["load_passing"])) {
        $load_error = "enter Load";
    }
    else {
        $load_passing = $_POST["load_passing"];
    }
     if (empty($_POST["operate_route"])) {
        $operate_error = "enter route ";
    }
    else {
        $operate_route = $_POST["operate_route"];
    }
     
	/*	$name = $_POST['name'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$no_truck = $_POST['no_truck'];
			$driver_name = $_POST['driver_name'];
		$driver_phone = $_POST['driver_phone'];
		$truck_type = $_POST['truck_type'];
   $load_passing = $_POST['load_passing'];
   	$operate_route = $_POST['operate_route']; */

$path = "upload/vehicle_owner_image/";
$pancard_file =$_FILES['pancard_file']['name'];
$tmp_path = $_FILES['pancard_file']['tmp_name'];



$aadharcard_kyc =$_FILES['aadharcard_kyc']['name'];
$tmp_path = $_FILES['aadharcard_kyc']['tmp_name'];


		
		
		
		
     	$tds_file =$_FILES['tds_file']['name'];
	$tmp_path = $_FILES['tds_file']['tmp_name'];
	


     	$truck_registration =$_FILES['truck_registration']['name'];
	$tmp_path = $_FILES['truck_registration']['tmp_name'];
	

	
	


$driver_license =$_FILES['driver_license']['name'];
	$tmp_path = $_FILES['driver_license']['tmp_name'];
	

		$aadhar_voterfile =$_FILES['aadhar_voterfile']['name'];
	$tmp_path = $_FILES['aadhar_voterfile']['tmp_name'];
	

   
   $fitness_certificate =$_FILES['fitness_certificate']['name'];
	$tmp_path = $_FILES['fitness_certificate']['tmp_name'];
	



	$truck_permit =$_FILES['truck_permit']['name'];
	$tmp_path = $_FILES['truck_permit']['tmp_name'];
	

	$driver_certificate =$_FILES['driver_certificate']['name'];
	$tmp_path = $_FILES['driver_certificate']['tmp_name'];
	

	$truck_insurance =$_FILES['truck_insurance']['name'];
	$tmp_path = $_FILES['truck_insurance']['tmp_name'];
	

		$status= "active";
		
 
		move_uploaded_file($tmp_path,$path.$pancard_file);
		move_uploaded_file($tmp_path,$path.$aadharcard_kyc);
		move_uploaded_file($tmp_path,$path.$tds_file);
		move_uploaded_file($tmp_path,$path.$tds_file);
		move_uploaded_file($tmp_path,$path.$truck_registration);
		move_uploaded_file($tmp_path,$path.$driver_license);
		move_uploaded_file($tmp_path,$path.$aadhar_voterfile);
		move_uploaded_file($tmp_path,$path.$fitness_certificate);
		move_uploaded_file($tmp_path,$path.$truck_permit);
		move_uploaded_file($tmp_path,$path.$driver_certificate);
		move_uploaded_file($tmp_path,$path.$truck_insurance);
		$query = mysqli_query($dbhandle, "Insert INTO tbl_vehicle_owner(name,city,mb_no,address,pan_card,aadhar_card,email,password,no_trucks,
			d_form,t_r_no,driver_name,d_mb_no,d_license_no,aadhar_voter_id,truck_type,load_passing,f_certificate,route,truck_permit
			,driver_certificate
			,truck_insurance,status)
			VALUE('".$name."','".$city."','".$phone."','".$address."','".$pancard_file."'
		,'".$aadharcard_kyc."','".$email."','".$password."','".$no_truck."','".$tds_file."','".$truck_registration."','".$driver_name."'
		,'".$driver_phone."','".$driver_license."'
		,'".$aadhar_voterfile."','".$truck_type."','".$load_passing."','".$fitness_certificate."','".$operate_route."','".$truck_permit."'
		,'".$driver_certificate."','".$truck_insurance."','".$status."')");
		
$sms="<p style='text-align:center;color:green;'>Employee Added Successfully.</p>";
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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Vehicle Owner Register</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                     <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="vehicle_register.php">Vehicle Register</a></li>
							<li class="active" style="color:#f0193f">Vehicle Owner Register</li>
						 </ol>
						 <?php 
					  echo $sms;
				   ?>		
						
						  
                      </div>
										<div id="general_info">
											<form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return validate()">
											<br><br>
										
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="name" class="form-control" value="">
										   <span style="color:red"> <?php echo $nameError;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner City :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="city" class="form-control" value="">
										   <span style="color:red"> <?php echo $city_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner Mobile Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="phone" class="form-control" value="">
										   <span style="color:red"> <?php echo $mb_error;?></span>
										 </div>								  
									  </div>
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner Address<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <textarea name="address" class="form-control"></textarea>
										 <span style="color:red"> <?php echo $address_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner Pan Card<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="file" name="pancard_file" class="form-control" value="">
										 </div>								  
									  </div>
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner Aadhar Card for KYC<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="file" name="aadharcard_kyc" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Email Id & Alternet Contact number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="email" class="form-control" value="">
										   <span style="color:red"> <?php echo $email_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Password<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="password" name="password" class="form-control" value="">
										   <span style="color:red"> <?php echo $password_error;?></span>
										 </div>								  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Owner - Number of Trucks<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="no_truck" class="form-control" value="">
										   <span style="color:red"> <?php echo $notruck_error;?></span>
										 </div>								  
									  </div>
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>TDS Declaration Form<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="file" name="tds_file" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>+ADD TRUCK & DRIVER INFORMATION :</u></label>
										 </div>
										 
										 						  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Registration Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 	 <input type="file" name="truck_registration" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Driver Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="driver_name" class="form-control" value="">
										   <span style="color:red"> <?php echo $driver_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Driver Mobile Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="driver_phone" class="form-control" value="">
										   <span style="color:red"> <?php echo $driverphone_error;?></span>
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Driver License Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="driver_license" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Aadhar Number / Voter Id For KYC :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="aadhar_voterfile" class="form-control" value="">
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Select Truck Type :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <select name="truck_type" class="form-control">
										   <option value="">Select</option>
										   <option value="Truck1">Truck1</option>
										   <option value="Truck2">Truck2</option>
										   </select>
										   <span style="color:red"> <?php echo $trucktype_error;?></span>
										 </div>								  
									  </div>
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Load Passing (in Tonn) :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="load_passing" class="form-control" value="">
										   <span style="color:red"> <?php echo $load_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Fitness Certificate :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="fitness_certificate" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Normally You Operate on which Route :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="operate_route" class="form-control" value="">
										   <span style="color:red"> <?php echo $operate_error;?></span>
										 </div>								  
									  </div>
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Permit :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="truck_permit" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Authorised Driver Certificate by Owner :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="driver_certificate" class="form-control" value="">
										 </div>								  
									  </div>
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Insurance & Validity :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="truck_insurance" class="form-control" value="">
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


<script>
										 $(document).ready(function(){
											$("#selec-1").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
	
	
	
}); 
										 });
										 </script>

<script type="text/javascript">
  
      
      function validate()
      {
      	    if( document.myForm.pancard_file.value == "" )
         {
            alert( "Please upload pan card file !" );
            document.myForm.pancard_file.focus() ;
            return false;
         } 
         

            if( document.myForm.aadharcard_kyc.value == "" )
         {
            alert( "Please upload your aadhar card !" );
            document.myForm.aadharcard_kyc.focus() ;
            return false;
         } 
        

            if( document.myForm.tds_file.value == "" )
         {
            alert( "Please upload your TDS !" );
            document.myForm.tds_file.focus() ;
            return false;
         } 

            if( document.myForm.truck_registration.value == "" )
         {
            alert( "Please upload your truck Registration no !" );
            document.myForm.truck_registration.focus() ;
            return false;
         } 

            if( document.myForm.driver_license.value == "" )
         {
            alert( "Please upload your driving license !" );
            document.myForm.driver_license.focus() ;
            return false;
         } 

            if( document.myForm.aadhar_voterfile.value == "" )
         {
            alert( "Please upload your aadhar !" );
            document.myForm.aadhar_voterfile.focus() ;
            return false;
         } 

            if( document.myForm.fitness_certificate.value == "" )
         {
            alert( "Please upload your fitness certificate !" );
            document.myForm.fitness_certificate.focus() ;
            return false;
         } 
            if( document.myForm.truck_permit.value == "" )
         {
            alert( "Please upload your truck permit !" );
            document.myForm.truck_permit.focus() ;
            return false;
         }   
          if( document.myForm.driver_certificate.value == "" )
         {
            alert( "Please upload your driver  certificate !" );
            document.myForm.driver_certificate.focus() ;
            return false;
         } 
          if( document.myForm.truck_insurance.value == "" )
         {
            alert( "Please upload your insurance !" );
            document.myForm.truck_insurance.focus() ;
            return false;
         } 
         return( true );
      }

     
   
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


