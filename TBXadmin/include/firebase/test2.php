<?php

  //error_reporting(0);

  

/**
 * Database config variables
 session_start();

define("DB_HOST", "localhost");
define("DB_USER", "maestcbk_myshare");
define("DB_PASSWORD", "Abc123~");
define("DB_DATABASE", "maestcbk_myshare");
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

mysql_select_db(DB_DATABASE);

*/
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
    



$title = $_REQUEST['title'];
$message = $_REQUEST['message'];
$fcmgroup= $_REQUEST['fcmgroup'];

$fcmgroup = json_decode($fcmgroup, true);
                
                 foreach ($fcmgroup as $key => $value)
                  {
                   
                   
       $regId = $value['fcmid'];
       
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
           // $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
           echo $response = $firebase->send($regId, $json);
          }
        
        
}			
			
			//--------------------------notification starts---------------------------------------------
		/*	
			
		$sqls="INSERT INTO `notification`( `w_id`, `title`, `message`, `table_no`) VALUES ('$waiter_id','$title','$message','$table_no')";
		mysql_query($sqls);	
			
				  	  
  
        
        
        
        
        
        
        //----------------------------------------notification  end---------------------------------------------->*/
        
        
        
        

        
        
        
        ?>
       