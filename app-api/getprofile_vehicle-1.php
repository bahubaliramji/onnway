<?php
/*
$jsonResponse = array("profile_vehicle1"=>array());
$query = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$pid'");
if (mysql_num_rows($query) > 0){
while($data = mysql_fetch_array($query)){	
$comp_details= array(
'id' => $data['vehicle_owner_id'],
'name' => $data['name'],
'vehicle_owner_type' => $data['vehicle_type'],
'email' => $data['email'],
);
array_push($jsonResponse['profile_vehicle1'],$comp_details);
}echo json_encode($jsonResponse);   
} */ 
include('config.php');
if ($_POST['token_id'] != '') {
    $user_id = checkUserToken($_POST['token_id']);
    if ($user_id != "") {
        $query                              = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$user_id'");
        $result                             = mysql_fetch_assoc($query);
        $response["is_error"]               = false;
        $response["message"]                = "User Details.";
        $response["data"]["name"]           = $result['name'];
        $response["data"]["last_name"]      = $result['last_name'];
        $response["data"]["aadhar_no"]      = $result['aadhar_no'];
        $response["data"]["mb_no"]          = $result['mb_no'];
        $response["data"]["email"]          = $result['email'];
        $response["data"]["vehicle_owner_type"]   = $result['vehicle_owner_type'];
        $response["data"]["transport_name"] = $result['transport_name'];
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