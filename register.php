<?php

require_once "inc/header.php";
require_once "app/config/config.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Form</title>
    
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
                    <h5 class="card-title text-center">Registration Form</h5>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="retype" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="retype" name="retype" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="" disabled selected>Select your country</option>
                                <option value="1">Country 1</option>
                                <option value="2">Country 2</option>
                                <option value="3">Country 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="zip" name="zip">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    
    <link rel="stylesheet" href="bootsrap/css/mdb.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
  </head>
  <body>
  <section class="intro">
  <div class="mask d-flex align-items-center h-100 gradient-custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
          <div class="card">
            <div class="card-body p-5">

              <div class="row d-flex align-items-center">
                <div class="col-md-6 col-xl-7">

                  <div class="text-center pt-md-5 pb-5 my-md-5" style="padding-right: 24px;">
                    <i class="fas fa-laptop" style="color: #D6D6D6;"></i>
                  </div>

                </div>
                <div class="col-md-6 col-xl-4 text-center">

                
                <form  action="#" method="POST">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="">
                                    <input type="text"  name="firs_name" id ="first_name" value="" class="form-control rounded"  placeholder="First Name" aria-label="First Name"/>
                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                <input type="text"class="form-control rounded" name="last_name" id ="last_name" value="" placeholder="Last Name" aria-label="Last Name"/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control rounded" name="email" id ="email" value="" placeholder="Email" aria-label="Email"/>
                            
                        </div>

                        <div class="mb-4">
                            <input type="text" class="form-control rounded" name="username" id ="username" value="" placeholder="Username" aria-label="Username"/>
                            
                        </div>

                        
                        <div class="mb-4">
                            <input type="password" class="form-control rounded" name="password" id ="password" value="" placeholder="Password" aria-label="Password"/>
                            
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control rounded" name="retype" id ="retype" value="" placeholder="Retype Password" aria-label="Retype Password"/>
                            
                        </div>
                        <div class="mb-4">
                        <select class="form-select" aria-label="Default select example" name="country" id ="country" value="" placeholder="Country" aria-label="Country">
                        <option selected>Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                            
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                            <div class="">
                            <input type="text" class="form-control rounded" name="zip" id ="zip" value="" placeholder="" aria-label=""/>
                               
                            </div>
                            </div>
                            <div class="col">
                            <div class="">
                            <input type="text" class="form-control rounded" name="number" id ="number" value="" placeholder="Number" aria-label="Number"/>
                                
                            </div>
                            </div>
                        </div>
                        <div class="mb-4">
                        <input type="text" class="form-control rounded" name="adress" id ="adress" value="" placeholder="Adress" aria-label="Adress"/>
                            
                        </div>
                    
                        <div class="text-center">
                             <button class="btn btn-info btn-block btn-lg" type="submit">Register</button>
                                <p class="small mt-3 mb-4 text-muted">Forgot <span class="fw-bold"><a href="#!" class="text-muted">Username</a> / <a href="#!" class="text-muted">Password</a>?</span></p>
                              
                        </div>

                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>
-->


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
                   
                    <input type="text" class="form-control rounded" placeholder="First Name" name="first_name" id ="first_name" value="">
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
-->