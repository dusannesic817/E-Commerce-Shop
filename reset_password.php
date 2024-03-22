<?php
require_once "inc/header.php";
require_once "app/classes/User.php";
require_once "app/classes/Validation.php";

$user=new User;


$passwordValidation='';

  $token_session=$_SESSION['reset_token'];
  $reset=$user->getUsersToken($token_session);

  $_SESSION['reset_id']= $reset['id'];

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $password=$_POST['password'];
    $retype=$_POST['retype'];

    $validation=new Validation();

    $passwordValidation = $validation->validatePassword($password,$retype);
   

      $reset_password=$user->new_password($_SESSION['reset_id'],$password);

      if($reset_password){
        header("Location: index.php");
      }else{
        header("Location: reset_passwod.php");
      }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <div class='container'>
<form method='POST' action=''>
  <div class="mb-3">
    <label for="password" class="form-label">New password</label>
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="password">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Retype password</label>
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="retype">

  </div>
  <button type="submit" name="send" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>


