<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehicleagent';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
$path = $base_url."../upload/vehicle_documents/";
 $random_key = strtotime(date('Y-m-d H:i:s'));
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

   if(isset($_POST['submit'])){

		$name = $_POST['name'];
		$last_name = $_POST['last_name'];
		$mb_no = $_POST['mb_no'];
		$email = $_POST['email'];
		$transport_name = $_POST['transport_name'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$alt_contact_person = $_POST['alt_contact_person'];
		$alt_mb_no = $_POST['alt_mb_no'];
		$agent_pan_card_no = $_POST['agent_pan_card_no'];
		$agent_aadhar_card_no = $_POST['agent_aadhar_card_no'];
		$bank_name = $_POST['bank_name'];
		$branch_address = $_POST['branch_address'];
		$ifsc_code = $_POST['ifsc_code'];
		$benificiary_name = $_POST['benificiary_name'];
		$acc_no = $_POST['acc_no'];
		if(!empty($_FILES['agent_pan_card_file']['name'])){
			$agent_pan_card_file =$_FILES['agent_pan_card_file']['name'];
			$agent_pan_card_file = rand().$random_key.'-'.$agent_pan_card_file;
			$agent_pan_card_file_tmp = $_FILES['agent_pan_card_file']['tmp_name'];
			move_uploaded_file($agent_pan_card_file_tmp,$path.$agent_pan_card_file);
			$agent_pan_card_file = ", agent_pan_card_file = '$agent_pan_card_file'";
		}else{
			$agent_pan_card_file = "";
		}
		if(!empty($_FILES['agent_aadhar_card_file']['name'])){
			$agent_aadhar_card_file =$_FILES['agent_aadhar_card_file']['name'];
			$agent_aadhar_card_file = rand().$random_key.'-'.$agent_aadhar_card_file;
			$agent_aadhar_card_file_tmp = $_FILES['agent_aadhar_card_file']['tmp_name'];
			move_uploaded_file($agent_aadhar_card_file_tmp,$path.$agent_aadhar_card_file);
			$agent_aadhar_card_file = ", agent_aadhar_card_file = '$agent_aadhar_card_file'";
		}else{
			$agent_aadhar_card_file = "";
		}
		$update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET name = '$name', last_name = '$last_name', mb_no = '$mb_no', email = '$email' , transport_name = '$transport_name', password='$password', address='$address', city='$city', pincode='$pincode', alt_contact_person='$alt_contact_person', alt_mb_no='$alt_mb_no', agent_pan_card_no='$agent_pan_card_no', agent_aadhar_card_no='$agent_aadhar_card_no', bank_name='$bank_name', branch_address='$branch_address', ifsc_code='$ifsc_code', benificiary_name='$benificiary_name',acc_no='$acc_no' $agent_pan_card_file $agent_aadhar_card_file WHERE vehicle_owner_id = '".$_GET['edit_id']."'");
		$sms = '<p class="success-msg">Details Updated Successfully</p>' ;
	}



	
	$select = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id='".$editid."' and 	vehicle_owner_type='agent'");
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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Vehicle Agent Edit</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Vehicle Agent</a></li>
							<li class="active" style="color:#f0193f">Vehicle Agent Edit</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<?php
												if (isset($sms)) {
													echo $sms;
												}
											?> 
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
										   <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Last Name :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="last_name" class="form-control" value="<?php echo $data['last_name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Mobile Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="mb_no" class="form-control" value="<?php echo $data['mb_no'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Email Id<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Transport Name  :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="transport_name" class="form-control" value="<?php echo $data['transport_name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Password<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="password" class="form-control" value="<?php echo $data['password'];?>">
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
										 <textarea name="address" class="form-control"><?php echo $data['address'];?></textarea>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>City<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <select class="form-control" id="city"  name="city">
											<option value="">Select City</option>
											<?php   
												$row = mysqli_query($dbhandle, "select * from tbl_city");
													   while($fetch = mysqli_fetch_array($row)){	 ?>
													<option  value="<?php echo $fetch['id'];?>" <?php echo ($fetch['id']==$data['city']) ? "selected":'';?>><?php echo $fetch['city_name'];?></option>
											<?php } ?>
										</select>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Pincode<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pincode" class="form-control" value="<?php echo $data['pincode'];?>">
										 </div>								  
									  </div>
									  
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
									     <div class="col-sm-3">
										    <label>Pan Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="agent_pan_card_no" class="form-control" value="<?php echo $data['agent_pan_card_no'];?>">
										 </div>	
<div class="col-sm-4"> 
										 <?php if($data['agent_pan_card_file']!=""){?>
			<a href="<?php echo  $path.$data['agent_pan_card_file'];?>" target="_blank">Download Pan File</a>
			<?php }?>

            <input type="file" name="agent_pan_card_file" id="agent_pan_card_file" class="inputfile7 inputfile-5" >
			
										 </div>											 
									  </div>
									  
									  
									  
									  
									  
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Aadhar Number<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="agent_aadhar_card_no" class="form-control" value="<?php echo $data['agent_aadhar_card_no'];?>">
										 </div>	<div class="col-sm-4"> 
										 <?php if($data['agent_aadhar_card_file']!=""){?>
			<a href="<?php echo  $path.$data['agent_aadhar_card_file'];?>" target="_blank">Download Aadhar File</a>
			<?php }?>

            <input type="file" name="agent_aadhar_card_file" id="agent_aadhar_card_file" class="inputfile7 inputfile-5" >
			
										 </div>								  
									  </div>
									   
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>BANK INFORMATION :</u></label>
										 </div>
										 </div>
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Bank Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="bank_name" class="form-control" value="<?php echo $data['bank_name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Branch Address<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="text" name="branch_address" class="form-control" value="<?php echo $data['branch_address'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>IFSC Code <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="ifsc_code" class="form-control" value="<?php echo $data['ifsc_code'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Beneficiery Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="benificiary_name" class="form-control" value="<?php echo $data['benificiary_name'];?>">
										 </div>								  
									  </div>
									  
									     <div class="row">
									     <div class="col-sm-3">
										    <label>Account No. :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="acc_no" class="form-control" value="<?php echo $data['acc_no'];?>">
										 </div>								  
									  </div>
									  
                                      

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


