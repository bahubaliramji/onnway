<?php
 include('config.php');
if ($_POST['email'] != "" && $_POST['password'] && $_POST['user_type'] != ""){
        if ($_POST['user_type'] == "vehicle_owner") {
                $query = mysql_query("SELECT * FROM tbl_vehicle_owner WHERE (email = '".$_POST['email']."' or mb_no = '".$_POST['email']."' ) AND BINARY password = '".$_POST['password']."' ");
                if (mysql_num_rows($query) > 0) {
					$token = rand().md5(rand().uniqid('', true));
                    $result = mysql_fetch_array($query);
					$update = mysql_query("update tbl_vehicle_owner set token='$token' where vehicle_owner_id='".$result['vehicle_owner_id']."'");
                    $response["is_error"] = false;
                    $response["message"]  = "User Logged In Successfully.";
					$response["data"]["token_id"] = $token;
					$response["data"]["name"] = $result['name'];
					$response["data"]["last_name"] = $result['last_name'];
					$response["data"]["email"] = $result['email'];
					$response["data"]["mb_no"] = $result['mb_no'];
					$response["data"]["vehicle_owner_type"] = $result['vehicle_owner_type'];
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid User Id or Password.";
                }
            
        } elseif ($_POST['user_type'] == "loader") {
                $query = mysql_query("SELECT * FROM tbl_loader WHERE (email = '".$_POST['email']."' or mb_no = '".$_POST['email']."' ) AND BINARY password = '".$_POST['password']."' ");
                if (mysql_num_rows($query) > 0) {
					$token = rand().md5(rand().uniqid('', true)); 
                    $result = mysql_fetch_array($query);
					$update = mysql_query("update tbl_loader set token='$token' where id='".$result['id']."'");
                    $response["is_error"] = false;
                    $response["message"]  = "User Logged In Successfully.";
					$response["data"]["token_id"] = $token;
					$response["data"]["name"] = $result['name'];
					$response["data"]["last_name"] = "";
					$response["data"]["email"] = $result['email'];
					$response["data"]["mb_no"] = $result['mb_no'];
					$response["data"]["vehicle_owner_type"] = $result['loader_type'];
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid User Id or Password.";
                }
            
        } else {
            $response["is_error"] = true;
            $response["message"]  = "Required parameter user type is missing";
        }

} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>