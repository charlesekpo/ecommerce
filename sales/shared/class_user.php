<?php
//add constants
include_once "constants.php";

//class definition
class User{
var $lastname;
var $firstname;
var $mycon; //database connection handler

//member methods
function __construct()
{// connect to database
    $this->mycon= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    
    if ($this->mycon->connect_error) {
        die("connection failed: ". $this->mycon->connect_error);
    }
}
#begin login method

function login($email,$password){
    //prepare statment
    $statement=$this->mycon->prepare("SELECT * FROM users join roles on users.role_id = roles.role_id where emailaddress=? ");
    
    //bind parameter
    $statement->bind_param("s",$email);
    
    $statement->execute();
    //result set
    
    $result=$statement->get_result();
    //fetch data
    if ($result->num_rows==1) {
        //record exist
    $row=$result->fetch_array();
    // echo "<pre>";
    // print_r($row["password"]);
    // echo "</pre>";
    
    //check if password match/verify password
    if (password_verify($password,$row['password'])) {
        # password match, then create session variables
        session_start();
        $_SESSION['user_id']=$row[0];
        $_SESSION['lname']=$row['lastname'];
        $_SESSION['fname']=$row['firstname'];
        $_SESSION['email']=$row['emailaddress'];
        $_SESSION['logger']="#czar";
        $_SESSION['myroleid']=$row['role_id'];
        $_SESSION['myrolename']=$row['role_name'];

        return true;
    
    }else {
        # password doesn't match
       return false;
    }
    
    
    }else {
        //email does not exist
      return false;
    }
    
    }
    #begin logout method
function logout(){
session_start();
session_destroy();

//redirect user to login page
header("Location: login.php");

}
    #end logout method
}
?>