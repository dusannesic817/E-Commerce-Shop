<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/User.php";

$user=new User();

if(!$user->isLoged()){
    header("Location: login.php");
    exit();
}

   $cart=new Cart();

   $cart_items=$cart->get_cart_items();

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
<div class="container">
    <table class="table table-striped">
        <thead >
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody></tbody>
        <?php
        foreach($cart_items as $value){
           // var_dump($value);
            $id=$value["id"];
        ?>
            <tr>
                <td class="pt-3"><?php echo $value['club_name']." - ". $value['name']?></td>
                <td class="pt-3"><?php echo $value["size_name"]?></td>
                <td class="pt-3"><?php echo $value["price"]?>$</td>
                <td><img src="public/images/jerseys/<?php echo $value["image"] ?>" height="50"></td>
                <td class="pt-3"><?php echo $value["quantity"]?></td>
                <td class="pt-3"><a href="delete_product.php?id=<?php echo $id ?>"> <i class="bi bi-trash"></i></a></td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>
    <a href="checkout.php" class="btn btn-success">Checkout order</a>
</div>
</body>
</html>

<?php 
require_once "inc/footer.php";