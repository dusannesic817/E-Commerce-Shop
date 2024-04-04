<?php


require_once "../app/config/config.php";
require_once "../app/classes/Product.php";
require_once "../app/classes/User.php";

$user=new User();
$product=new Product();



if(!$user->isLoged() && !isset($_SESSION['admin_id'])){
    header("Location: ../login.php");
    exit();
}

if($user->isLoged() && $user->is_admin()){
   
    if($_SERVER["REQUEST_METHOD"]== "POST"){

        $name=$_POST["name"];    
        $description=$_POST["description"];
        $price=$_POST["price"];
        $image=$_POST["photo_path"];
        $quantity=$_POST["quantity"];
        $club_id=$_POST["club_id"];
        $category_id=$_POST["category_id"];

        $product=new Product();

    $create=$product->create_product($name,$description,$price,$image,$quantity,$club_id,$category_id);

    header("Location: add_product.php");

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
   <?php include_once 'header.php'?>
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
                    <input type="number" class="form-control" name= "quantity" id="quantity" placeholder="Quantity" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="number" class="form-control" name= "club_id" id="club_id" placeholder="Club ID" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="number" class="form-control" name= "category_id" id="category_id" placeholder="Category ID" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="hidden" class="form-control" name= "photo_path" id="photoPathInput">
                    <div id="dropzone-upload" class="dropzone"></div>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Add product</button>  
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


<div class="container mt-5">
  <div class="row">
    <div class="col-6">
      <h2>Clubs Table</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Club ID</th>
            <th scope="col">Club Name</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                $clubs=$product->fetch_club();
                foreach($clubs as $value){
            ?>
          <tr>
            <th scope="row"><?php echo $value["id"]?></th>
            <td> <?php echo $value["name"]?></td>
          </tr>
          <?php
          }
          
          ?>
        </tbody>
      </table>
    </div>
    <div class="col-6">
      <h2>Category table</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Club ID</th>
            <th scope="col">Club Name</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                $category=$product->fetch_category();
                foreach($category as $value){
            ?>
          <tr>
            <th scope="row"><?php echo $value["id"]?></th>
            <td> <?php echo $value["name"]?></td>
          </tr>
          <?php
          }
          
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
