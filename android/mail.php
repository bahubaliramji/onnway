<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
 
$htmlbody = '<p>Dear Sir/Madam, </p>

<p>Thank you for choosing Onnway.com, We have received your Loading Confirm with the Order ID: L001. </p>

<p>This is not a booking confirmation and you’ll have to wait for truck assign. Your booking will be confirmed within 60 minutes according to truck availability at your location. You will receive updates through Call/SMS and Email. </p>

<p>Please refer your loading details below: </p>

<table border="1" data-table data-tablelook="1184" style="width: 50%;margin-left: auto;margin-right: auto;"><tbody ><tr role="row" ><td role="rowheader" data-celllook="16" ><p>Source </p></td>
<td role="columnheader" data-celllook="4096" ><p>delhi </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Destination </p></td>
<td data-celllook="4096" ><p>Mumbai </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Vehicle Type </p></td>
<td data-celllook="4096" ><p>Open Truck </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Fare </p></td>
<td data-celllook="4096" ><p>1500 </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Material Type </p></td>
<td data-celllook="4096" ><p>Wood </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Scheduled Date </p></td>
<td data-celllook="4096" ><p>12-Jan-2021 </p></td>
</tr>

<tr role="row" ><td role="rowheader" data-celllook="16" ><p>Load Type </p></td>
<td data-celllook="4096" ><p>FULL </p></td>
</tr>

</tbody>
</table>

<p>If you have any questions regarding this enquiry or any other service, then please contact us. Our phone number is +91 91111 92233, +91 91111 92244 and our Email is <a href="mailto:support@onnway.com" target="_blank" rel="noreferrer noopener" >support@onnway.com</a>. For terms and conditions visit <a href="http://www.onnway.com/" target="_blank" rel="noreferrer noopener" >www.onnway.com</a> . </p>

<p>Your sincerely, </p>

<p>Onnway.com </p>

<p>KEDSONS TECHNOLOGIES </p>
';

//print_r($htmlbody);

$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtpout.secureserver.net';
    $mail->SMTPAuth = true;
	$mail->Username = 'mukulraw@mrtecks.com';
    $mail->Password = 'Zedistark1@';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
 
    $mail->setFrom('support@onnway.com', 'Admin');
    $mail->addAddress('mukulraw199517@gmail.com', 'MRTecks');
    
 
    //Attachments
 
    //Content
    $mail->isHTML(true); 
    $mail->Subject = 'New Enquiry on MRTecks';
    $mail->Body    = $htmlbody;
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>