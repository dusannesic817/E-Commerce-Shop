<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/User.php";
require_once "app/classes/Order.php";

$user=new User();

if(!$user->isLoged()){
    header("Location: login.php");
    exit();
}

  $list=$user->user_data();
  $name=$list["first_name"];
  $lastName=$list["last_name"];
  $email_=$list["email"];
  $adress_=$list["adress"];
  $country_=$list["country"];
  $number_=$list["number"];


   if($_SERVER["REQUEST_METHOD"]== "POST"){

    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $email=$_POST["email"]; 
    $adress=$_POST["adress"];
    $country=$_POST["country"];
    $number=$_POST["number"];


    $order=new Order();

    $orders= $order->create_order($first_name, $last_name, $email, $adress,$country,$number);

      $_SESSION["message"]["type"]= "success"; 
      $_SESSION["message"]["text"]= "Successful order"; 
      header("Location: my_orders.php");
      $empty=$order->empty_cart();

      exit();

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <form method="post" action="">
          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $name ?>">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $lastName ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" id="exampleInputEmail1" value="<?php echo $email_ ?>">
          </div>
          <div class="mb-3">
            <label for="adress" class="form-label">Address</label>
            <input type="text" class="form-control" name="adress" id="adress" value="<?php echo $adress_ ?>">
          </div>
          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" name="country" id="country" value="<?php echo $country_ ?>">
          </div>
          <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control" name="number" id="number" value="<?php echo $number_ ?>">
          </div>
          <button type="submit" class="btn btn-primary">Order</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php
require_once "inc/footer.php";