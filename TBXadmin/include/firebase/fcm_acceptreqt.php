<?php

  //error_reporting(0);

  



 session_start();

define("DB_HOST", "localhost");
define("DB_USER", "maestcbk_lybor");
define("DB_PASSWORD", "Abc123~");
define("DB_DATABASE", "maestcbk_lybor");
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

mysql_select_db(DB_DATABASE);

?>





<?php
        // Enabling error reporting
        
       //---------------------------------------function start------------------------------------------->
        
			
			//------------------------notification start---------------------------------------------
			 
			        
        
        
        
        error_reporting(-1);
        ini_set('display_errors', 'On');

        require_once __DIR__ . '/firebase.php';
        require_once __DIR__ . '/push.php';

        $firebase = new Firebase();
        $push = new Push();
   
        // optional payload
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';
    

    

   

        
/* 
 //get fcm id
           $uid=mysql_query("SELECT * FROM `uniq_table` WHERE `uniq_id`='$uniq_id'");
             $row_u_id=mysql_fetch_array($uid);
             
            $table_no=$row_u_id['table_no']; 
        //end
        */

$title = $_REQUEST['title'];
$message = $_REQUEST['message'];

$user_id=$_REQUEST['user_id'];


           $sel_fcm_id=mysql_query("SELECT * FROM `user_signup` where id='$user_id' ");
             $row_fcm_id=mysql_fetch_array($sel_fcm_id);
        
             
            $fcm_id=$row_fcm_id['fcm_id']; 
          $regId = $fcm_id;

        // notification title
       // $title = isset($_GET['title']) ? $_GET['title'] : '';
        
        // notification message
       // $message = isset($_GET['message']) ? $_GET['message'] : '';
        
        // push type - single user / topic
       // $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
        $push_type = 'individual';
        
        // whether to include to image or not
       // $include_image = isset($_GET['include_image']) ? TRUE : FALSE;


          $push->setUser_id($user_id);
         $push->setTitle($title);
        $push->setMessage($message);
       // $push->setsender($sender_id);
      //  $push->setTitle($reciver_id);
        //if ($include_image) {
           // $push->setImage('http://api.androidhive.info/images/minion.jpg');
       // } else {
          // $push->setImage('');
       // }
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
           // $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
           echo $response = $firebase->send($regId, $json);
          }
        
 
			
			
			//--------------------------notification starts---------------------------------------------
		/*	
			
		$sqls="INSERT INTO `notification`( `w_id`, `title`, `message`, `table_no`) VALUES ('$waiter_id','$title','$message','$table_no')";
		mysql_query($sqls);	
			
				  	  
  
        
        
        
        
        
        
        //----------------------------------------notification  end---------------------------------------------->*/
        
        
        
        

        
        
        
        ?>
       