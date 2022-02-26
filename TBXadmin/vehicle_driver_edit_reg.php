<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehicledriver';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
$path = $base_url."../upload/vehicle_documents/";
 $random_key = strtotime(date('Y-m-d H:i:s'));

 if($_GET['action']=='verify'){
 $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET ".$_GET['param']." = '1'  WHERE vehicle_owner_id = '".$_GET['edit_id']."'");
 echo '<script>window.location="vehicle_driver_edit_reg.php?edit_id='.$_GET['edit_id'].'"</script>';
}


 ?>
  <html>
<head>
  <title>Technobrix | Driver</title>
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
		$bank_name = $_POST['bank_name'];
		$branch_address = $_POST['branch_address'];
		$ifsc_code = $_POST['ifsc_code'];
		$benificiary_name = $_POST['benificiary_name'];
		$acc_no = $_POST['acc_no'];

$aadhar_no = $_POST['aadhar_no'];

		$company_name = $_POST['company_name'];
		$company_type = $_POST['company_type'];
		$pan_no = $_POST['pan_no'];
		$gst_no = $_POST['gst_no'];
		if(!empty($_FILES['pan_file']['name'])){
			$pan_file =$_FILES['pan_file']['name'];
			$pan_file = rand().$random_key.'-'.$pan_file;
			$pan_file_tmp = $_FILES['pan_file']['tmp_name'];
			move_uploaded_file($pan_file_tmp,$path.$pan_file);
			$pan_file = ", pan_file = '$pan_file'";
		}else{
			$pan_file = "";
		}
		if(!empty($_FILES['gst_file']['name'])){
			$gst_file =$_FILES['gst_file']['name'];
			$gst_file = rand().$random_key.'-'.$gst_file;
			$gst_file_tmp = $_FILES['gst_file']['tmp_name'];
			move_uploaded_file($gst_file_tmp,$path.$gst_file);
			$gst_file = ", gst_file = '$gst_file'";
		}else{
			$gst_file = "";
		}




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





	if(!empty($_FILES['visiting_card']['name'][0])){
  $visiting_card ='';
		foreach ($_FILES['visiting_card']['name'] as $key => $value) {
		
     $tmpfile =mt_rand().urlencode($_FILES['visiting_card']['name'][$key]) ;

      move_uploaded_file($_FILES['visiting_card']['tmp_name'][$key], '../app-api/upload/documents/'.$tmpfile);

      if($visiting_card==''){

        $visiting_card = $tmpfile;
      }else{
     $visiting_card .=','.$tmpfile;
      }

		}
$visiting_cardsql = ", visiting_card = '$visiting_card'";
	}else{
		$visiting_cardsql = "";
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





if(!empty($_FILES['other_docs']['name'][0])){
  $other_docs ='';
		foreach ($_FILES['other_docs']['name'] as $key => $value) {
		
     $tmpfile =mt_rand().urlencode($_FILES['other_docs']['name'][$key]) ;

      move_uploaded_file($_FILES['other_docs']['tmp_name'][$key], '../app-api/upload/documents/'.$tmpfile);

      if($other_docs==''){

        $other_docs = $tmpfile;
      }else{
     $other_docs .=','.$tmpfile;
      }

		}
$other_docssql = ", other_docs = '$other_docs'";
	}else{
		$other_docssql = "";
	}


echo "UPDATE tbl_vehicle_owner SET name = '$name', last_name = '$last_name', mb_no = '$mb_no', email = '$email' , transport_name = '$transport_name', password='$password', address='$address', city='$city', pincode='$pincode', alt_contact_person='$alt_contact_person', alt_mb_no='$alt_mb_no', bank_name='$bank_name', branch_address='$branch_address', ifsc_code='$ifsc_code', benificiary_name='$benificiary_name',acc_no='$acc_no',company_name='$company_name',company_type='$company_type',gst_no = '$gst_no',pan_no='$pan_no',aadhar_no='$aadhar_no',dl_nomber='$dl_nomber',reg_card_no='$reg_card_no'  $pan_file $gst_file  $aadhar_cardsql $visiting_cardsql  $cancel_chequesql $other_docssql  $dlsql $reg_cardsql WHERE vehicle_owner_id = '".$_GET['edit_id']."'";



		$update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET name = '$name', last_name = '$last_name', mb_no = '$mb_no', email = '$email' , transport_name = '$transport_name', password='$password', address='$address', city='$city', pincode='$pincode', alt_contact_person='$alt_contact_person', alt_mb_no='$alt_mb_no', bank_name='$bank_name', branch_address='$branch_address', ifsc_code='$ifsc_code', benificiary_name='$benificiary_name',acc_no='$acc_no',company_name='$company_name',company_type='$company_type',gst_no = '$gst_no',pan_no='$pan_no',aadhar_no='$aadhar_no',dl_nomber='$dl_nomber',reg_card_no='$reg_card_no'  $pan_file $gst_file  $aadhar_cardsql $visiting_cardsql  $cancel_chequesql $other_docssql  $dlsql $reg_cardsql WHERE vehicle_owner_id = '".$_GET['edit_id']."'");
		$sms = '<p class="success-msg">Details Updated Successfully</p>' ;
	}



	
	$select = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id='".$editid."' and 	vehicle_owner_type='transporter'");


	$select = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id='".$editid."' ");

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Vehicle <?php echo ucfirst($data['vehicle_owner_type']) ;?> Edit</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="loader_register.php">Vehicle <?php echo ucfirst($data['vehicle_owner_type']) ;?></a></li>
							<li class="active" style="color:#f0193f">Vehicle <?php echo ucfirst($data['vehicle_owner_type']) ;?> Edit</li>
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
									  


