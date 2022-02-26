


<?php
 error_reporting(-1);
        ini_set('display_errors', 'On');
        require_once __DIR__ . '/firebase.php';
        require_once __DIR__ . '/push.php';
        $firebase = new Firebase();
        $push = new Push();
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';
        $title = $_REQUEST['title'];
        $message = $_REQUEST['message'];
        $regId = $_REQUEST['regId'];
        $push_type = 'individual';
        $push->setTitle($title);
        $push->setMessage($message);
        $push->setImage('');
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
        $json = '';
        $response = '';
        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('global', $json);
        } else if ($push_type == 'individual') {
            $json = $push->getPush();
         echo $response = $firebase->send($regId, $json);
        }
        
?>
       