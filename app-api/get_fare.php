<?php
include('config.php');
session_start();
if ($_POST['token_id'] != '' && $_POST["source"] != '' && $_POST["destination"] != '' && $_POST["vehicletype"] != '' && $_POST["materialtype"] != '' && $_POST["weight"] != '' && $_POST["scheduled_date"] != '' && $_POST["scheduled_time"] != '') {
    $user_id = checkLoaderToken($_POST['token_id']);
    if ($user_id != "") {
		
	$_POST["no_of_vehicle"]=1;
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $vehicletype = $_POST["vehicletype"];
    $materialtype = $_POST["materialtype"];
    $weight = $_POST["weight"];
    $noofvehicle = $_POST["no_of_vehicle"];
    $scheduled_date = $_POST["scheduled_date"];
    $scheduled_time = $_POST["scheduled_time"];


	$queryS = mysql_query("select * from tbl_city where id= '$source'");
	$dataS = mysql_fetch_array($queryS);
    
	$queryD = mysql_query("select * from tbl_city where id= '$destination'");
	$dataD = mysql_fetch_array($queryD);

	$queryV = mysql_query("select * from vehicle_list where id= '$vehicletype'");
	$dataV = mysql_fetch_array($queryV);

	$price_km = $dataV['price_km'] ;


    $city_category = $dataS['category_id'];
    $lat1 = $dataS['latitude'];
    $lon1 = $dataS['longitude'];
    $city_categoryy = $dataD['category_id'];
    $lat2 = $dataD['latitude'];
    $lon2 = $dataD['longitude'];
		
	$source_name = $dataS["city_name"];
    $destination_name = $dataD["city_name"];


 /*echo $distance = ceil((3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180)*1.60934); */
 
  $url = "https://maps.googleapis.com/maps/api/distancematrix/xml?units=metrix&origins=$lat1,$lon1&destinations=$lat2,$lon2&key=AIzaSyBHB5GcUC772610OcgShgcCSYSmsm6N6PY";
	$ch = curl_init();
	$URI = $url;
	curl_setopt($ch, CURLOPT_URL, $URI);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								
	// Make request
	
	$data = curl_exec($ch);
	curl_close($ch); 
	$xml = simplexml_load_string($data);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	$distance = ceil($array['row']['element']['distance']['value']/1000) ;
	$actualPrice = $noofvehicle*$distance*$price_km;  
	
   /////////////////////////////////////////////////////////////

   
	if($city_category=='1' && $city_categoryy=='1'){
		$price= $actualPrice ;
	}else if($city_category=='1' && $city_categoryy=='2'){
		$price= $actualPrice +(10/100*$actualPrice);
	}else if($city_category=='1' && $city_categoryy=='3'){
		$price= $actualPrice +(30/100*$actualPrice);
	}elseif($city_category=='1' && $city_categoryy=='4'){
		$price= $actualPrice +(40/100*$actualPrice);
	}
	elseif($city_category=='2' && $city_categoryy=='1'){
		$price= $actualPrice ;
	}else if($city_category=='2' && $city_categoryy=='2'){
		$price= $actualPrice +(10/100*$actualPrice);
	}else if($city_category=='2' && $city_categoryy=='3'){
		$price= $actualPrice +(30/100*$actualPrice);
	}elseif($city_category=='2' && $city_categoryy=='4'){
		$price= $actualPrice +(40/100*$actualPrice);
	}elseif($city_category=='3' && $city_categoryy=='1'){
		$price= $actualPrice ;
	}else if($city_category=='3' && $city_categoryy=='2'){
		$price= $actualPrice +(10/100*$actualPrice);
	}else if($city_category=='3' && $city_categoryy=='3'){
		$price= $actualPrice +(30/100*$actualPrice);
	}elseif($city_category=='3' && $city_categoryy=='4'){
		$price= $actualPrice +(40/100*$actualPrice);
	}elseif($city_category=='4' && $city_categoryy=='1'){
		$price= $actualPrice ;
	}else if($city_category=='4' && $city_categoryy=='2'){
		$price= $actualPrice +(10/100*$actualPrice);
	}else if($city_category=='4' && $city_categoryy=='3'){
		$price= $actualPrice +(30/100*$actualPrice);
	}elseif($city_category=='4' && $city_categoryy=='4'){
		$price= $actualPrice +(40/100*$actualPrice);
	}

	$_SESSION['source'] = $_POST["source"];
	$_SESSION['source_name'] = $dataS["city_name"];
    $_SESSION['destination'] = $_POST["destination"];
    $_SESSION['destination_name'] = $dataD["city_name"];
    $_SESSION['vehicletype'] = $_POST["vehicletype"];
    $_SESSION['materialtype'] = $_POST["materialtype"];
    $_SESSION['weight'] = $_POST["weight"];
    $_SESSION['noofvehicle'] = $_POST["no_of_vehicle"];
    $_SESSION['scheduled_date'] = $_POST["scheduled_date"];
    $_SESSION['scheduled_time'] = $_POST["scheduled_time"];
	$_SESSION['lat1'] = $dataS['latitude'];
    $_SESSION['lon1'] = $dataS['longitude'];
    $_SESSION['lat2']= $dataD['latitude'];
    $_SESSION['lon2'] = $dataD['longitude'];
    $_SESSION['distance'] = $distance ;
    $_SESSION['actualPrice'] = $actualPrice;
    $_SESSION['price_km'] = $price_km ;
    $_SESSION['price'] = $price;
	
	/* */
	$query = mysql_query("INSERT INTO `tbl_post_load_enq` (`id`, `user_id`,  `sourse`, `destination`, `vihicle_type`, `material_type`, `weight`, `qty`, `schedule_date`, `scheduled_time`,`status`) VALUES (NULL, '".$user_id."', '".$_SESSION['source_name']."', '".$_SESSION['destination_name']."', '".$_SESSION['vehicletype']."', '".$_SESSION['materialtype']."', '".$_SESSION['weight']."', '".$_SESSION['noofvehicle']."', '".$_SESSION['scheduled_date']."', '".$_SESSION['scheduled_time']."','1')") ;
		
		
        $response["is_error"]               = false;
        $response["message"]                = "Fare Details.";
        $response["data"]['source'] = $_POST["source"];
		$response["data"]['source_name'] = $dataS["city_name"];
		$response["data"]['destination'] = $_POST["destination"];
		$response["data"]['destination_name'] = $dataD["city_name"];
		$response["data"]['vehicletype'] = $_POST["vehicletype"];
		$response["data"]['materialtype'] = $_POST["materialtype"];
		$response["data"]['weight'] = $_POST["weight"];
		$response["data"]['noofvehicle'] = $_POST["no_of_vehicle"];
		$response["data"]['scheduled_date'] = $_POST["scheduled_date"];
		$response["data"]['scheduled_time'] = $_POST["scheduled_time"];
		$response["data"]['lat1'] = $dataS['latitude'];
		$response["data"]['lon1'] = $dataS['longitude'];
		$response["data"]['lat2']= $dataD['latitude'];
		$response["data"]['lon2'] = $dataD['longitude'];
		$response["data"]['distance'] = $distance ;
		$response["data"]['actualPrice'] = $actualPrice;
		$response["data"]['price_km'] = $price_km ;
		$response["data"]['price'] = $price;
    } else {
        $response["is_error"] = true;
        $response["message"]  = "Please Login again.Your Session Has been Expire.";
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>