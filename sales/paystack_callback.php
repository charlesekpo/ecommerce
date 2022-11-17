<?php

var_dump($_REQUEST);
if(isset($_REQUEST['reference'])){


// add payment
include_once "shared/payment.php";
// create instance of payment class
$objpay = new Payment;

// access veryfyPaystackTransaction method
$result = $objpay->verifyPaystackTransaction($_REQUEST['reference']);   // you can use GET

echo "<pre>";
print_r($result->data->status);   // if its array you want, you can add true
echo "</pre>";

if($result->data->status == 'success'){
    $datepaid = $result->data->created_at;
    $reference = $_GET['reference'];

    // access updateTransaction method
    $output = $objpay->updateTransaction($reference, $datepaid);

    if($output == true){
        # redirect to transuccess.php
        header("Location: transuccess.php");
        exit();
    }
}else{
    die("Oops, something happened ".$result->message);
}

}
?>