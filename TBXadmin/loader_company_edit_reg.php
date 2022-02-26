<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'loader';
$innersidepage = 'loadercompany';
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
   $editid = $_GET['edit_id'];
$path = $base_url."../upload/documents/";
$random_key = strtotime(date('Y-m-d H:i:s'));
   if(isset($_POST['submit'])){	  
		$name = $_POST['name'];
		$mb_no = $_POST['mb_no'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$pincode = $_POST["pincode"];
		$designation = $_POST["designation"];
		$landline_no = $_POST["landline_no"];
		$alt_contact_person = $_POST["alt_contact_person"];
		$alt_mb_no = $_POST["alt_mb_no"];
		$company_name = $_POST['company_name'];
        $gst_no = $_POST['gst_no'];
        $pan_card_no = $_POST['pan_card_no'];
        $company_website = $_POST['company_website'];
		
       // $company_type = $_POST['company_type'];
		if(!empty($_FILES['gst_file']['name'])){
			$gst_file =$_FILES['gst_file']['name'];
			$gst_file = rand().$random_key.'-'.$gst_file;
			$gst_file_tmp = $_FILES['gst_file']['tmp_name'];
			move_uploaded_file($gst_file_tmp,$path.$gst_file);
			$gst_file = ", gst_file = '$gst_file'";
		}else{
			$gst_file = "";
		}
		if(!empty($_FILES['pan_file']['name'])){
			$pan_file =$_FILES['pan_file']['name'];
			$pan_file = rand().$random_key.'-'.$pan_file;
			$pan_file_tmp = $_FILES['pan_file']['tmp_name'];
			move_uploaded_file($pan_file_tmp,$path.$pan_file);
			$pan_file = ", pan_file = '$pan_file'";
		}else{
			$pan_file = "";
		}  
		
		$update = mysqli_query($dbhandle, "UPDATE tbl_loader SET name = '$name', mb_no = '$mb_no', email = '$email', password = '$password'	, city = '$city',address='$address', pincode = '$pincode', designation = '$designation', landline_no = '$landline_no', alt_contact_person = '$alt_contact_person',alt_mb_no='$alt_mb_no', company_name = '$company_name',	 gst_no = '$gst_no', pan_card_no = '$pan_card_no', company_website = '$company_website' $gst_file $pan_file WHERE id = '$editid'");
		$sms = '<p class="success-msg">Details Updated Successfully</p>' ;

}


	
	$select = mysqli_query($dbhandle, "select * from tbl_loader where id='".$editid."'");
	$data = mysqli_fetch_array($select);	
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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Company Loader Register</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Loader Register</a></li>
							<li class="active" style="color:#f0193f">Company Loader Register</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>											<?php												if (isset($sms)) {													echo $sms;												}											?> 
											
											  <div class="row">
									     <div class="col-sm-5">
										    <label style="font-size: 157%;"><u>CONTACT PERSON INFORMATION :</u></label>
										 </div>
										 							  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Mobile Number  :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="mb_no" class="form-control" value="<?php echo $data['mb_no'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Email<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>">
										 </div>								  
									  </div>
									  <!-- 
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Password<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="password" name="password" class="form-control" value="<?php echo $data['password'];?>">
										 </div>								  
									  </div> -->
									  
									  
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
										 <textarea name="address" class="form-control"><?php echo $data['address'];?></textarea>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>City<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select class="form-control" id="city"  name="city">											<option value="">Select City</option>											<?php   												$row = mysqli_query($dbhandle, "select * from tbl_city");													   while($fetch = mysqli_fetch_array($row)){	 ?>													<option  value="<?php echo $fetch['id'];?>" <?php echo ($fetch['id']==$data['city']) ? "selected":'';?>><?php echo $fetch['city_name'];?></option>											<?php } ?>										</select>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Pincode<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pincode" class="form-control" value="<?php echo $data['pincode'];?>">
										 </div>								  
									  </div>									  <div class="row">									     <div class="col-sm-3">										    <label>Designation <span style="color:red">*</span> :</label>										 </div>										 										 <div class="col-sm-4">										
									  <select name="designation" id="designation" <?php echo ($data['designation']!='')?'readonly':''; ?> class="form-control">
			<option value="">Select Designation</option>
			<option value="Manager" <?php echo ($data['designation']=='Manager')?'selected':''; ?> >Manager</option>
			<option value="Owner"  <?php echo ($data['designation']=='Owner')?'selected':''; ?>>Owner</option>
			<option value="Partner"  <?php echo ($data['designation']=='Partner')?'selected':''; ?>>Partner</option>
			<option value="Other"  <?php echo ($data['designation']=='Other')?'selected':''; ?>>Other</option>
		</select>
									  </div>								  									  </div>									  <div class="row">									     <div class="col-sm-3">										    <label>Landline No.(with STD code)* <span style="color:red">*</span> :</label>										 </div>										 										 <div class="col-sm-4">										   <input type="text" name="landline_no" class="form-control" value="<?php echo $data['landline_no'];?>">										 </div>								  									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Alternet Contact Information :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="alt_contact_person" class="form-control" value="<?php echo $data['alt_contact_person'];?>">
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Alternet Mobile Number :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="alt_mb_no" class="form-control" value="<?php echo $data['alt_mb_no'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>COMPANY INFORMATION :</u></label>
										 </div>
										 </div>
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Company Name <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>">
										 </div>								  
									  </div>
									  
									   
									   <div class="row">
									     <div class="col-sm-3">
										    <label>GST Number <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="gst_no" class="form-control" value="<?php echo $data['gst_no'];?>">
										 </div>	
										 <div class="col-sm-4"> 
										 <?php if($data['gst_file']!=""){?>
			<a href="<?php echo  $path.$data['gst_file'];?>" target="_blank">Download GST File</a>
			<?php }?>

            <input type="file" name="gst_file" id="gst_file" class="inputfile7 inputfile-5" >
			
										 </div>
										 
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Pan Card No. <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pan_card_no" class="form-control" value="<?php echo $data['pan_card_no'];?>">
										 </div>	
										<div class="col-sm-4"> 
										 <?php if($data['pan_file']!=""){?>
			<a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a>
			<?php }?>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>
									  
									   <div class="row">									     <div class="col-sm-3">										    <label>Company Website  :</label>										 </div>										 										 <div class="col-sm-4">										   <input type="text" name="company_website" class="form-control" value="<?php echo $data['company_website'];?>">										 </div>								  									  </div>
                                      

						 <div class="col-sm-6">
										<button type="submit" class="btn btn-primary" id="pro1" name="submit" >Update</button>
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


