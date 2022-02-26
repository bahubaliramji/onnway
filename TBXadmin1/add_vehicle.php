<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle1';
$innersidepage = 'vehicle';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>ADD Vechile</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>

<?php
   
	if(isset($_POST['submit'])){
        //$fname = $_POST['fname'];
		
   
    
        $vehicle_reg_no = $_POST["vehicle_reg_no"];
        $vehicle_type = $_POST["vehicle_type"];
        $sub_type = $_POST["sub_type"];
        $length = $_POST["length"];
        $dimension = $_POST["dimension"];
        $price_km = $_POST["price_km"];
       
		$status= 1 ;
		
		$path = "../upload/vechile_image/";
     
	$emp_img =$_FILES['pimage']['name'];
	$tmp_path = $_FILES['pimage']['tmp_name'];
	
	move_uploaded_file($tmp_path,$path.$emp_img);

$query = mysqli_query($dbhandle, "Insert INTO vehicle_list(vehicle_reg_no, vehicle_type, sub_type, length, dimension, price_km,pimage, status)VALUE('".$vehicle_reg_no."','".$vehicle_type."','".$sub_type."','".$length."','".$dimension."','".$price_km."','".$emp_img."','".$status."')");

		  $sms="<p style='success-msg'>Vehicle Added Successfully.</p>";
        header("refresh:2;url=vehicle_list.php");   
	


		
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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Add Vehicle</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="vehicle_list.php">Vehicle list</a></li>
							<li class="active" style="color:#f0193f">Add Vehicle</li>
						 </ol>
						
						  <?php 
					  echo $sms;
				   ?>
                      </div>
										<div id="general_info">
											<form name="myForm" method="post" action="#" enctype="multipart/form-data"  >
											<br><br>
											
											  <div class="row">
									     <div class="col-sm-5">
										    <label style="font-size: 157%;"><u>Add Vehicle :</u></label>
										 </div>
										 							  
									  </div>
									  <!--  <div class="row">
									     <div class="col-sm-3">
										    <label>Vehicle Registration No<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" placeholder="012314" name="vehicle_reg_no" id="vehicle_reg_no" class="form-control" value="">
										  <span style="color:red"> <?php /* echo $nameError; */?></span> 
										 </div>								  
									  </div>-->
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Vehicle Type :</label>
										 </div>
										 
									   <div class="col-sm-4">
									
										 <select name="vehicle_type" id="vehicle_type" class="form-control">
										 <option value="1">Full Body Truck</option>
										 <option value="2">Trailer</option>
										 <option value="3">CONTAINER</option>
										 
										 </select>
										 
										 <span style="color:red"> <?php echo $category_error;?></span>
										 </div>	
										 
										  </div>
										 <div class="row" id="Vehcile_sub_type" style="display:none;">
									     <div class="col-sm-3">
										    <label>Sub Vehicle Type :</label>
										 </div>
										 
									   <div class="col-sm-4">
									
										 <select name="sub_type" id="sub_type" class="form-control">
										 <option value="">Select Sub Trailor</option>
										 <option value="1">Flat Bed Trailer</option>
										 <option value="2">Semi Bed Trailer</option>
										 
										 </select>
										 
										 <span style="color:red"> <?php echo $category_error;?></span>
										 </div>	
										 
										  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Weight<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input placeholder="Enter Weight Only Numeric EG. 15.50" type="text" name="length" id="length" class="form-control" value="">
										  
										 </div>								  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Dimension<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" placeholder="9 MT, 18’X7’X7’, 6 WHEEL
TRUCK" name="dimension" id="dimension" class="form-control" value="">
										  
										 </div>								  
									  </div>
									  
								
									  

									   <div class="row">
									     <div class="col-sm-3">
										    <label>Price/Km <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="number" placeholder="12" name="price_km" id="price_km" class="form-control" value="">
										  
										 </div>								  
									  </div>
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Vechile Image<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <input type="file" name="pimage" id="pimage" >
										
										 </div>								  
									  </div>
									  
									  									  
									<div class="col-sm-6">
									<button type="submit" class="btn btn-primary" name="submit" onclick="myFunction()" id="pro1">Add Vehicle</button>
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
	
	$("#vehicle_type").change(function () {
		var value=$(this).val();
		if(value==='2'){
			$("#Vehcile_sub_type").show();
		}else{
			$("#Vehcile_sub_type").hide();
		}
		
	}); 
});



 </script>

<script type="text/javascript">
  
      
    /*    function validate()
      {
      
       
 onsubmit="return validate()"


       if( document.myForm.fname.value == "" )
         {
            alert( "Please provide your first name!" );
            document.myForm.fname.focus() ;
            return false;
         }

          if( document.myForm.lname.value == "" )
         {
            alert( "Please provide your last name!" );
            document.myForm.lname.focus() ;
            return false;
         }
          if( document.myForm.u_name.value == "" )
         {
            alert( "Please provide your user name!" );
            document.myForm.u_name.focus() ;
            return false;
         }


         

    var z = document.myForm.mb_no.value;
    if(isNaN(z) || z=="")
        {
        alert("Please only enter numeric characters for your Moble no! ")
         document.myForm.mb_no.focus() ;
            return false;
        }*/


        /*  if( document.myForm.mb_no.value == "" )
         {
            alert( "Please provide your Mobile no!" );
            document.myForm.mb_no.focus() ;
            return false;
         } */
       /*   var myemail= document.myForm.email.value ;
          	 atpos = myemail.indexOf("@");
         dotpos = myemail.lastIndexOf(".");
         if (atpos < 1 || ( dotpos - atpos < 2 ))
         {
            alert( "Please provide your email!" );
            document.myForm.email.focus() ;
            return false;
         }
          if( document.myForm.password.value == "" )
         {
            alert( "Please provide your Password!" );
            document.myForm.password.focus() ;
            return false;
         }
           if( document.myForm.repassword.value == "" )
         {
            alert( "Please provide your confirm Password!" );
            document.myForm.repassword.focus() ;
            return false;
         }
           if( document.myForm.company.value == "" )
         {
            alert( "Please provide your company!" );
            document.myForm.company.focus() ;
            return false;
         }
           if( document.myForm.address.value == "" )
         {
            alert( "Please provide your address !" );
            document.myForm.address.focus() ;
            return false;
         } */
        
     /*      if( document.myForm.pimage.value == "" )
         {
            alert( "Please provide your profile images !" );
            document.myForm.pimage.focus() ;
            return false;
         } 
         return( true );
      }

     */
   
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


