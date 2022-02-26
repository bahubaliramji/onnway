<?php
session_start();
$conn = mysqli_connect("localhost", "maestcbk_kkully", "Abc123~");
mysqli_select_db($conn,"maestcbk_kully");
mysqli_set_charset($conn,"utf8");
?>



<?php



     
   {
   		
          $g_id= $_REQUEST['g_id'];
		$product_id= $_REQUEST['product_id'];
		$c_id= $_REQUEST['c_id'];
        $address= $_REQUEST['address'];
		$quantity= $_REQUEST['quantity'];
		$price= $_REQUEST['price'];

                 $date= $_REQUEST['date'];
                 $latitude= $_REQUEST['latitude'];
                 $longitude= $_REQUEST['longitude'];
	                 $type= $_REQUEST['type'];
	                 $time= $_REQUEST['time'];
	
	
		  if($g_id== "")
		{
		  $message["result"] = "g_id is empty"; 
		  echo json_encode($message); 
		  die;
		}
		
		 else if($product_id== "")
		{
		  $message["result"] = "product_id is empty"; 
		  echo json_encode($message); 
		  die;
		}
		 else if($c_id== "")
		{
		  $message["result"] = "c_id is empty"; 
		  echo json_encode($message); 
		  die;
		}
		else if($address == "")
		 {
		  $message["result"] = "address is empty"; 
		  echo json_encode($message); 
		  die;
		 }
		 
		 else if($quantity == "")
		 {
		  $message["result"] = "quantity is empty"; 
		  echo json_encode($message); 
		  die;
		 }
		 else if($price == "")
		 {
		  $message["result"] = "price is empty"; 
		  echo json_encode($message); 
		  die;
		 }
              else if($date== "")
		 {
		  $message["result"] = "date is empty"; 
		  echo json_encode($message); 
		  die;
		 }
              else if($type== "")
		 {
		  $message["result"] = "type is empty"; 
		  echo json_encode($message); 
		  die;
		 }
		else
		{  


	       $sql = "INSERT INTO `order`(`g_id`,`product_id`,`c_id`,`address`,`quantity`,`price`,`date`,`latitude`,`longitude`,`type`,`time`) VALUES ('$g_id','$product_id','$c_id','$address','$quantity','$price','$date','$latitude','$longitude','$type','$time')";	   	  
			  $result = mysqli_query($conn,$sql);
			  
			 //$ans  = mysqli_fetch_array($result);
			
			  $mysqli_insert_id =  mysqli_insert_id($conn); 
			
				if($mysqli_insert_id == 0)
				{
				
				$message1234["result"] = "unsuccess"; 
				
				}else
				{
				
				$message1234["order_id"]  = $mysqli_insert_id; 
				$message1234["result"] = "successfully";
$order_id= $mysqli_insert_id;


//-------------------------------------------------------------------------

               $qry1 = "SELECT *  FROM `cooker_signup` where `id`='$c_id'";
		$results1 = mysqli_query($conn,$qry1);
		$rows=mysqli_fetch_array($results1);
		$regId=$rows['regid'];

 $qry_pro = "SELECT *  FROM `product` where `p_id`='$product_id'";
		$results_pro = mysqli_query($conn,$qry_pro);
		$rows_pro=mysqli_fetch_array($results_pro);
		$pro_name=$rows_pro['p_name'];





 error_reporting(-1);
        ini_set('display_errors', 'On');
        require_once __DIR__ . '/firebase.php';
        require_once __DIR__ . '/push.php';
        $firebase = new Firebase();
        $push = new Push();
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';


        $title = "New Order Place";
        $message = $pro_name.";".$order_id;
       /* $regId = "fE0q1dSrYPU:APA91bGyJa_xNn0GrQqTV6W1SK9Xqc9hTvHP-GfqP5BnDQkmQs4FEqnQ3zjC1Fq_qa6DHxDK9gDvBlxaa5rgf2N0GfQimQ7kCwBQiMG_PZQyVeprTKngjDbCf2oCEirP5UBdCh-Wz2La";*/



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
         $response = $firebase->send($regId, $json);
        }



//--------------------------------------------------------------------
 
				  
				}     
		
			 
		echo json_encode($message1234, JSON_UNESCAPED_SLASHES);   
	         die; 		  	  
  }
  }



















        
?>