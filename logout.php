
<?php

    require_once "app/config/config.php";
    require_once "app/classes/user.php";

    $user= new User();

    $user->logOut();


    header("Location: login.php");
    exit();