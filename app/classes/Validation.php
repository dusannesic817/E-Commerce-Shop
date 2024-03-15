<?php


class Validation{

    function validatePhoneNumber($phone){
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if(strlen($phone) == 9 || strlen($phone) == 10){
            return "";
        }
        return "Number must contain 9 or 10 numbers";
    }
    
    
    function validateUsername($username,$conn){
       $query="SELECT * FROM `users` WHERE `username`='$username'";
        $result=$conn->query($query);
    
    
        if(empty($username)){
    
            return "Usernom cannot be blank";
    
        }elseif(preg_match('/\s/',$username)){
    
            return "Username cannot contain spaces";
    
        }elseif(strlen($username)<5 || strlen($username)>25){
    
            return "Username must be between 5 and 25 characters";
    
    
        }elseif($result->num_rows>0){
            return "Username alredy exist";
        }
        else{
            return "";
        }
    }
    
    function validatePassword($password,$retype){
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
        if($password!==$retype){
            return "Password must match";
        }
        return "";
    }
    
    
    


}