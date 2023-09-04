<?php

require_once "inc/header.php";
require_once "app/config/config.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    
    <!-- MDB CSS (Include the path to your MDB CSS file) -->
    <link rel="stylesheet" href="path-to-your-mdb-css/mdb.min.css">
    
    <!-- Font Awesome Icons (if not already included in MDB) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="username_email" class="form-label">Username or Email</label>
                            <input type="text" class="form-control" id="username_email" name="username_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="mt-3 text-center"><a href="#">Forgot Password?</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MDB JavaScript (Include the path to your MDB JavaScript file) -->
<script src="path-to-your-mdb-js/mdb.min.js"></script>

</body>
</html>

<?php

    require_once "inc/footer.php";
    ?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Shop</title>
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body>
    
            <div class="container">
            <form action="#" method="POST">
                <div class="mb-3 col-md-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id ="username" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id ="password" value="">
                </div>

                <input type="submit" class="btn btn-primary" value="Login">
        </form>
        </div>
</body>
</html>
-->