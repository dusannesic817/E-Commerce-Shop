<?php

require_once "app/config/config.php";
require_once "app/classes/User.php";


if(!isset($_SESSION['confirm_token'])){

    header('location: login.php');
    exit();
}

$user = new User();

if(isset($_SESSION['confirm_token'])){
    $token = $_SESSION['confirm_token'];
} else {
    echo 'Token ne postoji';
}

    $id = $user->find_account_with_token($token);

    $user_id=$id['id'];
    
       if ($user->confirm_account($user_id)) {
            $_SESSION['confirm_registration'] = 'Congratulations, you have confirmed your email. Please log in.';
            header('Location: index.php');
            unset($_SESSION['confirm_token']);
            exit();
        } else {
            echo 'Error occurred while confirming the account.';
        }
  

