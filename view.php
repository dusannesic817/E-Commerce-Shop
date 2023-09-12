<?php
require_once "inc/header.php";
require_once "app/classes/Product.php";
require_once "app/classes/Cart.php";


    
if($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET["id"])){

    $id=$conn->real_escape_string($_GET["id"]);

    $products=new Product();

    $get=$products->fetch_product($id);

    //var_dump($get);
    $name=$get["club_name"];
    $type=$get["name"];
    $image=$get["image"];
    $price=$get["price"];
    $description =$get["description"];
           
}


if($_SERVER["REQUEST_METHOD"]== "POST"  && isset($_GET["id"])){

    $product_id=$conn->real_escape_string($_GET["id"]);
    $user_id = $_SESSION["id"];
    $size=$_POST["size"];

    $cart=new Cart();
    $cart->add_to_cart($user_id,$product_id,$size);

    header("Location: cart.php");
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
    <div class="container margin_top">
        <div class="card mb-3" style="max-width: 800px; height: 500px;">
            <div class="row gx-3">
                <div class="col-md-4">
                    <img src="public/images/jerseys/<?php echo $image ?>" alt="Product Image" class="img-fluid rounded-start" style="width: 400px; height: 450px;">
                </div>
                <div class="col-md-8 row gy-4">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Team</td>
                                    <td><?php echo $name?></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Season</td>
                                    <td>??</td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Type</td>
                                    <td><?php echo $type ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Price</td>
                                    <td><?php echo $price?>$</td>
                                </tr>
                            </tbody>
                        </table>
                        <form method="post" action="">
                        <div class="card-text border_border">
                            <?php
                            $size = $products->size();

                            foreach ($size as $value){
                                $size_id = $value["id"];
                                $size_name = $value["size_name"];
                            ?>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="size" id="size<?php echo $size_id; ?>" data-size-id="<?php echo $size_id; ?>" value="<?php echo $size_id; ?>" autocomplete="off">


                                <label class="btn btn-outline-primary" for="size<?php echo $size_id; ?>"><?php echo $size_name; ?></label>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="card-text border_border">
                            <?php echo $description; ?>
                        </div>
                        <div class="border_border">
                            
                            <button type="submit" class="btn btn-primary"><i class="bi bi-bag-fill margin_cart"></i>Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

