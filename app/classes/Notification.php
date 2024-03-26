<?php



class Notification{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }



    public function notification($path){
        $sql="INSERT INTO `notifications`(`pdf_path`)
        VALUES (?);
        
        ";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("s",$path);
         $result=$stmt->execute();

         if($result){
            return true;
         }else{
            return false;
         }
    }
}