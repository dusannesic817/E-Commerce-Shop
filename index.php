<?php

    require_once "inc/header.php";
    require_once "app/config/config.php";
    require_once "app/classes/user.php";

    $porukaTekst = "";
    
    if (isset($_SESSION["message"]) && isset($_SESSION["message"]["type"])){
       
        if (isset($_SESSION["message"]["text"])){
            $porukaTekst = $_SESSION["message"]["text"];
        }
        unset($_SESSION["message"]);
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
<p><?php echo $porukaTekst?></p>
<body>
<div class="container margin_top">
    <h1 class="margine_bottom">Premier League Shop</h1>
    <div class="row gy-4">
        <?php
            $sql = "SELECT `id`, `name`,`image` FROM `clubs`";
            $rezultat = $conn->query($sql);

            if ($rezultat->num_rows > 0){
                $row = $rezultat->fetch_all(MYSQLI_ASSOC);
                foreach ($row as $value){

                    $id = $value["id"];
        ?>
        <div class="col-md-3 col-6">
            <a href="products.php?id=<?php echo $id; ?>">
                <div class="card" style="postion: relative;">
                    <img src="public/images/<?php echo $value["image"] ?>" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-title shadow">
                            <h5><?php echo $value["name"]; ?></h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
                }
            }
        ?>
    </div>
</div>


</body>
<?php require_once "inc/footer.php";?>

</html>