<?php
session_start();
    if(isset($_REQUEST['btnpay'])){
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";

        // add payment class
        include_once "shared/payment.php";
        // instantiate payment class
        $payobj = new Payment;

        // reference insert transaction method
        $productid = $_REQUEST['productid'];
        $userid = $_SESSION['user_id'];
        $amount = $_REQUEST['ammount'];
        $reference = "U".time().rand().$productid;  // you can add your productid if you like
        $email = $_SESSION['email'];

        $insert_trans = $payobj->insertTransaction($userid, $productid, $amount, $reference);

        if($insert_trans == true){
            # initialize paystack transaction
            $output = $payobj->initPaystackTransaction($amount, $reference, $email);

            echo "<pre>";
            print_r($output);
            echo "</pre>";

            $redirect = $output->data->authorization_url;
            if(!empty($redirect)){
                header("Location: $redirect");
                exit();
            }
        }else{
            echo "Oops, something happened!";
        }
    }
?>