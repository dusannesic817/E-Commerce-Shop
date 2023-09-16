<?php

require_once "inc/header.php";
require_once "app/config/config.php";
require_once "app/classes/User.php";
require_once "app/classes/Validation.php";
require_once "validation.php";


    if($_SERVER["REQUEST_METHOD"]== "POST"){

        $first_name= $conn->real_escape_string($_POST["first_name"]);
        $last_name= $conn->real_escape_string($_POST["last_name"]);
        $username= $conn->real_escape_string($_POST["username"]);
        $email= $conn->real_escape_string($_POST["email"]);
        $password= $conn->real_escape_string($_POST["password"]);
        //$retype= $conn->real_escape_string($_POST["retype"]);
        $country_id=$conn->real_escape_string($_POST["country"]);;
        $number = $conn->real_escape_string($_POST["number"]);
        $adress = $conn->real_escape_string($_POST["address"]);
        

        $user=new User();

        

            $create= $user->createUser($first_name, $last_name,$username,$email,$password,$number,$adress,$country_id);
        

        //$create= $user->createUser($first_name, $last_name,$username,$email,$password,$number,$adress,$country_id);

        if($create){
            $_SESSION["message"]["type"]= "success"; 
            $_SESSION["message"]["text"]= "Successfully registered account"; 
            header("Location: index.php");
            exit();
        }else{
            $_SESSION["message"]["type"]= "danger"; 
            $_SESSION["message"]["text"]= "Unsuccessfully registered account";
            header("Location: register.php");
            exit();
        }

        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Form</title>
    
    <!-- MDB CSS (Include the path to your MDB CSS file) -->
    <link rel="stylesheet" href="path-to-your-mdb-css/mdb.min.css">
    
    <!-- Font Awesome Icons (if not already included in MDB) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <img src="public/images/logo1.png">
        </div> 
        <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div id="passwordHelpBlock" class="form-text">

                            </div>
                        </div>
                        <!--
                        <div class="mb-3">
                            <label for="retype" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="retype" name="retype" required>
                        </div>-->
                        <div class="mb-3">
                     
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="" disabled selected>Select your country</option>

                                <?php
                                    $sql="SELECT * FROM `countries`";
                                    $run=$conn->query($sql);
                                    $row=$run->fetch_all(MYSQLI_ASSOC);
                                   // var_dump($row);
                                    foreach($row as $value){
                                    
                                ?>
                                <option value="<?php echo $value['id']?>"> <?php echo $value['country']?></option>
                            
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                      
                        <div class="mb-3">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MDB JavaScript (Include the path to your MDB JavaScript file) -->
<script src="path-to-your-mdb-js/mdb.min.js"></script>

</body>
</html>

<?php

    require_once "inc/footer.php";
    ?>
