
<?php

    class User{

        protected $conn;

        public function __construct(){
            global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
            $this->conn =$conn;
        }



        public function createUser($first_name, $last_name, $username, $email, $password, $number, $adress, $country_id) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO `users` (first_name, last_name, username, email, password, number, adress, coutry_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssssssi", $first_name, $last_name, $username, $email, $hash, $number, $adress, $country_id);
            
            return $stmt->execute();
        
          /* if ($result) {
                $lastInsertedId = $this->conn->insert_id;
                $_SESSION["id"] = $lastInsertedId;
                return true;
            } else {
                return false;
            }*/
        }
        



        public function login($username, $password){

            $sql="SELECT `id`, `password` FROM `users` WHERE `username`=?;
            ";
             $stmt= $this->conn->prepare($sql);
             $stmt->bind_param("s", $username);
             $stmt->execute();

             $result = $stmt->get_result();

             if($result->num_rows==1){

                $row = $result->fetch_assoc();

                if(password_verify($password, $row["password"])){  // row["password"]               
                    $_SESSION["id"]=$row["id"];
    
                    return true;
                }
             }
             return false;
    }



    public function isLoged(){

        if(isset($_SESSION["id"])){
            return true;
        }
        return false;
    }


    public function logOut(){
        unset($_SESSION["id"]);
    }



    public function user_data(){
        $sql="SELECT 
        *,
        countries.country as country
        FROM `users`
        LEFT JOIN countries on users.coutry_id=countries.id
        WHERE `users`.`id`=? ";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION["id"]);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows>0){

            return $result->fetch_assoc();
        }
    }

}



?>