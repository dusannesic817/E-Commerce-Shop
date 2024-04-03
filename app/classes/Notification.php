<?php

//require_once __DIR__ . '/../../vendor/autoload.php';
//require_once 'vendor/autoload.php';


class Notification{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }



   /* public function notification($path){

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            'c0953cb418b9d6eae4a3',
            '36d3219900266ff86549',
            '1781319',
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

         
    }*/



    public function fetch_notification(){
        $sql='SELECT * FROM notifications ORDER BY created_at DESC LIMIT 1';

        $stmt=$this->conn->query($sql);

        if ($stmt->num_rows > 0){

            return $stmt->fetch_all(MYSQLI_ASSOC);
    }

        

        
    }
}