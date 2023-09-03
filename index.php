<?php

    require_once "inc/header.php";
    require_once "app/config/config.php";

    if($_SERVER["REQUEST_METHOD"]=="GET"){

        $sql=" SELECT 
        `id`, `name`,`image`
        FROM `clubs`";
    
        $rezultat=$conn->query($sql);
        $images=array();
        $names=array();

        

         if($rezultat->num_rows>0){

            while($row=$rezultat->fetch_assoc()){
                $img=$row["image"];
                $images[]=$img;
                
                
                $name=$row["name"];
                $names[]=$name;


                $niz = array_combine($names, $images);



            }
        }

        var_dump($niz);

    }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>PL Shop</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="margine_bottom">Premier League Shop</h1>
        <div class="row gy-4">
        <?php
                    foreach($niz as $key=> $value){

            
                ?>
            <div class="col-md-3">
            <div class="card" style="postion: relative;" >
                <img src="public/images/<?php echo $value ?>" class="card-img" alt="...">     
                <div class="card-img-overlay">
                    <div class="card-title shadow" > <h5><?php echo $key?></h5> 

                   
                </div>
                </div>
                </div>
            </div>
            <?php
                }
                
            ?>
        </div>        
    </div>     
</body>
</html>
