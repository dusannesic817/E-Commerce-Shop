<?php


class Product{
    protected $conn;

    public function __construct(){
        global $conn;  // pristupam onoj varijabli iz config jer je globalna nema neku funkciju
        $this->conn =$conn;
    }

    
    public function fetch_all($id,$limit,$page){

        $start=($page-1)*$limit;

        $sql= "SELECT 
        `products`.`id` as product_id,
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description
        FROM 
        `products`
        LEFT JOIN `clubs` ON `clubs`.`id` = `products`.`club_id`
        WHERE clubs.id= ?
        LIMIT $start,$limit";

        $stmt= $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }

    }

    public function count($id){
        $sql = 'SELECT count(id) as product_count FROM products WHERE club_id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($product_count);
        $stmt->fetch();
        return $product_count;
    }


    public function search($search,$limit,$page) {
        $start=($page-1)*$limit;
        $sql= "SELECT 
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description,
        `products`.`category_id` as category_id,
        `clubs`.`name` as club_name
    FROM 
        `products`
    LEFT JOIN `clubs` ON `clubs`.`id` = `products`.`club_id`
    WHERE 
        $search";

    
        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    
    
    
    

    public function fetch_product($id){
        $sql= "SELECT 
        `products`.`name` as name,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description,
        `products`.`category_id` as category_id,
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

    public function product_id(){
        $sql="SELECT id FROM `products`";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0){

            return $result->fetch_all(MYSQLI_ASSOC);
    }

    }


    public function fetch_all_products(){
        $sql= "SELECT 
        `products`.`name` as name,
        `products`.`id` as product_id,
        `products`.`price` as price,
        `products`.`image` as image,
        `products`.`description` as description,
        `products`.`quantity` as quantity,
        `products`.`category_id` as category_id,
        `clubs`.`name` as club_name,
        `clubs`.`id` as club_id
        FROM 
        `products`
        LEFT JOIN `clubs` ON `clubs`.`id` = `products`.`club_id`";

        $stmt= $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
    public function create_product($name,$description,$price,$image,$quantity,$club_id,$category_id){

        $sql="INSERT INTO `products` (`name`, `description`,`price`,`image`,`quantity`,`club_id`,`category_id`)
            VALUES(?,?,?,?,?,?,?)
        ";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("ssdsiii",$name,$description,$price,$image,$quantity,$club_id,$category_id);
        return $stmt->execute();

        
    }

    public function read_product($product_id){
        $sql="SELECT * FROM `products` WHERE `products`.`id`=?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();

        $result=$stmt->get_result();

        return $result->fetch_assoc();


    }


    public function update_product($name,$description,$price,$image,$quantity,$club_id,$category_id,$product_id){
        $sql="UPDATE `products` SET `name`=?, `description`=?, `price`=?, `image`=?,`quantity`=?, `club_id`=?, `category_id`=? WHERE `products`.id=?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param("ssdsiiii",$name,$description,$price,$image,$quantity,$club_id,$category_id,$product_id);
        $stmt->execute();

    }


    public function delete_product($product_id){
        $sql="DELETE FROM `products` WHERE `products`.`id`=?";

        $stmt=$this->conn->prepare($sql);

        $stmt->bind_param("i", $product_id);
        $stmt->execute();


    }


    public function fetch_club(){
        $sql="SELECT * FROM clubs";

        $stmt= $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_all(MYSQLI_ASSOC);
        }


    }

    public function fetch_category(){
        $sql="SELECT * FROM categories";

        $stmt= $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){

            return $result->fetch_all(MYSQLI_ASSOC);
        }


    }



}


?>