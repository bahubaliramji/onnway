<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehicleagent';
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
		 if (empty($_POST["fname"]) || !preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
        $nameError = "please  enter name only in letter";
    }
    else {
        $fname = $_POST["fname"];
    }
	
        $lname = $_POST["lname"];
  
    
     if (empty($_POST["phone"]) || !preg_match('/^[0-9]*$/', $_POST["phone"])) {
        $mb_error = "enter mobile number in format";
    }
    else {
        $mb_no = $_POST["phone"];
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
     if (empty($_POST["repassword"])) {
        $repassword_error = "enter confirm password";
    }
    else {
        $repassword = $_POST["repassword"];
    }
    
      if (empty($_POST["address"])) {
        $address_error = "enter address";
    }
    else {
        $address = $_POST["address"];
    }
      if (empty($_POST["city"])) {
        $city_error = "enter city";
    }
    else {
        $city = $_POST["city"];
    }
      if (empty($_POST["pincode"])) {
        $pin_error = "enter pin code";
    }
    else {
        $pincode = $_POST["pincode"];
    }
  
        $altercontactinfo = $_POST["altercontactinfo"];
   
        $altermobnumber = $_POST["altermobnumber"];
   
        $landlinenumber = $_POST["landlinenumber"];
  
     if (empty($_POST["pan_number"])) {
        $pan_error = "enter pan no";
    }
    else {
        $pan_number = $_POST["pan_number"];
    }
  
        $trucktype = $_POST["trucktype"];
    
     if (empty($_POST["aadhar_number"])) {
        $aadhar_error = "enter aadhar no";
    }
    else {
        $aadhar_number = $_POST["aadhar_number"];
    }
     if (empty($_POST["company_name"])) {
        $company_error = "enter company name";
    }
    else {
        $company_name = $_POST["company_name"];
    }
     if (empty($_POST["company_type"])) {
        $companytype_error = "select company type";
    }
    else {
        $company_type = $_POST["company_type"];
    }
  
        $company_website = $_POST["company_website"];
    
		/*$fname = $_POST['fname'];
		$lname = $_POST['lname'];
	   $phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
       $address = $_POST['address'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$altercontactinfo = $_POST['altercontactinfo'];
        $altermobnumber = $_POST['altermobnumber'];
         $landlinenumber = $_POST['landlinenumber'];
          $pan_number = $_POST['pan_number'];
           $trucktype = $_POST['trucktype'];
           $aadhar_number = $_POST['aadhar_number'];
           $company_name = $_POST['company_name'];
           $company_type = $_POST['company_type'];
          $company_website = $_POST['company_website'];*/
$status= "active";

	$path = "upload/loader_company_profile/";
     $comp_img =$_FILES['pimage']['name'];
	$tmp_path = $_FILES['pimage']['tmp_name'];
	

	$path = "upload/loader_company_service/";
     $service_img =$_FILES['service_tax']['name'];
	$tmp_path = $_FILES['service_tax']['tmp_name'];
	

	$path = "upload/loader_company_pan/";
     $pan_file =$_FILES['pan_file']['name'];
	$tmp_path = $_FILES['pan_file']['tmp_name'];

	
	move_uploaded_file($tmp_path,$path.$pan_file);
	move_uploaded_file($tmp_path,$path.$comp_img);	
	move_uploaded_file($tmp_path,$path.$service_img);
		$query = mysqli_query($dbhandle, "Insert INTO tbl_agent(f_name,l_name,mb_no,email,pro_image,password,repassword,address,
			city,pincode,a_c_no,a_m_no,landline_no,pan_no,truck_type,aadhar_no,comp_name,comp_type,service_tax,pan_file,
			company_website,status)VALUE('".$fname."','".$lname."','".$phone."','".$email."','".$comp_img."'
		,'".$password."','".$repassword."','".$address."','".$city."','".$pincode."','".$altercontactinfo."','".$altermobnumber."','".$landlinenumber."',
		'".$pan_number."'
		,'".$trucktype."','".$aadhar_number."','".$company_name."','".$company_type."','".$service_img."','".$pan_file."','".$company_website."','".$status."')");
	
//$sms="<p style='text-align:center;color:green;'>Employee Added Successfully.</p>";

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Agent Vehicle Register</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="vehicle_register.php">Vehicle Register</a></li>
							<li class="active" style="color:#f0193f">Vehicle Agent</li>
						 </ol>
						
						 <?php 
					  echo $sms;
				   ?>		  
                      </div>
										<div id="general_info">
											<form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return validate()">
											<br><br>
											
											  <div class="row">
									     <div class="col-sm-5">
										    <label style="font-size: 157%;"><u>CONTACT PERSON INFORMATION :</u></label>
										 </div>
										 							  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>First Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="fname" class="form-control" value="">
										   <span style="color:red"> <?php echo $nameError;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Last Name :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="lname" class="form-control" value="">
										    <span style="color:red"> <?php echo $lnameError;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Mobile Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="phone" class="form-control" value="">
										    <span style="color:red"> <?php echo $mb_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Email Id<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="email" class="form-control" value="">
										   <span style="color:red"> <?php echo $email_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Profile Image :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="pimage" class="form-control" value="">
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
										    <label>Retype Password<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="password" name="repassword" class="form-control" value="">
										   <span style="color:red"> <?php echo $repassword_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>CONTACT INFORMATION :</u></label>
										 </div>
										 
										 						  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Address<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <textarea name="address" class="form-control"></textarea>
										  <span style="color:red"> <?php echo $addres_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>City<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="city" class="form-control" value="">
										    <span style="color:red"> <?php echo $city_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Pincode<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pincode" class="form-control" value="">
										    <span style="color:red"> <?php echo $pin_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Alternet Contact Information :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="altercontactinfo" class="form-control" value="">
										    <span style="color:red"> <?php echo $altercontact_error;?></span>
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Alternet Mobile Number :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="altermobnumber" class="form-control" value="">
										   <span style="color:red"> <?php echo $altermobile_error;?></span>
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Landline Number(With STD Code) :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="landlinenumber" class="form-control" value="">
										   <span style="color:red"> <?php echo $landlinenumber_error;?></span>
										 </div>								  
									  </div>
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>Pan Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pan_number" class="form-control" value="">
										    <span style="color:red"> <?php echo $pan_error;?></span>
										 </div>								  
									  </div>
									  
									  
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Which Type of Truck you used frequently :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="trucktype" class="form-control" value="">
										    <span style="color:red"> <?php echo $truck_error;?></span>
										 </div>								  
									  </div>
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Aadhar Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="aadhar_number" class="form-control" value="">
										    <span style="color:red"> <?php echo $aadhar_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>COMPANY INFORMATION :</u></label>
										 </div>
										 </div>
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Company Name<span style="color:red">*</span> :</label>
										     <span style="color:red"> <?php echo $company_error;?></span>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="company_name" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Select Company Type<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <select name="company_type" class="form-control">
										 <option value="">Select</option>
										 <option value="">Type1</option>
										 <option value="">Type2</option>
										 <option value="">Type3</option>
										 </select>
										 <span style="color:red"> <?php echo $companytype_error;?></span>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Service Tax / GSTN Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="service_tax" class="form-control" value="">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Pan Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="file" name="pan_file" class="form-control" value="">
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Company website :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="company_website" class="form-control" value="">
										    <span style="color:red"> <?php echo $companywebsite_error;?></span>
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
      	/*    if( document.myForm.pimage.value == "" )
         {
            alert( "Please provide your profile images !" );
            document.myForm.pimage.focus() ;
            return false;
         } 
         */

            if( document.myForm.pan_file.value == "" )
         {
            alert( "Please upload your pan file !" );
            document.myForm.pan_file.focus() ;
            return false;
         } 
        

            if( document.myForm.service_tax.value == "" )
         {
            alert( "Please upload your service tax !" );
            document.myForm.service_tax.focus() ;
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


