<?php
   include('config.php');
	$user_id = $_POST["user_id"];
  $source = $_POST["source"];
   $material = $_POST["material"];
   $weight = $_POST["weight"];
   $destination = $_POST["destination"];
  // $distance = $_POST["distance"];
   $vehicletype = $_POST["vehicletype"];
   $noofvehicle = $_POST["no_of_vehicle"];
   $scheduleddate = $_POST["scheduleddate"];
  // $status= "active";

   //////////////////////////////////////////////////////////////////////////////////////////////////////////


 
#Find latitude and longitude
 
/*$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$source";
$json_data = file_get_contents($url);
$result = json_decode($json_data, TRUE);
$latitude1 = $result['results'][0]['geometry']['location']['lat'];
$longitude1 = $result['results'][0]['geometry']['location']['lng'];


$urll = "http://maps.googleapis.com/maps/api/geocode/json?address=$destination";
$json_dataa = file_get_contents($urll);
$resultt = json_decode($json_dataa, TRUE);
$latitude2 = $resultt['results'][0]['geometry']['location']['lat'];
$longitude2 = $resultt['results'][0]['geometry']['location']['lng'];


function get_meters_between_points($latitude1, $longitude1, $latitude2, $longitude2) {
  if (($latitude == $latitude2) && ($longitude1 == $longitude2)) { return 0; } // distance is zero because they're the same point
  $p1 = deg2rad($latitude1);
  $p2 = deg2rad($latitude2);
  $dp = deg2rad($latitude2 - $latitude1);
  $dl = deg2rad($longitude2 - $longitude1);
  $a = (sin($dp/2) * sin($dp/2)) + (cos($p1) * cos($p2) * sin($dl/2) * sin($dl/2));
  $c = 2 * atan2(sqrt($a),sqrt(1-$a));
  $r = 6371008; // Earth's average radius, in meters
  $d = $r * $c;
  return $d; // distance, in meters
} */

$query = mysql_query("select * from tbl_city where city_name= '$source'");

$data = mysql_fetch_array($query);
    
$queryy = mysql_query("select * from tbl_city where city_name= '$destination'");

$dataa = mysql_fetch_array($queryy);
        $city_category = $data['category_id'];
        $lat1 = $data['latitude'];
        $lon1 = $data['longitude'];
 $city_categoryy = $dataa['category_id'];
         $lat2 = $dataa['latitude'];
        $lon2 = $dataa['longitude'];
/*$lat1 = 46.2341938036161; 
$lon1 = -63.124778021257015; 

$lat2 = 46.4141938036161; 
$lon2 = -63.118571124705284; */

$distance = (3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180);

//print($distance);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	$jsonResponse = array("post_load"=>array());
		$query = mysql_query("Insert INTO tbl_book_load(loader_id,source,destination,material_type,weight,vehicle_type
			,scheduled_date)VALUE('".$user_id."','".$source."','".$destination."','".$material."','".$weight."','".$vehicletype."','".$scheduleddate."')"); 
if($city_category=='1' && $city_categoryy=='1'){

if($vehicletype=='truck'){
$price= $noofvehicle*$distance*25;
}
else if($vehicletype=='trailer'){
$price= $noofvehicle*$distance*30;
}
else
{
  $price= $noofvehicle*$distance*35;

}

}else if($city_category=='1' && $city_categoryy=='2'){

if($vehicletype=='truck'){
$price= $noofvehicle*$distance*25*10/100;
}
else if($vehicletype=='trailer'){
$price= $noofvehicle*$distance*30*10/100;
}
else
{
  $price= $noofvehicle*$distance*35*10/100;

}

}else if($city_category=='1' && $city_categoryy=='3'){

if($vehicletype=='truck'){
$price= $noofvehicle*$distance*25*20/100;
}
else if($vehicletype=='trailer'){
$price= $noofvehicle*$distance*30*20/100;
}
else
{
  $price= $noofvehicle*$distance*35*20/100;

}

}
else {

if($vehicletype=='truck'){
$price= $noofvehicle*$distance*25*30/100;
}
else if($vehicletype=='trailer'){
$price= $noofvehicle*$distance*30*30/100;
}
else
{
  $price= $noofvehicle*$distance*35*30/100;

}

}

   $lastid = mysql_insert_id ();
	
   $details= array(
         'id' => $lastid,
    'loader_id' => $user_id,
      'source' => $source,
       'destination' => $destination,
       'estimated_price' => $price ,
      // 'distance' => $distance ,
        'message' => ' This is your estimated price ',
        );
    array_push($jsonResponse['post_load'],$details);


echo json_encode($jsonResponse);

	?>