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
    $category=$get["category_id"];

}


if($_SERVER["REQUEST_METHOD"]== "POST"  && isset($_GET["id"])){

    $product_id=$conn->real_escape_string($_GET["id"]);
    $user_id = $_SESSION["id"];
    $size=$_POST["size"];
    $quantity=$_POST["quantity"];

    $cart=new Cart();
    $cart->add_to_cart($user_id,$product_id,$size,$quantity);

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
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="card mb-3" style="max-width: 800px;">
                    <div class="row gx-3">
                        <div class="col-md-4 col-sm-6">
                            <img src="public/product_image/<?php echo $image?>" alt="Product Image" class="img-fluid rounded-start" style="width: 100%; height: auto;">
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td scope="row">Team:</td>
                                            <td><?php echo $name ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Season:</td>
                                            <td>??</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Type:</td>
                                            <td><?php echo $type ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Price:</td>
                                            <td><?php echo $price ?>$</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-text mt-4"><?php echo $description; ?></div>
                                <form method="post" action="">
                                    <div class="card-text mt-4">
                                        <?php
                                        $size = $products->size();
                                        foreach ($size as $value){
                                            $size_id = $value["id"];
                                            $size_name = $value["size_name"];
                                            if ($category == 1){
                                        ?>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="margin-right:0.2rem;">
                                                <input type="radio" class="btn-check" name="size" id="size<?php echo $size_id; ?>" data-size-id="<?php echo $size_id; ?>" value="<?php echo $size_id; ?>" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="size<?php echo $size_id; ?>"><?php echo $size_name; ?></label>
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="mt-5">
                                    <label for="broj" class="form-label">Number</label>
                                        <input type="number" class="form-control w-50" name="quantity">
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-bag-fill margin_cart"></i>Add to cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once "inc/footer.php";
?>

