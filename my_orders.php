<?php

require_once "inc/header.php"; 
require_once "app/classes/User.php";

$user=new User();

if(!$user->isLoged()){
    header("Location: login.php");
    exit();
}
?>





<?php
require_once "inc/footer.php";
?>