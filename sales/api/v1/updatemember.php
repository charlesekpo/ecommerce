<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
    // check the request method
if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    // get the raw string
    $rawjsondata = file_get_contents('php://input');
    $data = json_decode($rawjsondata);

    // validate inputs
    if(empty($data->lastname) || empty($data->firstname) || empty($data->dob) || empty($data->desc) || empty($data->phone) || empty($data->userid)){
    
        $responsedata = array(
        "status"=> "failed",
        "message"=> "Bad request",
        "data"=> []
    );  
        echo json_encode($responsedata);
    }else{
        // add user class file
        include_once "userapi.php";
        // create object of user
        $userobj = new User;
        // access insertUser method and pass parameters
        $output = $userobj->updateUser($data->lastname, $data->firstname, $data->dob, $data->phone, $data->desc, $data->userid);

        echo $output;
    }

}else{
    $responsedata = array(
        "status"=> "failed",
        "message"=> "Method not allow",
        "data"=> []
    );

    echo json_encode($responsedata);
}
?>