<?php
    require_once "../app/config/config.php";
    require_once "../app/classes/user.php";

    $user= new User();

    $user->log_out_admin();

    if($user){
        header("Location: ../login.php");
        exit();
    }
  