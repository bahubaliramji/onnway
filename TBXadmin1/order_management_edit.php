<?php
session_start();
include('include/config.php');
include_once("../controls/define.php");
$type          = $_SESSION['type'];
$sidepage      = 'order';
$innersidepage = 'bookload';
if ($_SESSION['user_id'] == '') {
	header('location:index.php');
}
$path = $base_url . "../upload/documents/";
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
		$editid = $_GET['edit_id'];
		if (isset($_POST['submit'])) {
			$source        = $_POST['source'];
			$destination   = $_POST['destination'];
			$destinationn  = implode(',', $destination);
			$material      = $_POST['material'];
			$weight        = $_POST['weight'];
			$dimension     = $_POST['dimension'];
			$vehicletype   = $_POST['vehicletype'];
			$noofvehicle   = $_POST['noofvehicle'];
			$scheduleddate = $_POST['scheduleddate'];
			$status        = "active";
			$update        = mysqli_query($dbhandle, "UPDATE tbl_book_load SET source = '$source', destination = '$destinationn', material_type = '$material', weight = '$weight', dimension = '$dimension', vehicle_type = '$vehicletype', no_vehicle = '$noofvehicle', scheduled_date = '$scheduleddate' WHERE book_load_id = '$editid'");
		}
		$select3 = mysqli_query($dbhandle, "select * from tbl_book_load where id='" . $editid . "'");
		$data3 = mysqli_fetch_array($select3);
		if (isset($_POST['Update'])) {
			$source             = $_POST['source'];
			$destination        = $_POST['destination'];
			$destinationn       = implode(',', $destination);
			$distance           = $_POST['distance'];
			$cost               = $_POST['cost'];
			$scheduled_date     = $_POST['scheduled_date'];
			$scheduled_time     = $_POST['scheduled_time'];
			$vehicle_type       = $_POST['vehicletype'];
			$material_type      = $_POST['material_type'];
			$weight             = $_POST['weight'];
			$booking_date       = $_POST['booking_date'];
			$pickup_street      = $_POST['pickup_street'];
			$pickup_city        = $_POST['pickup_city'];
			$pickup_pincode     = $_POST['pickup_pincode'];
			$drop_street        = $_POST['drop_street'];
			$destination_name   = $_POST['destination_name'];
			$drop_pincode       = $_POST['drop_pincode'];

			$assign_truck       = $_POST['assign_truck'];
			$asighn_driver      = $_POST['asighn_driver'];
			$driver_contact_no  = $_POST['driver_contact_no'];
			$message            = $_POST['message'];
			$amount_truck  		= $_POST['amount_truck'];
			$document_status    = $_POST['document_status'];
			if ($_POST['payment_status'] != "") {
				$payment_status = $_POST['payment_status'];
			} else {
				$payment_status = 1;
			}
			if ($_POST['payment_status_t'] != "") {
				$payment_status_t = $_POST['payment_status_t'];
			} else {
				$payment_status_t = 1;
			}
			if ($_POST['status'] != "") {
				$status = ",status='" . $_POST['status'] . "'";
			} else {
				$status = "";
			}
			$delivery_status    = $_POST['delivery_status'];
			$bal_payment_status =  $_POST['bal_payment_status'];
			$payment_message    = $_POST['payment_message'];
			$bal_payment_status_t    = $_POST['bal_payment_status_t'];
			$random_key         = strtotime(date('Y-m-d H:i:s'));
			if (!empty($_FILES['file1']['name'])) {
				$file1     = $_FILES['file1']['name'];
				$file1     = rand() . $random_key . '-' . $file1;
				$file1_tmp = $_FILES['file1']['tmp_name'];
				move_uploaded_file($file1_tmp, $path . $file1);
				$file1 = ", file1 = '$file1'";
			} else {
				$file1 = "";
			}
			if (!empty($_FILES['file2']['name'])) {
				$file2     = $_FILES['file2']['name'];
				$file2     = rand() . $random_key . '-' . $file2;
				$file2_tmp = $_FILES['file2']['tmp_name'];
				move_uploaded_file($file2_tmp, $path . $file2);
				$file2 = ", file2 = '$file2'";
			} else {
				$file2 = "";
			}
			if (!empty($_FILES['file3']['name'])) {
				$file3     = $_FILES['file3']['name'];
				$file3     = rand() . $random_key . '-' . $file3;
				$file3_tmp = $_FILES['file3']['tmp_name'];
				move_uploaded_file($file3_tmp, $path . $file3);
				$file3 = ", file3 = '$file3'";
			} else {
				$file3 = "";
			}
			if (!empty($_FILES['file4']['name'])) {
				$file4     = $_FILES['file4']['name'];
				$file4     = rand() . $random_key . '-' . $file4;
				$file4_tmp = $_FILES['file4']['tmp_name'];
				move_uploaded_file($file4_tmp, $path . $file4);
				$file4 = ", file4 = '$file4'";
			} else {
				$file4 = "";
			}
			if (!empty($_FILES['file5']['name'])) {
				$file5     = $_FILES['file5']['name'];
				$file5     = rand() . $random_key . '-' . $file5;
				$file5_tmp = $_FILES['file5']['tmp_name'];
				move_uploaded_file($file5_tmp, $path . $file5);
				$file5 = ", file5 = '$file5'";
			} else {
				$file5 = "";
			}
			if (!empty($_FILES['lorry_file']['name'])) {
				$lorry_file     = $_FILES['lorry_file']['name'];
				$lorry_file     = rand() . $random_key . '-' . $lorry_file;
				$lorry_file_tmp = $_FILES['lorry_file']['tmp_name'];
				move_uploaded_file($lorry_file_tmp, $path . $lorry_file);
				$lorry_file = ", lorry_file = '$lorry_file'";
			} else {
				$lorry_file = "";
			}
			if (!empty($_FILES['advance_pay_file']['name'])) {
				$advance_pay_file     = $_FILES['advance_pay_file']['name'];
				$advance_pay_file     = rand() . $random_key . '-' . $advance_pay_file;
				$advance_pay_file_tmp = $_FILES['advance_pay_file']['tmp_name'];
				move_uploaded_file($advance_pay_file_tmp, $path . $advance_pay_file);
				$advance_pay_file = ", advance_pay_file = '$advance_pay_file'";
			} else {
				$advance_pay_file = "";
			}
			if (!empty($_FILES['bal_pay_file']['name'])) {
				$bal_pay_file     = $_FILES['bal_pay_file']['name'];
				$bal_pay_file     = rand() . $random_key . '-' . $bal_pay_file;
				$bal_pay_file_tmp = $_FILES['bal_pay_file']['tmp_name'];
				move_uploaded_file($bal_pay_file_tmp, $path . $bal_pay_file);
				$bal_pay_file = ", bal_pay_file = '$bal_pay_file'";
			} else {
				$bal_pay_file = "";
			}
			if (!empty($_FILES['advance_pay_file_t']['name'])) {
				$advance_pay_file_t     = $_FILES['advance_pay_file_t']['name'];
				$advance_pay_file_t     = rand() . $random_key . '-' . $advance_pay_file_t;
				$advance_pay_file_t_tmp = $_FILES['advance_pay_file_t']['tmp_name'];
				move_uploaded_file($advance_pay_file_t_tmp, $path . $advance_pay_file_t);
				$advance_pay_file_t = ", advance_pay_file_t = '$advance_pay_file_t'";
			} else {
				$advance_pay_file_t = "";
			}
			if (!empty($_FILES['bal_pay_file_t']['name'])) {
				$bal_pay_file_t     = $_FILES['bal_pay_file_t']['name'];
				$bal_pay_file_t     = rand() . $random_key . '-' . $bal_pay_file_t;
				$bal_pay_file_t_tmp = $_FILES['bal_pay_file_t']['tmp_name'];
				move_uploaded_file($bal_pay_file_t_tmp, $path . $bal_pay_file_t);
				$bal_pay_file_t = ", bal_pay_file_t = '$bal_pay_file_t'";
			} else {
				$bal_pay_file_t = "";
			}

			$update = mysqli_query($dbhandle, "UPDATE tbl_book_load SET source = '$source',destination = '$destination',distance = '$distance',cost = '$cost',scheduled_date = '$scheduled_date',scheduled_time = '$scheduled_time',vehicle_type = '$vehicle_type',material_type = '$material_type',weight = '$weight',booking_date = '$booking_date',pickup_street = '$pickup_street',pickup_city = '$pickup_city',pickup_pincode = '$pickup_pincode',drop_street = '$drop_street',destination_name = '$destination_name',drop_pincode = '$drop_pincode',assign_truck = '$assign_truck',				asighn_driver = '$asighn_driver',driver_contact_no = '$driver_contact_no',message = '$message',amount_truck = '$amount_truck',				document_status = '$document_status', payment_status='$payment_status', bal_payment_status='$bal_payment_status', payment_message='$payment_message', delivery_status='$delivery_status', bal_payment_status_t='$bal_payment_status_t',payment_status_t='$payment_status_t' $file1 $file2 $file3 $file4 $file5 $lorry_file $advance_pay_file $bal_pay_file $advance_pay_file_t $bal_pay_file_t $status WHERE id = '$editid'");
			if ($delivery_status != "") {
				mysqli_query($dbhandle, "UPDATE tbl_post_truck SET status = '$delivery_status' WHERE id = '$assign_truck'");
				if ($delivery_status == 8) {
					$selectSql = mysqli_query($dbhandle, "select truck_id from tbl_post_truck  WHERE id = '$assign_truck'");
					$resultSelect = mysqli_fetch_array($selectSql);
					$truckGetID = $resultSelect['truck_id'];
					mysqli_query($dbhandle, "UPDATE tbl_trucks SET post_status = '1' WHERE id = '$truckGetID'");
				}
			}
			if ($post_truck_id != "0") {
				$select1 = mysqli_query($dbhandle, "select t.id,t.vehicle_owner_id,p.post_truck_id from tbl_post_truck as p INNER JOIN tbl_trucks as t ON p.truck_id = t.id where p.id='" . $data3['assign_truck'] . "' ");
				$get_truck_reg = mysqli_fetch_array($select1);
				/* loader email */
				$to_loader = getLoaderInfo($data3['loader_id'])['email'];
				$email_message = "\n HI Dear,
			\n Your Check fare id " . $data3['booking_id'] . " is assign to Post Truck id " . $get_truck_reg['post_truck_id'] . " status & payment Info has been updated as given below.
			\n Advance Payment Status : " . getStatus($payment_status) . "
			\n Payment Message : " . $payment_message . "
			\n Document Status : " . getStatus($document_status) . "
			\n Balance Payment Status : " . getStatus($bal_payment_status) . "
			\n Current Status : 	" . getStatus($delivery_status) . "	";

				$email_message .= "\n\n Thank You";
				$email_subject = 'Booking Status On Onnway.com';
				$email_from = 'support@onnway.com';
				$headers  = "Reply-To: " . $from . "\r\n";
				$headers .= 'From: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
				$mail = @mail($to_loader, $email_subject, $email_message, $headers);

				/* Truck Owner email */
				$to_vehicle = getVehicleOwnerInfo($get_truck_reg['vehicle_owner_id'])['email'];
				$email_message1 = "\n  HI Dear,
				\n Your Post Truck id " . $get_truck_reg['post_truck_id'] . " assign with Check fare id " . $data3['booking_id'] . "  status & payment Info has been updated as given below.
				\n Advance Payment Status : " . getStatus($payment_status_t) . "
				\n Balance Payment Status : " . getStatus($bal_payment_status_t) . "
				\n Current Status : 	" . getStatus($delivery_status) . "	";
				$email_message1 .= "\n\n Thank You";
				$mail = @mail($to_vehicle, $email_subject, $email_message1, $headers);
			}
			$sms    = '<p class="success-msg">Details Updated Successfully</p>';
		}
		$select = mysqli_query($dbhandle, "select * from tbl_book_load where id='" . $editid . "'");
		$data   = mysqli_fetch_array($select);
		?>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Post Load Edit</h1>
				<ol class="breadcrumb">
					<li><a href="dashboard.php">
							<i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Booking</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-warning" style="width=200px">
							<div class="box-header with-border">
								<h3 class="box-title">Shipping Details</h3>
								<?php
								if (isset($sms)) {
									echo $sms;
								}
								?>
							</div> <!-- /.box-header -->
							<div class="box-body">
								<form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data">
									<div class="col-xs-6">
										<div class="form-group"> <label>Source</label> <select name="source" class="form-control"> <?php
																																	$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");
																																	while ($fetch = mysqli_fetch_array($row)) {
																																	?> <option <?php
																																		echo (isset($_REQUEST['edit_id']) && $fetch['id'] == $data['source'] ? "selected" : "");
			?> value="<?php
																																		echo $fetch['id'];
			?>"> <?php
																																		echo $fetch['city_name'];
		?> </option> <?php
																																	}
				?> </select> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Destination</label> <select name="destination" class="form-control"> <?php
																																				$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");
																																				while ($fetch = mysqli_fetch_array($row)) {
																																				?> <option <?php
																																					echo (isset($_REQUEST['edit_id']) && $fetch['id'] == $data['destination'] ? "selected" : "");
			?> value="<?php
																																					echo $fetch['id'];
			?>"> <?php
																																					echo $fetch['city_name'];
		?> </option> <?php
																																				}
				?> </select> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Total Distance In Km</label> <input type="text" name="distance" value="<?php
																																				echo (isset($_REQUEST['edit_id']) ? $data['distance'] : "");
																																				?>" class="form-control" placeholder="Distance Date..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Actual Price in INR </label> <input type="text" name="cost" value="<?php
																																			echo (isset($_REQUEST['edit_id']) ? $data['cost'] : "");
																																			?>" class="form-control" placeholder="Actual Price..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Schedule Date</label> <input type="text" name="scheduled_date" value="<?php
																																				echo (isset($_REQUEST['edit_id']) ? $data['scheduled_date'] : "");
																																				?>" class="form-control" placeholder="Scheduled Date..." id="datepicker" /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Schedule Time</label>

											<select name="scheduled_time" class="form-control">
												<option value="">Select Scheduled Time </option>

												<option value="12AM-3AM" <?php echo ($data['scheduled_time'] == "12AM-3AM") ? "selected" : ""; ?>> 12AM - 3AM</option>
												<option value="3AM-6AM" <?php echo ($data['scheduled_time'] == "3AM-6AM") ? "selected" : ""; ?>> 3AM - 6AM</option>
												<option value="6AM-9AM" <?php echo ($data['scheduled_time'] == "6AM-9AM") ? "selected" : ""; ?>> 6AM - 9AM</option>
												<option value="9AM-12PM" <?php echo ($data['scheduled_time'] == "9AM-12PM") ? "selected" : ""; ?>> 9AM - 12PM</option>
												<option value="12PM-3PM" <?php echo ($data['scheduled_time'] == "12PM-3PM") ? "selected" : ""; ?>> 12PM - 3PM</option>
												<option value="3PM-6PM" <?php echo ($data['scheduled_time'] == "3PM-6PM") ? "selected" : ""; ?>> 3PM - 6PM</option>
												<option value="6PM-9PM" <?php echo ($data['scheduled_time'] == "6PM-9PM") ? "selected" : ""; ?>> 6PM - 9PM</option>
												<option value="9PM-12AM" <?php echo ($data['scheduled_time'] == "9PM-12AM") ? "selected" : ""; ?>> 9PM - 12AM</option>


											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Vehicle Type</label> <select name="vehicletype" class="form-control">
												<option value="">Select Vehicle Type</option>
												<?php
												$roww = mysqli_query($dbhandle, "select vehicle_category,id from tbl_trucktype");
												while ($fetchh = mysqli_fetch_array($roww)) {
												?>
													<optgroup label="<?php echo $fetchh['vehicle_category']; ?>">
														<?php
														$rowtruck = mysqli_query($dbhandle, "select * from vehicle_list where status = 1 and vehicle_type='" . $fetchh['id'] . "'  order by length asc");
														while ($fetchhh = mysqli_fetch_array($rowtruck)) {
															if ($fetchh['id'] == 2) {
														?>
																<option value="<?php echo $fetchhh['id']; ?>" <?php echo ($data['vehicle_type'] == $fetchhh['id']) ? "selected" : ""; ?>><img src="upload/vechile_image/<?php echo $fetchhh['pimage']; ?>"><?php if ($fetchhh['sub_type'] == '1') {
																																																															echo "Flat Bed - ";
																																																														}
																																																														if ($fetchhh['sub_type'] == '2') {
																																																															echo "Semi Bed - ";
																																																														}
																																																														echo $fetchhh['length']; ?> MT /<?php echo $fetchhh['dimension']; ?></option>
															<?php	} else { ?>
																<option value="<?php echo $fetchhh['id']; ?>" <?php echo ($data['vehicle_type'] == $fetchhh['id']) ? "selected" : ""; ?>><img src="upload/vechile_image/<?php echo $fetchhh['pimage']; ?>"><?php echo $fetchhh['length']; ?> MT /<?php echo $fetchhh['dimension']; ?></option>
														<?php
															}
														} ?>

													</optgroup>

												<?php } ?>

											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Material Type</label>

											<select name="material_type" class="form-control">
												<option>Material Type</option>
												<?php
												$rowww = mysqli_query($dbhandle, "select * from tbl_material");

												while ($fetchhh = mysqli_fetch_array($rowww)) {

												?>

													<option value="<?php echo $fetchhh['material_name']; ?>" <?php
																											echo (isset($_REQUEST['edit_id']) && $fetchhh['material_name'] == $data['material_type'] ? "selected" : "");
																											?>><?php echo $fetchhh['material_name']; ?></option>
												<?php } ?>

											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Weight in Ton</label> <input type="text" value="<?php
																														echo (isset($_REQUEST['edit_id']) ? $data['weight'] : "");
																														?>" name="weight" class="form-control" placeholder="Weight in Ton..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Booking Date</label> <input type="text" name="booking_date" value="<?php
																																			echo (isset($_REQUEST['edit_id']) ? $data['booking_date'] : "");
																																			?>" class="form-control" placeholder="Booking Date..." /> </div>
									</div>
									<div class="with-border">
										<h3 class="box-title">Loading Address</h3>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Pick up Street Adress</label> <input type="text" value="<?php
																																echo (isset($_REQUEST['edit_id']) ? $data['pickup_street'] : "");
																																?>" name="pickup_street" class="form-control" placeholder="Pick up Street Adress..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Pick up City </label> <select name="pickup_city" class="form-control">
												<?php
												$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");
												while ($fetch = mysqli_fetch_array($row)) {
												?>
													<option <?php echo (isset($_REQUEST['edit_id']) && $fetch['id'] == $data['pickup_city'] ? "selected" : "") ?> value="<?php echo $fetch['id']; ?>">
														<?php echo $fetch['city_name']; ?>
													</option>
												<?php } ?>
											</select> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Pick up Pincode</label> <input type="text" value="<?php
																															echo (isset($_REQUEST['edit_id']) ? $data['pickup_pincode'] : "");
																															?>" name="pickup_pincode" class="form-control" placeholder="Pick up Pincode..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Drop up Street Adress</label> <input type="text" value="<?php
																																echo (isset($_REQUEST['edit_id']) ? $data['drop_street'] : "");
																																?>" name="drop_street" class="form-control" placeholder="Drop up Street Adress..." /> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Drop up City </label> <select name="destination_name" class="form-control">
												<?php
												$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");
												while ($fetch = mysqli_fetch_array($row)) {
												?>
													<option <?php echo (isset($_REQUEST['edit_id']) && $fetch['id'] == $data['destination_name'] ? "selected" : "") ?> value="<?php echo $fetch['id']; ?>">
														<?php echo $fetch['city_name']; ?>
													</option>
												<?php } ?>
											</select> </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Drop up Pincode</label> <input type="text" value="<?php
																															echo (isset($_REQUEST['edit_id']) ? $data['drop_pincode'] : "");
																															?>" name="drop_pincode" class="form-control" placeholder="Drop up Pincode..." /> </div>
									</div>
									<div class="with-border">
										<h3 class="box-title">Assign Truck Details</h3>
									</div>
									<div class="col-xs-6">
										<div class="form-group"> <label>Assign Truck</label> <select name="assign_truck" class="form-control select2 truck_assign">
												<option value="">Select Truck</option>

												<?php if ($data['assign_truck'] != "0") { ?>
													<option value="<?php echo $data['assign_truck']; ?>" selected>
														<?php $get_truck_regByLoad = mysqli_query($dbhandle, "
											select p.id,p.truck_id,p.post_truck_id,t.truck_reg_no from tbl_post_truck as p INNER JOIN tbl_trucks as t ON p.truck_id = t.id where p.id='" . $data['assign_truck'] . "' ");
														$reultruck_regByLoad = mysqli_fetch_array($get_truck_regByLoad);
														echo $reultruck_regByLoad['post_truck_id'] . ' (' . $reultruck_regByLoad['truck_reg_no'] . ')'; ?></option>
													<?php } else {
													$truckquery = mysqli_query($dbhandle, "
											select p.id,p.truck_id,p.post_truck_id,t.truck_reg_no from tbl_post_truck as p INNER JOIN tbl_trucks as t ON p.truck_id = t.id where p.status=1 ");
													while ($fetch_truck = mysqli_fetch_array($truckquery)) { ?>
														<option <?php echo (isset($_REQUEST['edit_id']) && $fetch_truck['id'] == $data['assign_truck'] ? "selected" : "") ?> value="<?php echo $fetch_truck['id']; ?>"><?php echo $fetch_truck['post_truck_id'] . ' (' . $fetch_truck['truck_reg_no'] . ')'; ?></option> <?php }
																																																																											} ?>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Assign Driver</label>
											<input type="text" name="asighn_driver" class="form-control asighn_driver" value="<?php echo $data['asighn_driver']; ?>">

										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Driver Mobile No</label>
											<input type="text" name="driver_contact_no" class="form-control driver_contact_no" value="<?php echo $data['driver_contact_no']; ?>">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Assign Truck Message</label>
											<textarea name="message" class="form-control"><?php echo $data['message']; ?></textarea>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label>Truck Amount</label>
											<input type="text" name="amount_truck" class="form-control " value="<?php echo $data['amount_truck']; ?>" placeholder="Enter Price for truck owner">
										</div>
									</div>
									<input type="hidden" name="post_truck_id" id="post_truck_id" value="<?php echo  $data['assign_truck']; ?>">
									<div class="col-xs-12">
										<div class="form-group">&nbsp;
											<hr />
										</div>
									</div>
									<div class="with-border">
										<h3 class="box-title">Payment Status & Document Upload Loader</h3>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Advance Payment Status</label>
											<select name="payment_status" class="form-control select2">
												<option value="">Select Payment Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['payment_status'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="3" <?php echo (isset($_REQUEST['edit_id']) && $data['payment_status'] == '3' ? "selected" : ""); ?>>Confirm</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Advance Payment Receipt</label>
											<input type="file" name="advance_pay_file"> &nbsp;
											<?php if ($data['advance_pay_file'] != "") { ?><a href="<?php echo $path . $data['advance_pay_file']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Payment Message</label>
											<input type="text" name="payment_message" class="form-control" value="<?php echo $data['payment_message']; ?>">
										</div>
									</div>

									<div class="col-xs-6">
										<div class="form-group">
											<label>Document Status</label>
											<select name="document_status" class="form-control select2">
												<option value="">Select Document Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['document_status'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="2" <?php echo (isset($_REQUEST['edit_id']) && $data['document_status'] == '2' ? "selected" : ""); ?>>Processing</option>
												<option value="5" <?php echo (isset($_REQUEST['edit_id']) && $data['document_status'] == '5' ? "selected" : ""); ?>>Checked</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Balance Payment Status</label>
											<select name="bal_payment_status" class="form-control select2">
												<option value="">Select Payment Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['bal_payment_status'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="3" <?php echo (isset($_REQUEST['edit_id']) && $data['bal_payment_status'] == '3' ? "selected" : ""); ?>>Confirm</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Balance Payment Receipt</label>
											<input type="file" name="bal_pay_file"> &nbsp;
											<?php if ($data['bal_pay_file'] != "") { ?><a href="<?php echo $path . $data['bal_pay_file']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label>Upload Lorry Receipt</label>
											<input type="file" name="lorry_file"> &nbsp;
											<?php if ($data['lorry_file'] != "") { ?><a href="<?php echo $path . $data['lorry_file']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="with-border">
										<h3 class="box-title">Loader Document</h3>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Loader Document 1 </label>
											<input type="file" name="file1"> &nbsp;
											<?php if ($data['file1'] != "") { ?><a href="<?php echo $path . $data['file1']; ?>" style="margin:-21px 119px 0px 0px" target="_blank">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Loader Document 2</label>
											<input type="file" name="file2"> &nbsp;
											<?php if ($data['file2'] != "") { ?><a href="<?php echo $path . $data['file2']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Loader Document 3</label>
											<input type="file" name="file3"> &nbsp;
											<?php if ($data['file3'] != "") { ?><a href="<?php echo $path . $data['file3']; ?>" style="margin:-21px 119px 0px 0px" target="_blank">
													<h4>Download File</h4>
												</a><?php } ?>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Loader Document 4</label>
											<input type="file" name="file4"> &nbsp;
											<?php if ($data['file4'] != "") { ?><a href="<?php echo $path . $data['file4']; ?>" style="margin:-21px 119px 0px 0px" target="_blank">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label>Loader Document 5</label>
											<input type="file" name="file5"> &nbsp;
											<?php if ($data['file5'] != "") { ?>
												<a href="<?php echo $path . $data['file5']; ?>" style="margin:-21px 119px 0px 0px" target="_blank">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>

									<div class="with-border">
										<h3 class="box-title">Truck Document</h3>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Advance Payment Status</label>
											<select name="payment_status_t" class="form-control select2">
												<option value="">Select Payment Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['payment_status_t'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="3" <?php echo (isset($_REQUEST['edit_id']) && $data['payment_status_t'] == '3' ? "selected" : ""); ?>>Confirm</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Advance Payment Receipt</label>
											<input type="file" name="advance_pay_file_t"> &nbsp;
											<?php if ($data['advance_pay_file_t'] != "") { ?><a href="<?php echo $path . $data['advance_pay_file_t']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>

									<div class="col-xs-6">
										<div class="form-group">
											<label>Balance Payment Status</label>
											<select name="bal_payment_status_t" class="form-control select2">
												<option value="">Select Payment Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['bal_payment_status_t'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="3" <?php echo (isset($_REQUEST['edit_id']) && $data['bal_payment_status_t'] == '3' ? "selected" : ""); ?>>Confirm</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Balance Payment Receipt</label>
											<input type="file" name="bal_pay_file_t"> &nbsp;
											<?php if ($data['bal_pay_file_t'] != "") { ?><a href="<?php echo $path . $data['bal_pay_file_t']; ?>" target="_blank" style="margin:-21px 119px 0px 0px">
													<h4>Download File</h4>
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Current Status</label>
											<select name="delivery_status" class="form-control select2">
												<option value="">Select Current Status</option>
												<option value="1" <?php echo (isset($_REQUEST['edit_id']) && $data['delivery_status'] == '1' ? "selected" : ""); ?>>Pending</option>
												<option value="6" <?php echo (isset($_REQUEST['edit_id']) && $data['delivery_status'] == '6' ? "selected" : ""); ?>>Ready To Move</option>
												<option value="7" <?php echo (isset($_REQUEST['edit_id']) && $data['delivery_status'] == '7' ? "selected" : ""); ?>>On the Way</option>
												<option value="8" <?php echo (isset($_REQUEST['edit_id']) && $data['delivery_status'] == '8' ? "selected" : ""); ?>>Delivered</option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Status</label>
											<select name="status" class="form-control select2">
												<option value="">Select Status</option>
												<option value="9" <?php echo (isset($_REQUEST['edit_id']) && $data['status'] == '9' ? "selected" : ""); ?>>Cancelled</option>

											</select>
										</div>
									</div>

									<div class="col-xs-12">
										<div style="margen-left:140px;">
											<?php if (!isset($_REQUEST['edit_id'])) { ?>
												<input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
											<?php } else { ?>
												<input type="submit" class="btn btn-success" name="Update" id="Update" value="Update"><?php } ?>
										</div>
									</div>
								</form>
							</div><!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
	</div>
	</div>
	</section>
	</div>
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<script src="dist/js/demo.js"></script>
	<script>
		$(function() {
			$("#datepicker").datepicker({
				changeMonth: true,
				changeYear: true
			});
		});
		$(document).ready(function() {
			$(".truck_assign").change(function() {
				var id = $(this).val();
				var dataString = 'id=' + id;
				$(".asighn_driver").val('');
				$(".driver_contact_no").val('');
				$("#post_truck_id").val('');
				$.ajax({
					type: "POST",
					url: "get_driver_info.php",
					data: dataString,
					dataType: "JSON",
					cache: false,
					success: function(result) {
						$("#post_truck_id").val(result['post_truck_id']);
						$(".asighn_driver").val(result['driver_name']);
						$(".driver_contact_no").val(result['mobile_no']);
					}
				});
			});
		});
	</script>