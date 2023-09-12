<?php


class Product{
    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }

    
    public function fetch_all($id){

        $sql= "SELECT 
        `products`.`id` as product_id,
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description
        FROM 
        `products`
        LEFT JOIN `clubs` ON `clubs`.`id` = `products`.`club_id`
        WHERE clubs.id= ?";

        $stmt= $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }

    public function fetch_product($id){
        $sql= "SELECT 
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description,
        `clubs`.`name` as club_name
        FROM 
        `products`
        LEFT JOIN `clubs` ON `clubs`.`id` = `products`.`club_id`
        WHERE `products`.`id`= ?";

        $stmt= $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_assoc();
        }

    }


    public function size(){
        $sql="SELECT * FROM `size` ";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0){

            return $row = $result->fetch_all(MYSQLI_ASSOC);
    }
}

}


?>