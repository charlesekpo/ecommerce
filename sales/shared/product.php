<?php
include_once "constants.php";

class Product{

    public $productname;
    public $price;
    public $qty;
    public $mycon;

    function __construct(){
// connect to database
    $this->mycon= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    
    if ($this->mycon->connect_error) {
        die("connection failed: ". $this->mycon->connect_error);
    }
}

# start getproduct method
function getProducts(){

    $stmt=$this->mycon->prepare(" SELECT * FROM products");
    $stmt->execute();
    $result=$stmt->get_result();
    $records=[];
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
           $records[]=$row;
    }
}
return $records;
}
# start getproduct method
}
?>