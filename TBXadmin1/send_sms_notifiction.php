<?php 	
		
		require('../include/textlocal.class.php');
		include('include/config.php');
		$textlocal = new Textlocal('rsrajput77@gmail.com', '140fe236292221b27b18bb592ea57fada68121182e2c3e0555374a3d08b30d14');
		$test = "0";
		$numbers = array('91'.$driver_contact_no);
		$sender = 'ONNWAY';
		$message = 'Your Post Truck id abcsd" has been assigned to Load Id d from DElhi to Gurgaon for Dated 21/12/2017- 6am-3am'; 
		echo $message;
		try {
			$resultsms = $textlocal->sendSms($numbers, $message, $sender);
			$result['sms'] = $resultsms->status;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}

		

 ?>