<?php session_start();

include('include/config.php');

$type = $_SESSION['type']; 

$sidepage = 'reset-password.php';

$innersidepage = 'emplogin';

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
if(isset($_POST['change'])){
	  
	  $password = $_POST['password'];
	  $new_password = $_POST['new_password'];
	  
	  $query = mysqli_query($dbhandle, "SELECT * FROM tbl_admin where id = '" .$_SESSION['user_id']. "'");
	  $reg_data = mysqli_fetch_array($query);
	  $pwd = $reg_data['password'];
	  
	  if($pwd!= $password){
		  
		  echo '<script type="text/javascript">
			   alert(" Current Password is not CorrecPasswordt"); 
			   </script>';
	  } else{
		  if($new_password!=''){
		  $sql = "Update tbl_admin SET password = '".$new_password."' WHERE id = '".$_SESSION['user_id']."'";
		 $sqli =mysqli_query($dbhandle, $sql);
		 
		 echo '<script type="text/javascript">
			   alert("Password Successfully Changed"); 
			  </script>'; 
							 
	  }else{
		  echo '<script type="text/javascript">
			   alert("New Password Cant be Blank"); 
			   </script>';
	  }}
		}

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

										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Employee Profile Edit</h3>

										

									</div><!-- /.box-header -->



									  <div class="box-body box box-warning">

										<div>

                        <ol class="breadcrumb">

                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                            <li><a href="login_management.php">Login Management</a></li>

							<li class="active" style="color:#f0193f">Reset Password</li>

						 </ol>

						

						  

                      </div>

										<div id="general_info">

											<form method="post" action="">

											<br><br>

											

											  <div class="row">

									     <div class="col-sm-5">

										    <label style="font-size: 157%;"><u>Reset Password :</u></label>

										 </div>

										 							  

									  </div>

									   <div class="row">

									     <div class="col-sm-3">

										    <label>Current Password<span style="color:red">*</span> :</label>

										 </div>

										 

										 <div class="col-sm-4">

										   <input type="password" class="form-control" name="password" required placeholder="Enter old password">

										 </div>								  

									  </div>

									  

									   <div class="row">

									     <div class="col-sm-3">

										    <label>New Password :</label>

										 </div>

										 

										 <div class="col-sm-4">

										   <input type="password"  class="form-control" id="password" required name="new_password" placeholder="Enter new password">

										 </div>								  

									  </div>

									  

									   <div class="row">

									     <div class="col-sm-3">

										    <label>Confirm Password<span style="color:red">*</span> :</label>

										 </div>

										 

										 <div class="col-sm-4">

										   <input  class="form-control" type="password"  id="confirm_password" required name="email" placeholder="Confirm password">

										 </div>								  

									  </div>

									 


						 <div class="col-sm-6">

										<button type="submit" class="btn btn-primary"  name="change">Update</button>

											</div>

             			                    </div>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>








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





