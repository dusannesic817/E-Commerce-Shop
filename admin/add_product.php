<?php


require_once "../app/config/config.php";
require_once "../app/classes/Product.php";
require_once "../app/classes/User.php";

$user=new User();


if($user->isLoged() && $user->is_admin()){
   
    if($_SERVER["REQUEST_METHOD"]== "POST"){

        $name=$_POST["name"];    
        $description=$_POST["description"];
        $price=$_POST["price"];
        $image=$_POST["image"];
        $quantity=$_POST["quantity"];
        $club_id=$_POST["club_id"];
        $category_id=$_POST["category_id"];

        $product=new Product();



    $create=$product->create_product($product_id);

    }


}


 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Admin</title>
    <link rel="stylesheet" href="../public/css/style.css">

</head>
<body>
<body>
    <div class="container mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Premier League Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Log out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">#</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
    <div class="container mt-5">
    <form method="POST" action="">

        <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" name= "name" id="name" placeholder="Name" aria-label="First name">
        </div>
        
        <div class="col">
            <input type="text" class="form-control" name= "description" id="description" placeholder="Description" aria-label="Last name">
        </div>
        <div class="col">
            <input type="number" class="form-control" name= "price" id="price" placeholder="Price" aria-label="Last name">
        </div>
        <div class="col">
            <input type="text" class="form-control" name= "image" id="image" placeholder="Image" aria-label="Last name">
        </div>  
        <div class="col">
            <input type="number" class="form-control" name= "quantity" id="quantity" placeholder="Quantity" aria-label="Last name">
        </div>
        <div class="col">
            <input type="number" class="form-control" name= "club_id" id="club_id" placeholder="Club ID" aria-label="Last name">
        </div>
        <div class="col">
            <input type="number" class="form-control" name= "category_id" id="category_id" placeholder="Category ID" aria-label="Last name">
        </div>
                
        </div>
        <div class="row mt-3 mb-3">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-success">Add</button>  
        </div>
        </div>
    </form>
    </div>
</body>
</html>