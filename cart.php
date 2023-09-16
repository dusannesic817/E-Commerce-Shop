<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/User.php";

$user=new User();

if(!$user->isLoged()){
    header("Location: login.php");
    exit();
}


   $cart=new Cart();

   $cart_items=$cart->get_cart_items();

?>
<div class="container">
    <table class="table table-striped">
        <thead >
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody></tbody>
        <?php
        foreach($cart_items as $value){
           // var_dump($value);
            $id=$value["id"];
        ?>
            <tr>
                <td class="pt-3"><?php echo $value['club_name']." - ". $value['name']?></td>
                <td class="pt-3"><?php echo $value["size_name"]?></td>
                <td class="pt-3"><?php echo $value["price"]?>$</td>
                <td><img src="public/images/jerseys/<?php echo $value["image"] ?>" height="50"></td>
                <td class="pt-3"><?php echo $value["quantity"]?></td>
                <td class="pt-3"><a href="delete_product.php?id=<?php echo $id ?>"> <i class="bi bi-trash"></i></a></td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>
    <a href="checkout.php" class="btn btn-success">Checkout order</a>
</div>


<?php 
