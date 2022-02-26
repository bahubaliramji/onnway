<?php
require_once('config.php');
$jsonResponse = array("comp_loader"=>array());
$query = mysql_query("select * from tbl_loader_company");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'loader_comp_id' => $data['loader_comp_id'],
		'f_name' => $data['f_name'],
		//'l_name' => $data['l_name'],
		//'mb_no' => $data['mb_no'],
		//'pro_image' => gallery_image($base_url,$data['id']),
		//'price' => get_price_data($data['id']),
		//'sale_price_to_doctor' => get_sale_price_doctor($data['id']),
		//'sale_price_to_dealer' => get_sale_price_dealer($data['id']),
		//'qty' => get_qty($data['id']),
		//'rating' => "",
		//'stock' => $stock,
    );
	array_push($jsonResponse['comp_loader'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['comp_loader'] = [];
	echo json_encode($comp_details);

}