<?php

require_once "inc/header.php";
require_once "app/config/config.php";


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
    <title>Shop</title>
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body>
    
            <div class="container">
            <form action="#" method="POST">
                <div class="mb-3 col-md-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id ="first_name" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id ="last_name" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id ="username" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id ="email" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id ="password" value="">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="retype" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" name="retype" id ="retype" value="">
                </div>
                <div class="mb-3 col-md-4">
                <label for="country" class="form-label">Country</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="d-flex row">
                <div class="col-md-1 mb-3">
                    <label for="inputZip">Number</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-md-2 mb-2">
                    <label for="number" class="form-label"></label>
                    <input type="number" class="form-control" name="number" id ="number" value="">
                </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="adress" class="form-label">Ardess</label>
                    <input type="text" class="form-control" name="adress" id ="adress" value="">
                </div>



                <input type="submit" class="btn btn-primary" value="Register">
        </form>
        </div>

    
   

</body>
</html>