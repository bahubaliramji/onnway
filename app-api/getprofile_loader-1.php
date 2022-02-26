<?php
include('config.php');
if ($_POST['token_id'] != '') {
    $user_id = checkLoaderToken($_POST['token_id']);
    if ($user_id != "") {
        $query = mysql_query("select * from tbl_loader where id='$user_id'");
        $result = mysql_fetch_assoc($query);
        $response["is_error"]               = false;
        $response["message"]                = "User Details.";
        $response["data"]["name"]           = $result['name'];
        $response["data"]["mb_no"]          = $result['mb_no'];
        $response["data"]["email"]          = $result['email'];
        $response["data"]["loader_type"]   = $result['loader_type'];
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