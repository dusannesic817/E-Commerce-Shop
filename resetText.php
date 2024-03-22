<?php
session_start();
if(isset($_SESSION['reset_token'])){
    $token = $_SESSION['reset_token'];
    echo $token;
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
</head>
<body>
   <p> Hello, to reset your password click the link below</p>
    <a href="http://localhost/e-commerc_Shop/reset_password.php" target="_blank">Click here</a>
</body>
</html>
