<?php
include('config.php');
if ($_POST['token_id'] != '') {
    $user_id = checkLoaderToken($_POST['token_id']);
    if ($user_id != "") {
        $query = mysql_query("select * from tbl_loader where id='$user_id'");
        $result = mysql_fetch_assoc($query);
        $response["is_error"] = false;
        $response["message"] = "User Details.";
        $response["data"]["address"] = $result['address'];
        $response["data"]["city"] = $result['city'];
        $response["data"]["pincode"] = $result['pincode'];
        $response["data"]["designation"] = $result['designation'];
        $response["data"]["landline_no"] = $result['landline_no'];
        $response["data"]["alt_contact_person"] = $result['alt_contact_person'];
        $response["data"]["alt_mb_no"] = $result['alt_mb_no'];
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