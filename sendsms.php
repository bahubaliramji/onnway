<?php
require('include/textlocal.class.php');

$textlocal = new Textlocal('rsrajput77@gmail.com', 'e067d4d0d964e955403a5a522efc6bf742fd47406b145e9350158e423a888573');

$numbers = array(91XXXXXXXXX);
$sender = 'TXTLCL';
$message = 'This is a message';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
	echo $result[0]->status'];
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>