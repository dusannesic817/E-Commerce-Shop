<?php


require_once "app/classes/Validation.php";


$ime="dsa";
$validation=new Validation();

$stampaj=$validation->validateUsername($ime);

var_dump($stampaj);
?>