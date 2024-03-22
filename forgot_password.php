<?php
require_once "inc/header.php";
require_once 'app/classes/Mailer.php';
require_once 'app/classes/User.php';

$user=new User();
$mailer= new Mailer();

if($_SERVER["REQUEST_METHOD"]== "POST"){

    $email= $_POST['email'];
    $token= bin2hex(random_bytes(16));
    $token_hash=hash('sha256', $token);



$exp_at= date("Y-m-d H:i:s", time()+60*30);

$reset=$user->resetPassword($token_hash,$exp_at,$email);

if($reset){

  $mailer->sendMail($email);
  $_SESSION['reset_token']=$token_hash;
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <div class='container'>
<form method='POST' action=''>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <button type="submit" name="send" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>