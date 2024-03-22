<?php

require_once "inc/header.php";
require_once "app/classes/Product.php";

    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }



    if($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET["id"])){

        $id=$conn->real_escape_string($_GET["id"]);
        $_SESSION['club_id']=$id;
      
        $limit=16;

        $products=new Product();
      

       $get=$products->fetch_all($id,$limit,$page);
      

    }
    $total=$products->count($id); 
    $totalPages=ceil($total/$limit);

    if($page>1){
        $previous= $page -1;
      }else{
        $previous=$page;
      }

      if($page<$totalPages){
        $next= $page+1;
      }else{
        $next=$totalPages;
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

        <h1 class="margine_bottom">Premier League Shop</h1>

        <div class="row gy-4">
            <?php 
                if(!empty($get)){

                foreach ($get as $value) { 
                $id=$value["product_id"]
              ?>
              
                <div class="col-md-3 col-6">
                    <div class="card mb-3 h-100" style="max-width: 550px;">
                        <img src="public/product_image/<?php echo $value["image"] ?>" class="img-fluid rounded-start" style="height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value["name"] ?></h5>
                           
                           
                            <p class="card-text">
                                <small class="text-muted">Price: <?php echo $value["price"] ?>$</small>
                            </p>
                            <div>
                            <a href="view.php?id=<?php echo $id?>" class="btn btn-primary" >View product</a>
                            </div>
                        </div> 
                    </div>
                </div>
            <?php }
            }else{
                echo 'No items';
            }
            
            ?>
        </div>
    </div>
        <nav class='mt-4' aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li >
                    <a class="page-link" href="products.php?id=<?php echo $_SESSION['club_id'] ?>&page=<?php echo $previous ?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item">
                        <a class="page-link" href="products.php?id=<?php echo $_SESSION['club_id'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="products.php?id=<?php echo $_SESSION['club_id'] ?>&page=<?php echo $next?>">Next</a>
                </li>
            </ul>
        </nav>

</body>



</html>
<?php
require_once "inc/footer.php";