<?php

require_once "inc/header.php";
require_once "app/config/config.php";
require_once "app/classes/User.php";
require_once "app/classes/Validation.php";
require_once "validation.php";
require_once "app/classes/Mailer.php";

$usernameValidation='';
$passwordValidation='';
$first_name='';
$last_name='';
$username='';
$email='';
$number='';
$adress='';

    if($_SERVER["REQUEST_METHOD"]== "POST"){

        $first_name= $conn->real_escape_string($_POST["first_name"]);
        $last_name= $conn->real_escape_string($_POST["last_name"]);
        $username= $conn->real_escape_string($_POST["username"]);
        $email= $conn->real_escape_string($_POST["email"]);
        $password= $conn->real_escape_string($_POST["password"]);
        $retype= $conn->real_escape_string($_POST["retype"]);
        $country_id=$conn->real_escape_string($_POST["country"]);;
        $number = $conn->real_escape_string($_POST["number"]);
        $adress = $conn->real_escape_string($_POST["address"]);
        
        $validation=new Validation();
        $user=new User();
        $mailer= new Mailer();

        $usernameValidation = $validation->validateUsername($username, $conn);
        $passwordValidation = $validation->validatePassword($password,$retype);

    if (empty($usernameValidation) && empty($passwordValidation)) {

        $create = $user->createUser($first_name, $last_name, $username, $email, $password, $number, $adress, $country_id);

        if ($create) {
            $mailer->confirmation_mail($email);
            $_SESSION['succesregister'] = "Thank you for registration, we've sent confirmation on your mail address";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["message"]["type"] = "error";
            $_SESSION["message"]["text"] = "Registration failed. Please try again later.";
        }
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
                        <div class="mb-2">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required value=<?php echo $first_name?>>
                        </div>
                        <div class="mb-2">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required value=<?php echo $last_name?>>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value=<?php echo $email?>>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value=<?php echo $username?>>
                            <div id="usernameError" class="form-text">
                                <?php echo $usernameValidation; ?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required >
                            <div id="passwordHelpBlock" class="form-text">
                            <div id="passwordError" class="form-text">
                                <?php echo $passwordValidation; ?>
                            </div>
                            </div>
                        </div>
                       
                        <div class="mb-2">
                            <label for="retype" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="retype" name="retype" required>
                        </div>
                        <div class="mb-2">
                     
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
                      
                        <div class="mb-2">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="number" name="number" value=<?php echo $number?>>
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value=<?php echo $adress ?>>
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


<script src="path-to-your-mdb-js/mdb.min.js"></script>

</body>
</html>
<?php
    require_once "inc/footer.php";
    
