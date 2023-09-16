<?php 


require_once "app/config/config.php";
require_once "app/classes/Cart.php";

if(isset($_GET["id"])){
   
    $product_id=$_GET["id"];

    $cart= new Cart();
    $delete= $cart->delete_product($product_id);

    header("Location: cart.php");
   

}