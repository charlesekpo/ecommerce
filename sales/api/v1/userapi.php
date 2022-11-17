<?php
include_once "../../shared/constants.php";

class User{
    // member variable
    public $lastname;
    public $firstname;
    public $emailaddress;
    public $phone;
    public $desc;
    public $password;
    public $dateofbirth;
    public $mycon; // connection handler

    //member functions
    function __construct()
    {// connect to database
    $this->mycon= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    
    if ($this->mycon->connect_error) {
        die("connection failed: ". $this->mycon->connect_error);
        }
    }
    # start insertuser method
    function insertUser($lname, $fname, $dob, $email, $phone, $desc, $pswd){
        $stmt = $this->mycon->prepare("INSERT INTO users(lastname, firstname, dateofbirth, emailaddress, phonenumber, profiledesc, password)VALUES(?,?,?,?,?,?,?)");
        $pswd = password_hash($pswd, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssss", $lname, $fname, $dob, $email, $phone, $desc, $pswd);
        $stmt->execute();
        // we are not fetching any result...since we are inserting
        // check if record was inserted
        if($stmt->affected_rows == 1){
            $responsedata = array(
                "status"=>"success",
                "message"=>"Account created successfully",
                "data"=>$stmt->insert_id   //after inserting, the insert_id specifies the primary key
            );
        }else{
            $responsedata = array(
                "status"=> "failed",
                "message"=> "Oops, something went wrong",
                "data"=> null
            );
            // you can log error this way
            file_put_contents("error_log.txt", $stmt->error);
        }
        $response = json_encode($responsedata);
        
        return $response;
    }
    # end insertuser method

    # start getallusers method
    function getallusers(){

        $stmt=$this->mycon->prepare(" SELECT * FROM users WHERE role_id=?");
        // bind parameters
        $roleid = 2;
        $stmt->bind_param("i",$roleid);
        // execute
        $stmt->execute();
        // get result set
        $result=$stmt->get_result();
        // fetch records from result set
        $records=[];
        if ($result->num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
               $records[] = $row;
        }

        $responsedata = array(
            "status"=>"success",
            "message"=>"List of all members",
            "data"=>$records
        );
        return json_encode($responsedata);
    }else{
        $responsedata = array(
            "status"=>"failed",
            "message"=>"No record found",
            "data"=> []
        );
        // log error
        file_put_contents("error_log.txt", $stmt->error, FILE_APPEND);

        return json_encode($responsedata);
    }
    }
    # end getallusers method

    # start updateuser method
    function updateUser($lname, $fname, $dob, $phone, $desc, $userid){
        $stmt = $this->mycon->prepare("UPDATE users SET lastname=?, firstname=?, dateofbirth=?, phonenumber=?, profiledesc=? WHERE user_id=?");
        
        $stmt->bind_param("sssssi", $lname, $fname, $dob, $phone, $desc, $userid);
        $stmt->execute();
        // we are not fetching any result...since we are inserting
        // check if record was inserted
        if($stmt->affected_rows == 1){
            $responsedata = array(
                "status"=>"success",
                "message"=>"Account updated successfully",
                "data"=>[]
            );
        }elseif($stmt->affected_rows == 0){
            $responsedata = array(
                "status"=>"success",
                "message"=>"Nothing to update",
                "data"=>[]
            );
        }else{
            $responsedata = array(
                "status" => "failed",
                "message" => "Oops, something went wrong",
                "data"=>[]
            );
            // log error
            file_put_contents("error_log.txt", $stmt->error);
        }
        $response = json_encode($responsedata);
        
        return $response;
    }
    # end updateuser method

    #start getuser method

    function getUser($userid){

        $stmt=$this->mycon->prepare(" SELECT * FROM users WHERE user_id=?");
        // bind parameters
        $stmt->bind_param("i",$userid);
        // execute
        $stmt->execute();
        // get result set
        $result=$stmt->get_result();
        // fetch records from result set
        $records=[];
        if ($result->num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
               $records[] = $row;
        }

    #end getuser method
}
    }
}
?>