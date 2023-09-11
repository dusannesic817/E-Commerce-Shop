<?php


class Product{
    protected $conn;

    public function __construct(){
        global $conn;  // pristupamo onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }

    
    public function fetch_all($id){

        $sql= "SELECT 
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`size` as size,
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

}


?>