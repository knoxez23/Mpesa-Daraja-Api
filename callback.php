<?php
header("Content-Type: applicaition/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "Mpesastkresponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse);

$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$ResultDesc = $data->Body->stkCallback->ResultDesc;
$Amount = $data->Body->stkCallback->Item[0]->Value;
$TransactionId = $data->Body->stkCallback->Item[1]->Value;
$UserPhoneNumber = $data->Bosy->stkCallback->Item[4]->Value;

// CHECK IF THE TRANSACTION IS SUCCESSFUL
if($ResultCode == 0) {
    // STORE TRANSACTION DETAILS TO DATABASE
}