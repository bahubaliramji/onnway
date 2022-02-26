<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = "njBGDm82462402663939";
$paytmParams["ORDERID"] = "123456";

/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, 'jU&QwG0D&RNNxl71');
$verifySignature = PaytmChecksum::verifySignature($paytmParams, 'jU&QwG0D&RNNxl71', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);


/* initialize JSON String */  
$body = "{\"mid\":\"njBGDm82462402663939\",\"orderId\":\"123456\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, 'jU&QwG0D&RNNxl71');
$verifySignature = PaytmChecksum::verifySignature($body, 'jU&QwG0D&RNNxl71', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);