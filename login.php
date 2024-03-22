<?php

require_once "inc/header.php";
require_once "app/config/config.php";
require_once "app/classes/User.php";

$username='';


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $username=$_POST["username"];
        $password=$_POST["password"];

        $user=new User();

       $login= $user->login($username,$password);

       if(!$login){
       $_SESSION['loginmessage']='Wrong username or password';
        header("Location: login.php");
        exit();
    }
       
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    
    <link rel="stylesheet" href="path-to-your-mdb-css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value=<?php echo $username?>>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div id="usernameError" class="form-text mb-2" style="text-align:center">
                                <?php if(isset($_SESSION['loginmessage'])){
                                    echo $_SESSION['loginmessage'];
                                    unset($_SESSION['loginmessage']);
                                } ?>
                            </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="mt-3 text-center"><a href="forgot_password.php">Forgot Password?</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="path-to-your-mdb-js/mdb.min.js"></script>

</body>
</html>

<?php
    require_once "inc/footer.php";
    ?>