<?php if (is_numeric($data["city"])) {  ?>
      

                    <div class="row">
                      <div class="col-sm-3">										    <label>City<span style="color:red">*</span> :</label>										 </div>
                      <div class="col-sm-4">
                        <select class="form-control" id="city"  name="city">
                          <option value="">Select City</option>
                          <?php   												$row = mysqli_query($dbhandle, "select * from tbl_city");													   while($fetch = mysqli_fetch_array($row)){	 ?>													
                          <option  value="<?php echo $fetch['id'];?>" <?php echo ($fetch['id']==$data['city']) ? "selected":'';?>><?php echo $fetch['city_name'];?></option>
                          <?php } ?>										
                        </select>
                      </div>
                    </div>
<?php }else{  ?>

 <div class="row">
                      <div class="col-sm-3">                        <label>City<span style="color:red">*</span> :</label>                     </div>
                      <div class="col-sm-4">                       <input type="text" name="city" class="form-control" value="<?php echo $data['city'];?>">                    </div>
                    </div>

 <?php }?>

									  
									  
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
									  
                                       <div class="row">
									     <div class="col-sm-4">
										       <label style="font-size: 157%;"><u>COMPANY INFORMATION :</u></label>
										 </div>
										 </div>
										
										<div class="row">
									     <div class="col-sm-3">
										    <label>Company Name  :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>">
										 </div>								  
									  </div>
									  <div class="row">
									     <div class="col-sm-3">
										    <label>Company Type :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <select class="form-control" name="company_type" id="company_type">
											   <option value=""> Select Company Type </option>
											   <option value="Commison Agent" <?php echo ($data['company_type']=='Commison Agent')?'selected':'';?> > Commison Agent </option>
											   <option value="Fleet Owner" <?php echo ($data['company_type']=='Fleet Owner')?'selected':'';?> > Fleet Owner </option>
											   <option value="Logistic" <?php echo ($data['company_type']=='Logistic')?'selected':'';?> > Logistic </option>

											</select>
										 </div>								  
									  </div>


 <div class="row">									     <div class="col-sm-3">										    <label>Aadhar No  :</label>										 </div>										 										 <div class="col-sm-4">										   <input type="text" name="aadhar_no" class="form-control" value="<?php echo $data['aadhar_no'];?>">										 </div>								  									  </div>



									 		<div class="row">
									     <div class="col-sm-3">
										    <label>GST Number <span style="color:red">*</span> :</label>

										    <?php if($data['gst_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=gst_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
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

										       <?php if($data['pan_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=pan_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="pan_no" class="form-control" value="<?php echo $data['pan_no'];?>">
										 </div>	
										<div class="col-sm-4"> 
										 <?php if($data['pan_file']!=""){?>
			<a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a>
			<?php }?>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>	
								 
								 <div class="row">		
									 <div class="col-sm-3">		
										<label>TDS Declaration form :</label>	
										  <?php if($data['tds_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=tds_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
									 </div>
									 <div class="col-sm-4">
										   <input type="text" name="tds_dclaration" class="form-control" value="<?php echo $data['tds_dclaration'];?>">
										 </div>	
										<div class="col-sm-4"> 
										 <?php if($data['tds_file']!=""){?>
			<a href="<?php echo  $path.$data['tds_file'];?>" target="_blank">Download Tds File</a>
			<?php }?>

            <input type="file" name="tds_file" id="tds_file" class="inputfile7 inputfile-5" >
			
										 </div>	
								 </div>	
								 
								 

            <div class="row">
									     <div class="col-sm-3">
										    <label>Adhar No. <span style="color:red">*</span> :</label>
  <?php if($data['adhar_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=adhar_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 

										 </div>
										 
										<!--  <div class="col-sm-4">
										   <input type="text" name="aadhar_card" class="form-control" value="<?php echo $data['aadhar_no'];?>">
										 </div>	 -->
										<div class="col-sm-8"> 
										 <?php if($data['aadhar_card']!=""){

              $filesadhar = explode(",", $data['aadhar_card']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              		$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download adhar File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="aadhar_card[]" id="aadhar_card" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>









            <div class="row">
									     <div class="col-sm-3">
										    <label>Driving License <span style="color:red">*</span> :</label>
										      <?php if($data['dl_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=dl_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 <div class="col-sm-4">
										   <input type="text" name="dl_nomber" class="form-control" value="<?php echo $data['dl_nomber'];?>">
										 </div>	
										
										<div class="col-sm-4"> 
										 <?php if($data['dl']!=""){

              $filesadhar = explode(",", $data['dl']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download dl File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="dl[]" id="dl" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>




 <div class="row">
									     <div class="col-sm-3">
										    <label>Registration  <span style="color:red">*</span> :</label>
										      <?php if($data['reg_card_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=reg_card_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 
											 <div class="col-sm-4">
										   <input type="text" name="reg_card_no" class="form-control" value="<?php echo $data['reg_card_no'];?>">
										 </div>	
										
										<div class="col-sm-4"> 
										 <?php if($data['reg_card']!=""){

              $filesadhar = explode(",", $data['reg_card']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download registration File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="reg_card[]" id="reg_card" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>




            <div class="row" style="display: none;">
									     <div class="col-sm-3">
										    <label>Visiting Card <span style="color:red">*</span> :</label>
										      <?php if($data['visiting_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=visiting_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 
										
										<div class="col-sm-8"> 
										 <?php if($data['visiting_card']!=""){

              $filesadhar = explode(",", $data['visiting_card']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download Visiting File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="visiting_card[]" id="visiting_card" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>




 <div class="row" style="display: none;">
									     <div class="col-sm-3">
										    <label>Cancel checque  <span style="color:red">*</span> :</label>
										     <?php if($data['cheque_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=cheque_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 
										
										<div class="col-sm-8"> 
										 <?php if($data['cancel_cheque']!=""){

              $filesadhar = explode(",", $data['cancel_cheque']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download Cheque File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="cancel_cheque[]" id="cancel_cheque" multiple class="inputfile7 inputfile-5" >
			
										 </div>										 
									  </div>


 <div class="row">
									     <div class="col-sm-3">
										    <label>Other Document  <span style="color:red">*</span> :</label>
										     <?php if($data['other_doc_status']==0){
                                   echo '<a href="?edit_id='.$data['vehicle_owner_id'].'&param=other_doc_status&action=verify">Verify</a>';
										    }else{
                                echo 'Verified <i class="fa fa-check-circle" ></i>'; 
										    }
										    ?> 
										 </div>
										 
										
										<div class="col-sm-8"> 
										 <?php if($data['other_docs']!=""){

              $filesadhar = explode(",", $data['other_docs']);
              foreach ($filesadhar as $key => $value) {
              	if($value!=''){
              			$nom = $key+1;
              echo '<a href="../app-api/upload/documents/'.$value.'" target="_blank">Download Other File '.$nom.'</a><br>';
          }
              }
										 	?>
			<!-- <a href="<?php echo  $path.$data['pan_file'];?>" target="_blank">Download Pan File</a> -->
			<?php }?>

            <input type="file" name="other_docs[]" id="other_docs" multiple class="inputfile7 inputfile-5" >
			
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


