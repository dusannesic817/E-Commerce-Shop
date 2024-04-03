
<?php

//session_start();

date_default_timezone_set('Europe/Belgrade');
$_SESSION['bad_logins']=0;
    class User{

        protected $conn;

        public function __construct(){
            global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
            $this->conn =$conn;
        }



        public function createUser($first_name, $last_name, $username, $email, $password, $number, $adress, $country_id) {
            $token= bin2hex(random_bytes(16));
            $token_hash=hash('sha256', $token);

            $hash = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO `users` (first_name, last_name, username, email, password, number, adress, coutry_id,confirm_token)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssssssis", $first_name, $last_name, $username, $email, $hash, $number, $adress, $country_id,$token_hash);
            
            $result= $stmt->execute();


            if($result){
                $lastInsertedId = $this->conn->insert_id;
                $_SESSION["last_insert_user_id"] = $lastInsertedId;
                $_SESSION['confirm_token'] = $token_hash;
                return true;
            }else{
                return false;
            }
        
          /* if ($result) {
                $lastInsertedId = $this->conn->insert_id;
                $_SESSION["id"] = $lastInsertedId;
                return true;
            } else {
                return false;
            }*/
        }
        
        public function login($username, $password){
            $sql = "SELECT `id`, `password`, `confirm_token` FROM `users` WHERE `username`=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
        
            $result = $stmt->get_result();
        
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
        
              
                if(password_verify($password, $row['password']) && $row['confirm_token'] === NULL){
                    $_SESSION['id'] = $row['id'];
                    unset($_SESSION['bad_login']);
                    return true;
                } else {
                    $_SESSION['bad_login']++;
                    if($_SESSION['bad_login'] > 5){
                        header('location: reset_password.php');
                        exit();
                    }
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


    public function log_out_admin(){
        unset ($_SESSION['admin_id']);
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


    public function is_admin(){
        $sql="SELECT * FROM `users` WHERE `id`=? AND `is_admin`=1;";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("i",$_SESSION["id"]);
        $stmt->execute();

        $result=$stmt->get_result();

        if($result->num_rows>0){
            $_SESSION['admin_id']=$_SESSION['id'];
            return true;
        }
        return false;


    }


    public function resetPassword($hash_token, $exp_at, $email){

        $sql = 'UPDATE users SET 
                reset_token=?, 
                reset_token_exp=? 
                WHERE email=?';
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $hash_token, $exp_at, $email);
        return $stmt->execute();
    }
    

    public function getUsersToken($token){
        $sql = 'SELECT * FROM users WHERE reset_token=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        
        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_assoc();
        }
    }


    public function new_password($id,$password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql='UPDATE users SET
                password = ?,
                reset_token=NULL,
                reset_token_exp= NULL
                WHERE id=?';
         $stmt = $this->conn->prepare($sql);
         $stmt->bind_param('si', $hash,$id);
         return $stmt->execute();
    }
    
    public function find_account_with_token($token){

        $sql="SELECT id FROM users WHERE confirm_token=?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param('s',$token);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_assoc();
        }else{
            return false;
        }


    }

    public function confirm_account($id){

        $sql="UPDATE users SET confirm_token= NULL WHERE id=?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $result=$stmt->execute();

        if($result){
            return true;
        }else{
            echo "Error: " . $stmt->error;
        }
        

    }
    
    

}





?>