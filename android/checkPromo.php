<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

$promo = $_POST['promo'];
$user_id = $_POST['user_id'];



$fpromo = mysqli_query($dbhandle, "SELECT * FROM promo WHERE code = '$promo' AND (user_id = '$user_id' OR user_id = '0')");

$pcount = mysqli_num_rows($fpromo);

if ($pcount > 0) {
	$pdata = mysqli_fetch_array($fpromo);
	$pid = $pdata['id'];
	$plim = $pdata['uses'];
	$expiry_date = $pdata['expiry_date']; 
	$today = date("Y-m-d");

	if ($today <= $expiry_date) {
		$cpromo = mysqli_query($dbhandle, "SELECT * FROM orders WHERE promo_code = '$pid' AND user_id = '$user_id' AND status != 'cancelled'");
		$ccount = mysqli_num_rows($cpromo);


		if ($ccount < $plim) {
			$sp = array(
				"discount" => $pdata['discount'],
				"pid" => $pdata['id'],
			);

			$post_data = array(
				"status" => '1',
				"message" => 'PROMO Code applied successfully',
				"data" => $sp
			);


			$post_data = json_encode($post_data);

			echo $post_data;
		} else {
			$post_data = array(
				"status" => '0',
				"message" => "You have already used this PROMO Code",
				"data" => (object)array()
			);


			$post_data = json_encode($post_data);

			echo $post_data;
		}
	} else {
		$post_data = array(
			"status" => '0',
			"message" => "This Promo Code has expired",
			"data" => (object)array()
		);
		$post_data = json_encode($post_data);

			echo $post_data;
	}
} else {
	$post_data = array(
		"status" => '0',
		"message" => "Invalid PROMO Code",
		"data" => (object)array()
	);


	$post_data = json_encode($post_data);

	echo $post_data;
}
