<?php

require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";


$user=new User();

if($user->isLoged() && $user->is_admin()){
        
    
$product=new Product();

$products=$product->fetch_all_products();


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
    <div class="container mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" >Premier League Shop</a>
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
   
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Name</th>
      <th scope="col">Club</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col" style="text-align:center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($products as $value){

       $id=$value["product_id"];
    ?>
    <tr>
      <th scope="row"><?php echo $id?></th>
      <td> <?php echo $value["name"];?></td>
      <td><?php echo $value["club_name"];?></td>
      <td>$<?php echo $value["price"];?></td>
      <td><img src="../public/images/jerseys/<?php echo $value["image"] ?>" height="50"></td>
      <td><?php echo $value["quantity"];?></td>
    
      <td  style="text-align:center;" >
        <a href="edit_product.php?id=<?php echo $id?>" class="btn btn-primary ">Edit</a>
        <a href="delete_product.php?id=<?php echo $id?>" class="btn btn-danger ">Delete</a>
        
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
<a href="add_product.php" class="btn btn-success">Add Product</a>


</div>

</body>
</html>



<?php

}
?>