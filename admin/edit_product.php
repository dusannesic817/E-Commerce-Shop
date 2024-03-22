<?php

require_once "../app/config/config.php";
require_once "../app/classes/Product.php";
require_once "../app/classes/User.php";

$user=new User();

if(isset($_GET["id"]) &&  $user->isLoged() && $user->is_admin()){

  $product=new Product();

  $product_id=$_GET["id"];

  $products=$product->read_product($product_id);


  if($_SERVER["REQUEST_METHOD"]== "POST"){

    $name=$_POST["name"];    
    $description=$_POST["description"];
    $price=$_POST["price"];
    $image=$_POST["photo_path"];
    $quantity=$_POST["quantity"];
    $club_id=$_POST["club_id"];
    $category_id=$_POST["category_id"];

    $product=new Product();

    

$update=$product->update_product($name,$description,$price,$image,$quantity,$club_id,$category_id,$product_id);

header("Location: edit_product.php?id=$product_id");
exit();

}

 
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
    <title>Admin</title>
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
<div class="row">
  <div class="col">
    <input type="text" class="form-control" name= "name" id="name" value="<?php echo $products["name"]?>">
  </div>
  <div class="col">
    <input type="text" class="form-control" name= "description" id="description" value="<?php echo $products["description"]?>">
  </div>
  <div class="col">
    <input type="number" class="form-control" name= "price" id="price" value="<?php echo $products["price"]?>">
  </div> 
  <div class="col">
    <input type="number" class="form-control" name= "quantity" id="quantity" value="<?php echo $products["quantity"]?>">
  </div>
  <div class="col">
    <input type="number" class="form-control" name= "club_id" id="club_id" value="<?php echo $products["club_id"]?>">
  </div>
  <div class="col">
    <input type="number" class="form-control" name= "category_id" id="category_id" value="<?php echo $products["category_id"]?>">
  </div>
  <div class="col">
    <input type="hidden" class="form-control" name= "photo_path" id="photoPathInput">
    <div id="dropzone-upload" class="dropzone"></div>
  </div>
          
</div>
<div class="row mt-5">
  <div class="col-sm-4">
    <button type="submit" class="btn btn-success">Update</button>  
  </div>
</div>
</form>
</div>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    Dropzone.options.dropzoneUpload={
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init:function(){
            this.on("success", function(file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById("photoPathInput").value =jsonResponse.photo_path;
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    };
</script>
</body>
</html>