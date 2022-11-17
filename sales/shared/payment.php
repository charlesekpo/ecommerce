<?php
    include_once "constants.php";
    class Payment{
        public $ammount;
        public $productid;
        public $mycon;
        public $key;

        public function __construct(){
        // connect to database
    $this->mycon= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    
    if ($this->mycon->connect_error) {
        die("connection failed: ". $this->mycon->connect_error);
            }
            $this->key = "sk_test_5bd30c96d8d6307adbfd6b9a5c97ccf0b6effc05";
        }
    public function insertTransaction($userid, $productid, $ammount, $transreference){
        // prepare statement
        $stmt = $this->mycon->prepare("INSERT INTO payment(user_id, product_id, ammount, datepaid, paymentstatus, paymentmode, trans_reference) VALUES(?,?,?,?,?,?,?)");
        // bind parameters
        $datepaid = date("Y-m-d h:i:s");
        $paymentstatus = "pending";
        $paymentmode = "online";
        $stmt->bind_param("iidssss", $userid, $productid, $ammount, $datepaid, $paymentstatus, $paymentmode, $transreference);

        // execute
        $stmt->execute();
        if($stmt->affected_rows == 1){
            return true;

        }else{
            return false;
        }
    }

    # start initialize paystack transaction
    public function initPaystackTransaction($amount, $transreference, $emailaddress){
        $url = "https://api.paystack.co/transaction/initialize";
        $callback = "http://localhost/sales/paystack_callback.php";
        $key = "sk_test_5bd30c96d8d6307adbfd6b9a5c97ccf0b6effc05";
        $fields = [
            "email" =>$emailaddress,
            "amount" => $amount * 100,
            "reference" => $transreference,
            "callback_url" => $callback,
        ];

        $fieldstr = http_build_query($fields);  // built-in function to convert array to string

        // step1:
        $ch = curl_init();

        // step 2:
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fieldstr);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); // return the string instead of printing it out
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // do no verify ssl certificate
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $key",
            "Cache-Control: no-cache"
        ));

        // step 3: execute
        $response = curl_exec($ch);

        if(curl_error($ch) == true){
            die("Error ".curl_error($ch));
        }

        // step 4: close curl session
        curl_close($ch);

        // step 5: convert response to object
        $result = json_decode($response);

        return $result;

    }
    # end initialize paystack transaction

        # start verify paystack transaction methos

        public function verifyPaystackTransaction($transreference){
            $url = "https://api.paystack.co/transaction/verify/".$transreference;

            // step 1: initialize curl
            $ch = curl_init();

            // step 2: set curl options
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'GET');
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); // return the string instead of printing it out
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // do no verify ssl certificate
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$this->key,
            "Cache-Control: no-cache"
        ));

            // step 3: execute curl
            $response = curl_exec($ch);

            if(curl_error($ch)){
                die("Curl Error: ".curl_error($ch));
            }

            // step 4: close open connection
            curl_close($ch);

            // step 5: convert json response to object

            return json_decode($response);
        }

        # end verify paystack transaction method


        # start update transaction method
        public function updateTransaction($transreference, $datepaid){
            // prepare statement
            $stmt = $this->mycon->prepare("UPDATE payment SET paymentstatus=?, datepaid=? WHERE trans_reference=?");
            // bind parameters
           
            $paymentstatus = "completed";
          
            $stmt->bind_param("sss", $paymentstatus, $datepaid, $transreference);
    
            // execute
            $stmt->execute();
            if($stmt->affected_rows == 1){
                return true;
    
            }else{
                return false;
            }
        }
         # end update transaction method

         # start viewAllPayments method
        public function viewPayments($userid){
            $stmt = $this->mycon->prepare("SELECT * FROM payment JOIN products ON products.product_id = payment.product_id WHERE user_id=? ");
            $stmt->bind_param("i",$userid);
            $stmt->execute();
            $result = $stmt->get_result();
            $records=[];
            if($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()) {
                    $records[]=$row;
             }   
        }
        return $records;
    }
}