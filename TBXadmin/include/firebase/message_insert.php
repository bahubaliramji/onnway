<?php

  //error_reporting(0);

  session_start();

/**
 * Database config variables
 */

define("DB_HOST", "localhost");
define("DB_USER", "maestcbk_ranger");
define("DB_PASSWORD", "Abc123~");
define("DB_DATABASE", "maestcbk_ranger");
$conn = mysqli_connect("localhost", "maestcbk_ranger", "Abc123~");
mysqli_select_db($conn,"maestcbk_ranger");


?>

        <?php
        
        
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

             //--------------------- start inserts----------------------------
                $sender_id  = $_REQUEST['sender_id'];
		        $reciver_id = 'A1';
		        $msg= $_REQUEST['message'];
		 
              //--------------------end message inserts-----------------------------
			  
               $sel_fcm_id=mysqli_query($conn,"SELECT * FROM `signup` WHERE `id`='$sender_id'");
              $row_fcm_id=mysqli_fetch_array($sel_fcm_id);
              //$fcm_id=$row_fcm_id['fcm_id']; 
              $country=$row_fcm_id['country']; 
              $city=$row_fcm_id['city'];
			  
			 
			 //--------------------- start loop----------------------------
                
		 $fetch = mysqli_query($conn,"SELECT * FROM `signup`"); 

		while ($row = mysqli_fetch_array($fetch))
			 {
				 
				
				   $fcm_id=$row['fcm_id']; 
                  $fname=$row['fname']; 
                  $lname=$row['lname'];
				 
	      $title = 'New Message';
          $message = $msg;
          $regId = $fcm_id;


      
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
            $response = $firebase->send($regId, $json);
          }
        
				
				
				
				
				
				
 
			 }
              //--------------------end loop-----------------------------
			  


	//--------------------------notification starts---------------------------------------------
		if($msg=="")
		{
		$message["result"] = "message is empty"; 
		echo json_encode($message);
		}
		else if($sender_id=="")
		{
		$message["result"] = "sender id is empty"; 
		echo json_encode($message);
		}
		else
		{
		//$msg=preg_replace("/[^\x{4e00}-\x{9fa5}]+/u", '', $msg);
		
		
		//$msg='??';
		 $qry = "SELECT count(chat_user_id) as count  FROM `chat_user` where sender_id ='$sender_id' and reciver_id='$reciver_id'";
		$results = mysqli_query($conn,$qry);
		$counts=mysqli_fetch_array($results);
		$counts=$counts['count'];
		
		if($counts==0)
                  {
                 $qry1 = "SELECT *  FROM `signup` where id='$reciver_id'";
		$results1 = mysqli_query($conn,$qry1);
		$rows=mysqli_fetch_array($results1);
		$full_name=$rows['full_name'];
        //$image=$rows['image'];
                  
                   $qrys = "INSERT INTO `chat_user`(`sender_id`, `reciver_id`,`reciver_name`,`reciver_image`) VALUES ('$sender_id','$reciver_id','$full_name','$full_name')";
		$resultss = mysqli_query($conn,$qrys);
                  }
                		
		
		// Get image string posted from Android App
		$base=$_REQUEST['image'];
		// Get file name posted from Android App
		$filename = $_REQUEST['filename'];
	
	 
		if($filename != "")
		 {
        // Decode Image
		$binary=base64_decode($base);
		header('Content-Type: bitmap; charset=utf-8');
		// Images will be saved under 'www/imgupload/uplodedimages' folder
		$file = fopen('message_image/'.$filename, 'wb');
		// Create File
		fwrite($file, $binary);
		fclose($file);
	   // echo 'successs device Image upload complete, Please check your php file directory';
	
		 }
		
		
		$ww = date('Y-m-d'); 
	 	
		
		 //"Original Time: ". date("h:i")."\n". date_default_timezone_set('Asia/Kolkata');
         $ab = date("h:i");
		
		
		$msgs=utf8_encode($msg);
		
	       $sql = "INSERT INTO `message` (`sender_id`,`reciver_id`,`message`,`message_image`,`date`,`time`,`country`,`city`) VALUES ('$sender_id','$reciver_id','$msgs','$filename','$ww','$ab','$country','$city')";
   	  
		  $result = mysqli_query($conn,$sql);
		  
		
		  $mysqli_insert_id =  mysqli_insert_id($conn); 
		
			if($mysqli_insert_id == 0)
			{
			
			$message1["result"] = "unsuccess"; 
			
			}else
			{
		 	
		 	$message1["m_id"]  = $mysqli_insert_id; 
		 	$message1["msg"]  = $msg; 
			$message1["result"] = "success"; 	  
			}     
			 
			 
			
			 echo json_encode($message1,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);   
	        // die; 
		}			 
	
        
   //----------------------------------------notification  end---------------------------------------------->
       ?>
       