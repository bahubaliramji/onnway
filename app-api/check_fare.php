<?php
include('config.php');
session_start();
if(checkRequiredField(array('token_id', 'source', 'source_name', 'destination', 'destination_name', 'vehicletype','materialtype','weight','noofvehicle','scheduled_date','scheduled_time','lat1','lon1','lat2','lon2','distance','actualPrice','price_km','price','pickup_street','pickup_pincode','drop_street','drop_pincode'))) {

	
    $user_id = checkLoaderToken($_POST['token_id']);
    if ($user_id != "") {
       
		$resultB = mysql_query("SELECT id FROM tbl_book_load order by id desc limit 1");
		$rowB = mysql_fetch_array($resultB);
		$booking_id = 'L'.($rowB['id']+1001);
		//$lr_no = 'A'.($rowB['id']+1001);
		
		$source = $_POST['source'];
		$source_name = $_POST['source_name'];
		$destination =	$_POST['destination'];
		$vehicle_type = $_POST['vehicletype'];
		$material_type = $_POST['materialtype'];
		$weight = $_POST['weight'];
		$no_vehicle =  $_POST['noofvehicle'];
		$scheduled_date = $_POST['scheduled_date'];
		$scheduled_time = $_POST['scheduled_time'];
		$lat1 = $_POST['lat1'];
        $lon1 = $_POST['lon1'];
		$lat2 = $_POST['lat2'];
		$lon2 = $_POST['lon2'];
		$actualPrice = $_POST['actualPrice'];
		$price_km = $_POST['price_km'];
		$cost = $_POST['price'];
		$distance = $_POST['distance'];
		
		
		$pickup_street = $_POST['pickup_street'];
		$pickup_city = $_POST['source'];
		$pickup_pincode = $_POST['pickup_pincode'];
		$drop_street = $_POST['drop_street'];
		$destination_name = $_POST['destination'];
		$drop_pincode = $_POST['drop_pincode'];
		$booking_date = date("d-m-Y H:i:s");

	
	$query = mysql_query("INSERT INTO `tbl_book_load` (`id`, `loader_id`, `source`, `destination`, `material_type`, `weight`, `dimension`, `vehicle_type`, `no_vehicle`, `cost`, `scheduled_date`, `scheduled_time`, `post_type`, `distance`, `pickup_street`, `pickup_city`, `pickup_pincode`, `drop_street`, `destination_name`, `drop_pincode`, `booking_id`, `lr_no`, `booking_date`, `confirm_booking_date`, `status`) VALUES (NULL, '".$user_id."', '".$source."', '".$destination."', '".$material_type."', '".$weight."', '', '".$vehicle_type."', '".$no_vehicle."', '".$cost."', '".$scheduled_date."','".$scheduled_time."', '', '".$distance."', '".$pickup_street."', '".$pickup_city."', '".$pickup_pincode."', '".$drop_street."', '".$destination_name."', '".$drop_pincode."', '".$booking_id."', '', '".$booking_date."', '', '1');") ;
	
		if(($_POST["address"])!=""){
			$address = ", address = '".$_POST["address"]."'";
		}else{
			$address = "";
		}
		if(($_POST["city"])!=""){
			$city = ", city = '".$_POST["city"]."'";
		}else{
			$city = "";
		}
		if(($_POST["pincode"])!=""){
			$pincode = ", pincode = '".$_POST["pincode"]."'";
		}else{
			$pincode = "";
		}
		if(($_POST["designation"])!=""){
			$designation = ", designation = '".$_POST["designation"]."'";
		}else{
			$designation = "";
		}
		if(($_POST["landline_no"])!=""){
			$landline_no = ", landline_no = '".$_POST["landline_no"]."'";
		}else{
			$landline_no = "";
		}
		if(($_POST["alt_contact_person"])!=""){
			$alt_contact_person = ", alt_contact_person = '".$_POST["alt_contact_person"]."'";
		}else{
			$alt_contact_person = "";
		}
		if(($_POST["alt_mb_no"])!=""){
			$alt_mb_no = ", alt_mb_no = '".$_POST["alt_mb_no"]."'";
		}else{
			$alt_mb_no = "";
		}
		if(($_POST["company_name"])!=""){
			$company_name = ", company_name = '".$_POST["company_name"]."'";
		}else{
			$company_name = "";
		}
		if(($_POST["gst_no"])!=""){
			$gst_no = ", gst_no = '".$_POST["gst_no"]."'";
		}else{
			$gst_no = "";
		}
		if(($_POST["pan_card_no"])!=""){
			$pan_card_no = ", pan_card_no = '".$_POST["pan_card_no"]."'";
		}else{
			$pan_card_no = "";
		}
		if(($_POST["company_website"])!=""){
			$company_website = ", company_website = '".$_POST["company_website"]."'";
		}else{
			$company_website = "";
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
		if(!empty($_FILES['pan_file']['name'])){
			$pan_file =$_FILES['pan_file']['name'];
			$pan_file = rand().$random_key.'-'.$pan_file;
			$pan_file_tmp = $_FILES['pan_file']['tmp_name'];
			move_uploaded_file($pan_file_tmp,$path.$pan_file);
			$pan_file = ", pan_file = '$pan_file'";
		}else{
			$pan_file = "";
		} 
		
	$update = mysql_query("UPDATE tbl_loader SET status=3 $address $city $pincode $designation $landline_no $alt_contact_person $alt_mb_no $company_name $gst_no $pan_card_no $company_website  $pan_file $gst_file   WHERE id = '".$user_id."'");
		
		
		
        $response["is_error"] = false;
        $response["message"] = "Booking will be confirm within 60 minute according to Truck availbilty at your location.You will receive notification and update through Call/SMS and Email.";
        
    } else {
        $response["is_error"] = true;
        $response["message"]  = "Please Login again.Your Session Has been Expire.";
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>