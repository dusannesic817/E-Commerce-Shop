<?php

function validatePhoneNumber($phone){
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($phone) == 8 || strlen($phone) == 9){
        return "";
    }
    return "Number must contain 8 or 9 numbers";
}

function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateUsername($username){
    $length = strlen($username);
    if ($length < 6 || $length > 20){
       return" Username must be between 7 and 20 characters";
    }
    if(!preg_match('/^[a-zA-Z0-9_]+$/', $username)){

        return" Username conatin number";
    }
    return "";
}

function validatePassword($password){
    if(strlen($password) < 8){
        return "Password cannot contain less than 8 characters";
    }
    if (!preg_match('/[A-Z]/', $password)){
        return "Password must contain one big letter, number and specific characher";
    }
    if(!preg_match('/[a-z]/', $password)){
        return "Password must contain one big letter, number and specific characher";
    }
    
    if(!preg_match('/[0-9]/', $password)){
        return "Password must contain one big letter, number and specific characher";
    }
    
    if(!preg_match('/[\W_]/', $password)){
        return "Password must contain one big letter, number and specific characher";
    
    }
    return "";
}



?>