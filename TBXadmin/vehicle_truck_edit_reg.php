<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehiclealltruck';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
$path = $base_url."../upload/vehicle_documents/";

$upload_path_driver = "../upload/vehicle_documents/";
 


 if($_GET['action']=='verify'){
 $update = mysqli_query($dbhandle, "UPDATE tbl_trucks SET ".$_GET['param']." = '1'  WHERE id = '".$_GET['edit_id']."'");
 echo '<script>window.location="vehicle_truck_edit_reg.php?edit_id='.$_GET['edit_id'].'"</script>';
}


 if($_GET['action']=='driver_verify'){
 $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET ".$_GET['param']." = '1'  WHERE vehicle_owner_id = '".$_GET['driver']."'");
 echo '<script>window.location="vehicle_truck_edit_reg.php?edit_id='.$_GET['edit_id'].'"</script>';
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





   if(isset($_POST['submit'])){
extract($_POST);

		$truck_type = $_POST['truck_type'];
		$load_passing = $_POST['load_passing'];
		$truck_permit_no = $_POST['truck_permit_no'];
		$truck_reg_no = $_POST['truck_reg_no'];
		$truck_validity = $_POST['truck_validity'];
		$driver_name = $_POST['driver_name'];
		$mobile_no = $_POST['mobile_no'];
		$dl = $_POST['dl'];
		$aadhar_no = $_POST['aadhar_no'];
		$fitness_cert_no = $_POST['fitness_cert_no'];
		$auth_driver_cert_no = $_POST['auth_driver_cert_no'];
		if(!empty($_FILES['truck_reg_file']['name'])){
			$truck_reg_file =$_FILES['truck_reg_file']['name'];
			$truck_reg_file = rand().$random_key.'-'.$truck_reg_file;
			$truck_reg_tmp = $_FILES['truck_reg_file']['tmp_name'];
			 move_uploaded_file($truck_reg_tmp,$path.$truck_reg_file);
			 $truck_reg_file = ", truck_reg_file = '$truck_reg_file'";
		}else{
			$truck_reg_file = "";
		}
		if(!empty($_FILES['truck_permit_file']['name'])){
			$truck_permit_file =$_FILES['truck_permit_file']['name'];
			$truck_permit_file = rand().$random_key.'-'.$truck_permit_file;
			$truck_permit_tmp = $_FILES['truck_permit_file']['tmp_name'];
			 move_uploaded_file($truck_permit_tmp,$path.$truck_permit_file);
			 $truck_permit_file = ", truck_permit_file = '$truck_permit_file'";
		}else{
			$truck_permit_file = "";
		}
		
		if(!empty($_FILES['insurance_file']['name'])){
			$insurance_file =$_FILES['insurance_file']['name'];
			$insurance_file = rand().$random_key.'-'.$insurance_file;
			$insurance_tmp = $_FILES['insurance_file']['tmp_name'];
			move_uploaded_file($insurance_tmp,$path.$insurance_file);
			$insurance_file = ", insurance_file = '$insurance_file'";
		}else{
			$insurance_file = "";
		}
		
		if(!empty($_FILES['fitness_cert_file']['name'])){
			$fitness_cert_file =$_FILES['fitness_cert_file']['name'];
			$fitness_cert_file = rand().$random_key.'-'.$fitness_cert_file;
			$fitness_cert_tmp = $_FILES['fitness_cert_file']['tmp_name'];
			move_uploaded_file($fitness_cert_tmp,$path.$fitness_cert_file);
			$fitness_cert_file = ", fitness_cert_file = '$fitness_cert_file'";
		}else{
			$fitness_cert_file = "";
		}
		
		if(!empty($_FILES['auth_driver_cert_file']['name'])){
			$auth_driver_cert_file =$_FILES['auth_driver_cert_file']['name'];
			$auth_driver_cert_file = rand().$random_key.'-'.$auth_driver_cert_file;
			$auth_driver_cert_tmp = $_FILES['auth_driver_cert_file']['tmp_name'];
			move_uploaded_file($auth_driver_cert_tmp,$path.$auth_driver_cert_file);
			$auth_driver_cert_file = ", auth_driver_cert_file = '$auth_driver_cert_file'";
		}else{
			$auth_driver_cert_file = "";
		}
		
		if(!empty($_FILES['dl_file']['name'])){
			$dl_file =$_FILES['dl_file']['name'];
			$dl_file = rand().$random_key.'-'.$dl_file;
			$dl_tmp = $_FILES['dl_file']['tmp_name'];
			move_uploaded_file($dl_tmp,$path.$dl_file);
			$dl_file = ", dl_file = '$dl_file'";
		}else{
			$dl_file = "";
		}
		
		if(!empty($_FILES['aadhar_file']['name'])){
			$aadhar_file =$_FILES['aadhar_file']['name'];
			$aadhar_file = rand().$random_key.'-'.$aadhar_file;
			$aadhar_tmp = $_FILES['aadhar_file']['tmp_name'];
			move_uploaded_file($aadhar_tmp,$path.$aadhar_file);
			$aadhar_file = ", aadhar_file = '$aadhar_file'";
		}else{
			$aadhar_file = "";
		}


if(!empty($_FILES['registration_card']['name'][0])){
  $registration_card ='';
		foreach ($_FILES['registration_card']['name'] as $key => $value) {
		
      $tmpfile =mt_rand().urlencode($_FILES['registration_card']['name'][$key]) ;

      move_uploaded_file($_FILES['registration_card']['tmp_name'][$key], $path.$tmpfile);

      if($registration_card==''){

        $registration_card = $tmpfile;
      }else{
     $registration_card .=','.$tmpfile;
      }

		}
$registration_cardsql = ", registration_card = '$registration_card'";
	}else{
		$registration_cardsql = "";
	}


	if(!empty($_FILES['licence']['name'][0])){
  $licence ='';
		foreach ($_FILES['licence']['name'] as $key => $value) {
		
      $tmpfile =mt_rand().urlencode($_FILES['licence']['name'][$key]) ;

      move_uploaded_file($_FILES['licence']['tmp_name'][$key], $path.$tmpfile);

      if($licence==''){

        $licence = $tmpfile;
      }else{
     $licence .=','.$tmpfile;
      }

		}
$licencesql = ", licence = '$licence'";
	}else{
		$licencesql = "";
	}



$truck_reg_no = $registration_card_no;

echo "UPDATE tbl_trucks SET truck_type = '$truck_type', load_passing = '$load_passing', truck_permit_no = '$truck_permit_no', truck_reg_no = '$truck_reg_no' , truck_validity = '$truck_validity', driver_name='$driver_name', mobile_no='$mobile_no', dl='$dl', aadhar_no='$aadhar_no', fitness_cert_no='$fitness_cert_no', auth_driver_cert_no='$auth_driver_cert_no',registration_card_no='$registration_card_no'  $truck_reg_file  $truck_permit_file $insurance_file  $fitness_cert_file $auth_driver_cert_file $dl_file $aadhar_file  $registration_cardsql  $licencesql  WHERE id = '".$_GET['edit_id']."'";



		$update = mysqli_query($dbhandle, "UPDATE tbl_trucks SET truck_type = '$truck_type', load_passing = '$load_passing', truck_permit_no = '$truck_permit_no', truck_reg_no = '$truck_reg_no' , truck_validity = '$truck_validity', driver_name='$driver_name', mobile_no='$mobile_no', dl='$dl', aadhar_no='$aadhar_no', fitness_cert_no='$fitness_cert_no', auth_driver_cert_no='$auth_driver_cert_no',registration_card_no='$registration_card_no'  $truck_reg_file  $truck_permit_file $insurance_file  $fitness_cert_file $auth_driver_cert_file $dl_file $aadhar_file  $registration_cardsql   WHERE id = '".$_GET['edit_id']."'");




if(!empty($_FILES['aadhar_card']['name'][0])){
  $aadhar_card ='';
		foreach ($_FILES['aadhar_card']['name'] as $key => $value) {
		
      $tmpfile =mt_rand().urlencode($_FILES['aadhar_card']['name'][$key]) ;

      move_uploaded_file($_FILES['aadhar_card']['tmp_name'][$key], '../app-api/upload/documents/'.$tmpfile);

      if($aadhar_card==''){

        $aadhar_card = $tmpfile;
      }else{
     $aadhar_card .=','.$tmpfile;
      }

		}
$aadhar_cardsql = ", aadhar_card = '$aadhar_card'";
	}else{
		$aadhar_cardsql = "";
	}






if(!empty($_FILES['dl']['name'][0])){
  $dl ='';
		foreach ($_FILES['dl']['name'] as $key => $value) {
		
     $tmpfile =mt_rand().urlencode($_FILES['dl']['name'][$key]) ;

      move_uploaded_file($_FILES['dl']['tmp_name'][$key], '../app-api/upload/documents/'.$tmpfile);

      if($dl==''){

        $dl = $tmpfile;
      }else{
     $dl .=','.$tmpfile;
      }

		}
$dlsql = ", dl = '$dl'";
	}else{
		$dlsql = "";
	}





if(!empty($_FILES['reg_card']['name'][0])){
  $reg_card ='';
		foreach ($_FILES['reg_card']['name'] as $key => $value) {
		
     $tmpfile =mt_rand().urlencode($_FILES['reg_card']['name'][$key]) ;

      move_uploaded_file($_FILES['reg_card']['tmp_name'][$key], '../app-api/upload/documents/'.$tmpfile);

      if($reg_card==''){

        $reg_card = $tmpfile;
      }else{
     $reg_card .=','.$tmpfile;
      }

		}
$reg_cardsql = ", reg_card = '$reg_card'";
	}else{
		$reg_cardsql = "";
	}



	$updatse = mysqli_query($dbhandle, "UPDATE  tbl_vehicle_owner SET dl_nomber = '$dl_nomber', aadhar_no = '$aadhar_no' $aadhar_cardsql  $dlsql $reg_cardsql   WHERE mb_no = '".$mobile_no."'");



		$sms = '<p class="success-msg">Truck Details Updated Successfully</p>' ;
	}



	
	$query = mysqli_query($dbhandle, "SELECT * FROM tbl_trucks WHERE id='".$editid."'");
	$rowU = mysqli_fetch_array($query);	


$driverdata = mysqli_fetch_assoc(mysqli_query($dbhandle, "select * from tbl_vehicle_owner   where mb_no='".$rowU['mobile_no']."'"));

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Vehicle Truck Edit</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Vehicle Truck</a></li>
							<li class="active" style="color:#f0193f">Vehicle Truck Edit</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="" enctype="multipart/form-data">
											<br><br>
											<?php
												if (isset($sms)) {
													echo $sms;
												}
											?> 
											  <div class="row">
									     <div class="col-sm-5">
										    <label style="font-size: 157%;"><u>TRUCK INFORMATION :</u></label>
										 </div>
										 							  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Type<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <select class="form-control" name="truck_type"  id="truck_type" readonly>
											<option value="">Select truck type</option>
											<?php  $roww = mysqli_query($dbhandle, "select * from vehicle_list where status = 1");
												while($fetchh = mysqli_fetch_array($roww)){
												?>
											<option value="<?php echo $fetchh['id'];?>" <?php if($rowU['truck_type']==$fetchh['id']){ echo "selected";}?>><img src="upload/vechile_image/<?php echo $fetchh['pimage'];?>"><?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?></option>
										<?php } ?>
											  </select>
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Load Passing :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="load_passing" class="form-control" value="<?php echo $rowU['load_passing'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Permit No<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="truck_permit_no" class="form-control" value="<?php echo $rowU['truck_permit_no'];?>">
										   </div>
<div class="col-sm-4">										   
										   <?php if($rowU['truck_permit_file']!=""){?>
												
												<a href="<?php echo 	$path.$rowU['truck_permit_file'];?>" target="_blank">Download</a>
												
											<?php }?>
<input type="file" name="truck_permit_file" id="truck_permit_file" class="inputfile7 inputfile-5" >											
									  </div>
									  </div>
									  


									<!--    <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Reg. No<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="truck_reg_no" class="form-control" value="<?php echo $rowU['truck_reg_no'];?>">
										 </div>	
										 <div class="col-sm-4">
											<?php if($rowU['truck_reg_file']!=""){?>
												 
												<a href="<?php echo $path.$rowU['truck_reg_file'];?>" target="_blank">Download</a>
												
											<?php }?>
<input type="file" name="truck_reg_file" id="truck_reg_file" class="inputfile7 inputfile-5" >	
											</div>										 
									  </div>
 -->

									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck validity & Insurance :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="truck_validity" class="form-control" value="<?php echo $rowU['truck_validity'];?>" id="datepicker">
										 </div>	
										 <div class="col-sm-4">
										<?php if($rowU['insurance_file']!=""){?>
												
												<a href="<?php echo $path.$rowU['insurance_file'];?>" target="_blank">Download</a>
												
											<?php }?>
<input type="file" name="insurance_file" id="insurance_file" class="inputfile7 inputfile-5" >	
									  </div>
									  </div>
									  
									   
									  
									   <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>DRIVER  INFORMATION :</u></label>
										 </div>
										 
										 						  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Driver Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="text" name="driver_name" class="form-control" value="<?php echo $rowU['driver_name'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Driver Mobile No<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										 <input type="text" name="mobile_no" class="form-control" value="<?php echo $rowU['mobile_no'];?>">
										 </div>								  
									  </div>
									  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Driving License <span style="color:red">*</span> :</label>
										      <?php /*if($rowU['dl_status']==0){
                                   echo '<a href="?edit_id='.$_GET['edit_id'].'&driver='.$rowU['vehicle_owner_id'].'&param=dl_status&action=driver_verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }

*/
										    if($rowU['dl_status']==0){
                                   echo '<a href="?edit_id='.$_GET['edit_id'].'&param=dl_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }

										    ?> 
										 </div>
										 <div class="col-sm-4">
										  	   <input type="text" name="dl" class="form-control" value="<?php echo $rowU['dl'];?>">
										 </div>	
										
										<div class="col-sm-4"> 
										 <?php if($rowU['licence']!=""){

              $filesadhar = explode(",", $rowU['licence']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download dl File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="licence[]" id="licence" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>



  <div class="row">
									     <div class="col-sm-3">
										    <label>Aadhar No. :</label>
										    <?php 
										    if($rowU['adhar_status']==0){
                                   echo '<a href="?edit_id='.$_GET['edit_id'].'&param=adhar_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }

										    ?>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="aadhar_no" class="form-control" value="<?php echo $rowU['aadhar_no'];?>">
										 </div>	
										 <div class="col-sm-4">
											<?php if($rowU['aadhar_file']!=""){?>
												<a href="<?php echo $path.$rowU['aadhar_file'];?>" target="_blank">Download</a>
												
											<?php }?>
<input type="file" name="aadhar_file" id="aadhar_file" class="inputfile7 inputfile-5" >	
									  </div>
									  </div>

									     <!--      <div class="row">
									     <div class="col-sm-3">
										    <label>Adhar No. <span style="color:red">*</span> :</label>
  <?php if($driverdata['adhar_status']==0){
                                   echo '<a href="?edit_id='.$_GET['edit_id'].'&driver='.$driverdata['vehicle_owner_id'].'&param=adhar_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 

										 </div>
										 
										  <div class="col-sm-4">
										   <input type="text" name="aadhar_no" class="form-control" value="<?php echo $driverdata['aadhar_no'];?>">
										 </div>	 
										<div class="col-sm-4"> 
										 <?php if($driverdata['aadhar_card']!=""){

              $filesadhar = explode(",", $driverdata['aadhar_card']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              		$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download adhar File '.$nom.'</a><br>';
          }
              }
										 	?>
			
			<?php }?>

            <input type="file" name="aadhar_card[]" id="aadhar_card" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>
 -->






                     <div class="row">
									     <div class="col-sm-3">
										    <label>Registration  <span style="color:red">*</span> :</label>
										      <?php if($rowU['reg_card_status']==0){
                                   echo '<a href="?edit_id='.$_GET['edit_id'].'&param=reg_card_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
									  <div class="col-sm-4">
										   <input type="text" name="registration_card_no" class="form-control" value="<?php echo $rowU['truck_reg_no'];?>">
										 </div>		 
										
										<div class="col-sm-4"> 
										 <?php if($rowU['registration_card']!=""){

              $filesadhar = explode(",", $rowU['registration_card']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="'.$path.''.$value.'" target="_blank">Download registration File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="registration_card[]" id="registration_card" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>








									     <div class="row">
									     <div class="col-sm-3">
										    <label>Fitness Certificate :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="fitness_cert_no" class="form-control" value="<?php echo $rowU['fitness_cert_no'];?>">
										 </div>	
										 <div class="col-sm-4">
											<?php if($rowU['fitness_cert_file']!=""){?>
												<a href="<?php echo $path.$rowU['fitness_cert_file'];?>" target="_blank">Download</a>
												
											<?php }?>
	<input type="file" name="fitness_cert_file" id="fitness_cert_file" class="inputfile7 inputfile-5" >	
									  </div>
									  </div>
									  
									     
									  
									    <div class="row">
									     <div class="col-sm-3">
										    <label>Authorised driver certificate<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="auth_driver_cert_no" class="form-control" value="<?php echo $rowU['auth_driver_cert_no'];?>">
										 </div>
										 <div class="col-sm-4">
											<?php if($rowU['auth_driver_cert_file']!=""){?>
											
												<a href="<?php echo $path.$rowU['auth_driver_cert_file'];?>" target="_blank">Download</a>
												
											<?php }?>
<input type="file" name="auth_driver_cert_file" id="auth_driver_cert_file" class="inputfile7 inputfile-5" >	
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


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$(".select2").select2();
  } );
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


