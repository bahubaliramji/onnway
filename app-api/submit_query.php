<?php
 include('config.php');
if($_POST['name'] != '' && $_POST['email']!=""  && $_POST['mobile']!="" && $_POST['comment']!=""){
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	$newUser=mysql_query("INSERT INTO tbl_contact_us(name,mobile,email,comment) values('$name','$mobile','$email','$comment')");
	$to="onnway.com@gmail.com";
	$subject = "Contact Us Query from onnway.com";
    $from = 'no-reply@onnway.com';
	$body="<table>
		<tr>
			<td>Name</td>
			<td>".$name."</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>".$email."</td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td>".$mobile."</td>
		</tr>
		<tr>
			<td>Comment</td>
			<td>".$comment."</td>
		</tr>
	</table>";
    $headers = "From: " . strip_tags($from) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($to,$subject,$body,$headers);
	$response["is_error"] = false;
	$response["message"] = "Your Query has been Submit Succesfully.";
}else{
	$response["is_error"] = true;
	$response["message"] = "Required parameter type is missing";
}

echo json_encode($response);

?>