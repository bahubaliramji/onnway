<?php
include('config.php');
if ($_POST['token_id'] != '' && $_POST['old_pass'] != "" && $_POST['new_pass'] && $_POST['re_pass'] != "" && $_POST['user_type'] != "") {
    if ($_POST['new_pass'] == $_POST['re_pass']) {
        if ($_POST['user_type'] == "vehicle_owner") {
            $user_id = checkUserToken($_POST['token_id']);
            if ($user_id != "") {
                $query = mysql_query("SELECT vehicle_owner_id FROM tbl_vehicle_owner WHERE vehicle_owner_id = '$user_id' AND BINARY password = '" . $_POST['old_pass'] . "'");
                if (mysql_num_rows($query) > 0) {
                    $update               = mysql_query("UPDATE tbl_vehicle_owner SET password = '" . $_POST['new_pass'] . "' WHERE vehicle_owner_id = '$user_id'");
                    $response["is_error"] = false;
                    $response["message"]  = "Password Changed Successfully.";
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid Old Password.";
                }
            } else {
                $response["is_error"] = true;
                $response["message"]  = "Please Login again.Your Session Has been Expire.";
            }
        } elseif ($_POST['user_type'] == "loader") {
            $user_id = checkLoaderToken($_POST['token_id']);
            if ($user_id != "") {
                $query = mysql_query("SELECT id FROM tbl_loader WHERE id = '$user_id' AND BINARY password = '" . $_POST['old_pass'] . "'");
                if (mysql_num_rows($query) > 0) {
                    $update               = mysql_query("UPDATE tbl_loader SET password = '" . $_POST['new_pass'] . "' WHERE id = '$user_id'");
                    $response["is_error"] = false;
                    $response["message"]  = "Password Changed Successfully.";
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid Old Password.";
                }
            } else {
                $response["is_error"] = true;
                $response["message"]  = "Please Login again.Your Session Has been Expire.";
            }
        } else {
            $response["is_error"] = true;
            $response["message"]  = "Required parameter user type is missing";
        }
    } else {
        $response["is_error"] = true;
        $response["message"]  = "New Password and Re Password are not same";
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>