<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
    // check the request method
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once "userapi.php";

    $obj = new User;
    $result = $obj->getAllUsers();

    echo $result;

}else{
    $responsedata = array(
        "status"=> "failed",
        "message"=> "Method not allow",
        "data"=> []
    );

    echo json_encode($responsedata);
}

?>