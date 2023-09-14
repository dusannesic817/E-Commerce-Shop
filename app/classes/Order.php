<?php 


class Order extends Cart{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }


    public function create_order($delivery_adress){

       // return $this->get_cart_items();

      $sql="INSERT INTO `orders` (`user_id`,`delivery_adress`)
        VALUES
         (?,?);
      
     " ;

     $stmt=$this->conn->prepare($sql);
     $stmt->bind_param("is", $_SESSION["id"],$delivery_adress);
      $stmt->execute();


      $order_id=$this->conn->insert_id;

      $cart_items=$this->get_cart_items();

      $sqli="INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`)
      VALUES (?,?,?)
      
      ";
      $stmt=$this->conn->prepare($sqli);
      foreach($cart_items as $value){
        $stmt->bind_param("iis",$order_id, $value["id"],$value["quantity"] );
        $stmt->execute();
      }
     

    }

    

}