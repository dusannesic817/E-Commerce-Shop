<?php

require_once "inc/header.php"; 
require_once "app/classes/User.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";


    $user=new User();
    $order=new Order();

    $list=$order->list_order();

    if(!$user->isLoged()){
        header("Location: login.php");
        exit();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>PL Shop</title>
</head>
<body>
    <?php
        if($list!=NULL){

        
    ?>
<div class="container">
    <h2>Order</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sum = 0;
            foreach ($list as $value){

                $cena = $value["price"];
                $kolicina = $value["quantity"];

                $ukupno = $cena * $kolicina;
                $sum += $ukupno;
        ?>
            <tr>
                <td class="pt-3"><?php echo $value["order_id"]; ?></td>
                <td class="pt-3"><?php echo $value["name"] . " - " . $value["club_name"]; ?></td>
                <td class="pt-3"><?php echo $value["price"] ?>$</td>
                <td><img src="public/product_image/<?php echo $value["image"]; ?>" height="50"></td>
                <td class="pt-3"><?php echo $value["quantity"] ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h2>Customer</h2>
            <table class="table">
                <tbody>  <tr>
                        <td scope="row">Order ID:</td>
                        <td><?php echo $value["order_id"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">First Name:</td>
                        <td><?php echo $value["first_name"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Last Name:</td>
                        <td><?php echo $value["last_name"]; ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Email:</td>
                        <td><?php echo $value["email"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Country:</td>
                        <td><?php echo $value["country"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Address:</td>
                        <td><?php echo $value["address"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Number:</td>
                        <td><?php echo $value["number"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Total:</td>
                        <td><?php echo $sum; ?>$</td>
                    </tr>
                    <tr>
                        <td scope="row">Created at:</td>
                        <td><?php echo $value["created_at"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
        }else{
?>

<div class="container">
    <h2>Order</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td class="pt-3"></td>
                <td class="pt-3"></td>
                <td class="pt-3"></td>
                <td><img src=""></td>
                <td class="pt-3"></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>




<?php
require_once "inc/footer.php";
?>