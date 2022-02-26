<?php
@session_start();


//add item in shopping cart




    //$tour_id=$_POST['tour_id'];
	//$user_id=$_POST['user_id'];
	//$user_type=$_POST['user_type'];
	//$departure_from=$_POST['departure_from'];
	//$tour_date=$_POST['tour_date'];
	//$rooms=$_POST['rooms'];
	//$book_date = date('y:m:d h:m:s');

    //$room_no = $_POST['room_no'][$n];
	//$adult = $_POST['adult'][$n];
	//$child = $_POST['child'][$n];
	//$child1_age = $_POST['child1_age'][$n];
	//$child1_bed = $_POST['child1_bed'][$n];
	//$child2_age = $_POST['child2_age'][$n];
	//$child2_bed = $_POST['child2_bed'][$n];
	//$child3_age = $_POST['child3_age'][$n];
	//$child3_bed = $_POST['child3_bed'][$n];



	//$url = $_POST['url'];
	$cruise_id 	= filter_var($_POST["cruise_id"]); 
	$qty 	= 1; 
	$user_id 	= filter_var($_SESSION['user_id']); 
	$user_type 	= filter_var($_SESSION['user_type']); 
	$departure_from 	= filter_var($_POST["departure_from"]); 
	$tour_date 	= filter_var($_POST["tour_date"]); 
	$rooms 	= filter_var($_POST["rooms"]); 
	$book_date 	= filter_var($_POST["book_date"]); 
	
	$room_no = $_POST['room_no'];
	$adult = $_POST['adult'];
	$child = $_POST['child'];
	$child1_age = $_POST['child1_age'];
	$child1_bed = $_POST['child1_bed'];
	$child2_age = $_POST['child2_age'];
	$child2_bed = $_POST['child2_bed'];
	$child3_age = $_POST['child3_age'];
	$child3_bed = $_POST['child3_bed'];
//print_r($room_no);die;
		
	
	
	
	
		
		//prepare array for the session variable
		$new_product = array(array('tour_id'=>$tour_id,'qty'=>$qty, 'user_id'=>$user_id,'user_type'=>$user_type,'departure_from'=>$departure_from,'tour_date'=>$tour_date,'rooms'=>$rooms, 'book_date'=>$book_date, 'room_no'=>$room_no, 'adult'=>$adult, 'child'=>$child, 'child1_age'=>$child1_age, 'child1_bed'=>$child1_bed, 'child2_age'=>$child2_age, 'child2_bed'=>$child2_bed, 'child3_age'=>$child3_age, 'child3_bed'=>$child3_bed));
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["tour_id"] == $tour_id) { //the item exist in array
					$qty = 1; //increase the quantity
					//$product[] = array('tour_id'=>$cart_itm["tour_id"], 'qty'=>$qty);
					$product[] = array('tour_id'=>$cart_itm["tour_id"], 'qty'=>$qty,'user_id'=>$cart_itm["user_id"],'user_type'=>$cart_itm["user_type"],'departure_from'=>$cart_itm["departure_from"],'tour_date'=>$cart_itm["tour_date"],'rooms'=>$cart_itm["rooms"],'book_date'=>$cart_itm["book_date"],'room_no'=>$cart_itm["room_no"],'adult'=>$cart_itm["adult"],'child'=>$cart_itm["child"],'child1_age'=>$cart_itm["child1_age"],'child1_bed'=>$cart_itm["child1_bed"],'child2_age'=>$cart_itm["child2_age"],'child2_bed'=>$cart_itm["child2_bed"],'child3_age'=>$cart_itm["child3_age"],'child3_bed'=>$cart_itm["child3_bed"]);
					$found = true;
					
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('tour_id'=>$cart_itm["tour_id"],'qty'=>$cart_itm["qty"],'user_type'=>$cart_itm["user_type"],'departure_from'=>$cart_itm["departure_from"],'user_id'=>$cart_itm["user_id"],'tour_date'=>$cart_itm["tour_date"],'rooms'=>$cart_itm["rooms"],'book_date'=>$cart_itm["book_date"],'room_no'=>$cart_itm["room_no"],'adult'=>$cart_itm["adult"],'child'=>$cart_itm["child"],'child1_age'=>$cart_itm["child1_age"],'child1_bed'=>$cart_itm["child1_bed"],'child2_age'=>$cart_itm["child2_age"],'child2_bed'=>$cart_itm["child2_bed"],'child3_age'=>$cart_itm["child3_age"],'child3_bed'=>$cart_itm["child3_bed"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
		
	
	
	//redirect back to original page
//header('Location:cart_tour.php');


if($_SESSION['user_id']!=''){
header('Location:cruise_checkout.php');
} else {
header('Location:login_booking.php');	
}?>


