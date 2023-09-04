<?php

function validatePhoneNumber($phone){
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($phone) == 8 || strlen($phone) == 9){
        return true;
    }
    return false;
}

function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateUsername($username){
    $length = strlen($username);
    if ($length < 6 || $length > 20){
        return false;
    }
    if(!preg_match('/^[a-zA-Z0-9_]+$/', $username)){
        return false;
    }
    return true;
}

function validatePassword($password){
    if(strlen($password) < 8){
        return false;
    }
    if (!preg_match('/[A-Z]/', $password)){
        return false;
    }
    if(!preg_match('/[a-z]/', $password)){
        return false;
    }
    if(!preg_match('/[0-9]/', $password)){
        return false;
    }
    if(!preg_match('/[\W_]/', $password)){
        return false;
    }
    return true;
}



?>