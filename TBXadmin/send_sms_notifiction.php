<?php 	
		
		require('../include/textlocal.class.php');
		include('include/config.php');
		$textlocal = new Textlocal('rsrajput77@gmail.com', '76582b55a18a37112d0f8277a9cff84b2c086a826ad2375a026475870e9a6835');
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