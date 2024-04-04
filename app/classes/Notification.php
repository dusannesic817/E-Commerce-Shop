<?php

require_once __DIR__ . '/../../vendor/autoload.php';
//require_once 'vendor/autoload.php';


class Notification{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }



    public function notification($path){

      $options = array(
        'cluster' => 'eu',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        '51d06573da9c580bef35',
        'bd58908619d274fdc833',
        '1782445',
        $options
      );
        


        $sql="INSERT INTO `notifications`(`pdf_path`)
        VALUES (?);
        
        ";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("s",$path);
         $result=$stmt->execute();

         if($result){
            $data['message'] = $path;
            $pusher->trigger('my-channel', 'my-event', $data);

            return true;
            
         }else{
            return false;
         }

         
    }



    public function fetch_notification(){
        $sql='SELECT * FROM notifications ORDER BY created_at DESC LIMIT 1';

        $stmt=$this->conn->query($sql);

        if ($stmt->num_rows > 0){

            return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    }


    public function fetch_all_notification(){
      $sql='SELECT * FROM notifications ORDER BY created_at DESC';

      $stmt=$this->conn->query($sql);

        if ($stmt->num_rows > 0){

            return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    }
}