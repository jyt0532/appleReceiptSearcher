<?php
require_once "php_restler/Restler.php";
header("Content-Type:text/json ;charset=utf-8");
$receipt = $_POST['receipt'];
$data = array("receipt-data" => $receipt);
$result = sendRequestToSandBox($data);
$body = getResponseBody($result);
$decodedBody = json_decode($body);
if($decodedBody -> status == 0){
  echo $body;
}else if($decodedBody -> status == 21008){
  $result = sendRequestToItunes($data);
  $body = getResponseBody($result);
  $decodedBody = json_decode($body);
  if($decodedBody -> status == 0){
    echo $body;
  }else{
    responseError($body);
  }
}else{
  responseError($body);
}
function sendRequestToSandBox($data){
  $result = Restler::request(array(
    "method" => "POST"
    , "url" => "https://sandbox.itunes.apple.com/verifyReceipt"
    , "headers" => array("Content-Type" => "application/json")
    , "body" => json_encode($data)
  ));
  return $result; 
}
function sendRequestToItunes($data){
  $result = Restler::request(array(
    "method" => "POST"
    , "url" => "https://buy.itunes.apple.com/verifyReceipt"
    , "headers" => array("Content-Type" => "application/json")
    , "body" => json_encode($data)
  ));
  return $result; 
}
function responseError($body){
  header('HTTP', true, 403);
  echo $body;  
}
function getResponseBody($result){
  $response = $result['response'];
  $body = $response -> get_body();
  return $body;
}
?>
