<?php 


class Order extends Cart{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }


    public function create_order($first_name, $last_name, $email, $adress,$country,$number){

       // return $this->get_cart_items();

      $sql="INSERT INTO `delivery_adreses` (`first_name`,`last_name`,`email`,`adress`,`country`,`number`)
        VALUES
         (?,?,?,?,?,?);
      
     " ;

     $stmt=$this->conn->prepare($sql);
     $stmt->bind_param("ssssss",$first_name, $last_name, $email, $adress,$country,$number);
      $stmt->execute();


      $delivery_adress_id=$this->conn->insert_id;


      $sqlo="INSERT INTO `orders`(`user_id`,`delivery_adress_id`)
      values(?,?)
      ";

      $stmt->prepare($sqlo);
      $stmt->bind_param("ii",$_SESSION["id"], $delivery_adress_id);
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


    public function empty_cart(){
      $id=$_SESSION["id"];
      $sql="DELETE FROM `cart`WHERE `user_id`=$id
      ";
      $stmt=$this->conn->prepare($sql);
      $stmt->prepare($sql);
      return $stmt->execute();
    }


    

}