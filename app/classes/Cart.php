<?php


class Cart{

    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }


    public function add_to_cart($user_id,$product_id,$size_id){
        $sql="INSERT INTO `cart`(`user_id`,`product_id`,`size_id`)
        VALUES (?,?,?);
        
        ";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("iii",$user_id,$product_id,$size_id);
         $stmt->execute();
    }


    public function get_cart_items(){
        $sql="SELECT 
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description,
        `clubs`.`name` as club_name,
        `size`.`size_name`as size_name
        FROM products
        LEFT JOIN `cart` ON `products`.`id`=`cart`.`product_id`
        LEFT JOIN `clubs` ON clubs.id = `products`.`club_id`
        LEFT JOIN `size` ON `size`.`id` = `cart`.`size_id`
        WHERE `cart`.`user_id`=?";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION["id"]);
        $stmt->execute();
        $result= $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>