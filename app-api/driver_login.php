<?php
 include('config.php');
if ($_POST['mobile'] != ""  && is_numeric($_POST['mobile']) && $_POST['otp'] != ""  && is_numeric($_POST['otp'])){
        $query = mysql_query("SELECT * FROM tbl_trucks WHERE  mobile_no = '".$_POST['mobile']."' order by id desc limit 1 ");
                if (mysql_num_rows($query) > 0) {
					$getotp = mysql_query("SELECT mobile,otp FROM otp_driver WHERE mobile = '" . $_POST['mobile'] . "' and status='1' order by id desc limit 1");
					$otp_result = mysql_fetch_assoc($getotp);
					if ($_POST['otp'] == $otp_result['otp'] && $_POST['mobile'] == $otp_result['mobile']) {
						mysql_query("update otp_driver set status='0' WHERE mobile = '" . $_POST['mobile'] . "' ");
						$result = mysql_fetch_array($query);
						$response["is_error"] = false;
						$response["message"]  = "User Logged In Successfully.";
						$response["data"]["id"] = $result['id'];
					} else {
						$response["is_error"] = true;
						$response["message"]  = "Otp is Invalid.Please Try again.";
					}
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid Mobile No.";
                }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>