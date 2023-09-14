<?php


require_once "app/classes/Validation.php";
require_once "app/classes/Product.php";
require_once "inc/header.php";


$product=new Product();

$get_id = $product->product_id();

foreach($get_id as $value){
   $get=$value["id"];
   var_dump($get);
}


?>