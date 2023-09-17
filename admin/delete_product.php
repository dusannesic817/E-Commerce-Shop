<?php


require_once "../app/config/config.php";
require_once "../app/classes/Product.php";

if(isset($_GET["id"])){

    $product_id=$_GET["id"];

    $product=new Product();

    $delete=$product->delete_product($product_id);

    header("Location: index.php");

}


