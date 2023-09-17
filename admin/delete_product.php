<?php


require_once "../app/config/config.php";
require_once "../app/classes/Product.php";
require_once "../app/classes/User.php";

$user=new User();

if(isset($_GET["id"]) &&  $user->isLoged() && $user->is_admin()){

    $product_id=$_GET["id"];

    $product=new Product();

    $delete=$product->delete_product($product_id);

    header("Location: index.php");

}


