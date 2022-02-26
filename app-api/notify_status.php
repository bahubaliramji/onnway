<?php
 include('config.php');
if ($_POST['notify_id'] != ""  && is_numeric($_POST['notify_id'])){
        $query = mysql_query("SELECT * FROM tbl_notify WHERE  id = '".$_POST['notify_id']."' and status='0' ");
                if (mysql_num_rows($query) > 0) {
                    $result = mysql_fetch_array($query);
					mysql_query("update tbl_notify set status='1' where id = '".$_POST['notify_id']."' ");
                    $response["is_error"] = false;
                    $response["message"]  = "Status Changed Successfully.";
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid Notify Id.";
                }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>