<?php
require_once "app/config/config.php";
require_once "app/classes/user.php";

$user=new User();

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
    <meta name="viewport" content="width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Header</title>
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar_color">
  <div class="container-fluid">
  <a class="navbar-brand navbar-text" href="index.php">Premier
      <img src="public/images/logo1.png" alt="Logo" width="50" height="35" class="d-inline-block align-text-top">
        League 
    </a>
      
    <button class="navbar-toggler navbar-text" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon navbar-text"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

    <form class="d-flex" role="search" method='GET' action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'>
      <button class="btn search_modify" style="color:#340040;" type="submit">Search</button>
    </form>
      <ul class="navbar-nav">
     
      
        <?php
          if(!$user->isLoged()){
        ?>
        <li class="nav-item">
          <a class="nav-link navbar-text" href="login.php"><i class="bi bi-person-fill margin_cart"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-text " href="register.php"><i class="bi bi-person-fill-gear margin_cart"></i> Register</a>
        </li>
        <?php
          }elseif(!$user->is_admin() && $user->isLoged()){
        ?>
        <li class="nav-item">
          <a class="nav-link navbar-text" aria-current="page" href="cart.php"><i class="bi bi-basket3-fill margin_cart"></i>Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-text" aria-current="page" href="my_orders.php"><i class="bi bi-bag-fill margin_cart"></i> My orders</a>
        </li>
          <li class="nav-item">
          <a class="nav-link navbar-text " href="logout.php"><i class="bi bi-person-fill-gear margin_cart"></i> Log Out</a>
        </li>
          <?php
          }elseif($user->is_admin() && $user->isLoged()){
          ?>
          <li class="nav-item">
          <a class="nav-link navbar-text" aria-current="page" href="admin/add_product.php"><i class="bi bi-bag-fill margin_cart"></i>Admin Dasbord</a>
        </li>
          <li class="nav-item">
          <a class="nav-link navbar-text " href="logout.php"><i class="bi bi-person-fill-gear margin_cart"></i> Log Out</a>
        </li>
          <?php }?>
      </ul>
    </div>
  </div>
</nav>
<p><?php echo $porukaTekst?></p>
</body>
</html>