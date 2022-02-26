<?php
include('config.php');
if ($_POST['token_id'] != '') {
    $user_id = checkLoaderToken($_POST['token_id']);
    if ($user_id != "") {
        $query = mysql_query("select * from tbl_loader where id='$user_id'");
        $result = mysql_fetch_assoc($query);
        $response["is_error"] = false;
        $response["message"] = "User Details.";
		$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/documents/";
        $response["data"]["company_name"] = $result['company_name'];
        $response["data"]["pan_card_no"] = $result['pan_card_no'];
        $response["data"]["gst_no"] = $result['gst_no'];
        $response["data"]["company_website"] = $result['company_website'];
        $response["data"]["gst_file"] = $result['gst_file'];
        $response["data"]["pan_file"] = $result['pan_file'];
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