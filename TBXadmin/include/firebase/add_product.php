<?php
     include('../config.php');
			
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
//$regId = $_REQUEST['regId'];


        // notification title
       // $title = isset($_GET['title']) ? $_GET['title'] : '';
        
        // notification message
       // $message = isset($_GET['message']) ? $_GET['message'] : '';
        
        // push type - single user / topic
       // $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
        $push_type = 'individual';
        
        // whether to include to image or not
       // $include_image = isset($_GET['include_image']) ? TRUE : FALSE;


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


//--------------------------start----------------------------


$resa=mysqli_query($conn,"SELECT * FROM `private_signup` WHERE `type`='private'");
if(mysqli_num_rows($resa)>0){
while($rowa=mysqli_fetch_array($resa)){
 



//-------------------------------end---------------------------
           echo $response = $firebase->send($rowa['regid'], $json);


} }else{
echo mysqli_error();
}


          }
        
        
			
			
			//--------------------------notification starts---------------------------------------------
			
			
		/*$sqls="INSERT INTO `notification`( `w_id`, `title`, `message`, `table_no`) VALUES ('$waiter_id','$title','$message','$table_no')";
		mysqli_query($conn,$sqls);*/	
			
				  	  
  
        
        
        
        
        
        
        //----------------------------------------notification  end---------------------------------------------->
        
        
        
        

        
        
        
        ?>
 