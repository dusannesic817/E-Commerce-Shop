<?php

require_once "inc/header.php";
require_once "app/classes/Product.php";

if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];

    $keywords = explode(" ", $search);

    $array = [];
    foreach($keywords as $keyword) {
        $array[] = "`products`.`name` LIKE '%$keyword%'";
    }
    
    $search = implode(" AND ", $array);
   
    $product=new Product();
    $search=$product->search($search);

    var_dump($search);


      

    }