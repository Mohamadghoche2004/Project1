<?php

include("./db_config/signupaction.php");

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!--  <link rel="stylesheet" href="style.css">
    <script>
        window.onload = function () {
            image2.style.transform = "translateX(15px)"
        }
    </script>-->
    
    <style>
    input::placeholder{
        color: red;
    }

    </style>
</head>

<body>

    
    <section class=" signup-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-11">
                    <div class=" text-black" style="border-radius: 25px;">
                        <div class=" p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-primary">Sign up</p>

                                    <form enctype="multipart/form-data" class="mx-1 mx-md-4" method="post" action="signup.php">
                                    <?php
$error = "";
if (isset($_POST["submit"])) {
    if (strlen($name) > 15) {
        $error = "Username is too long";
    } elseif (empty($name)) {
        $error = "You must enter your username";
    } elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $name)) {
        $error = "Invalid username";
    }
}
?>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Username</label>
                                                <input type="text" id="form3Example1c" class="form-control text-primary" name="username" placeholder="<?php echo $error; ?>" />
                                  
                                            </div>
                                        </div>
                                        
                                        <?php
$error="";
if (isset($_POST['submit'])) {
    if (empty($email)) {
      $error= " You must enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        $error= "Email invalid";
    }



    if ($rowCount > 0) {
     
        
        $error= "Email already exist";
    }
}


?>

                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Enter a valid email</label>
                                                <input type="email" id="form3Example3c" class="form-control" name="email" placeholder="<?php echo $error; ?>" />

                                            </div>
                                        </div>

                                        <?php

if (isset($_POST['submit'])) {
    $error="";
    if (empty($password)) {
      $error="You must enter your password";
    } elseif (strlen($password) < 5) {
        $error="Password is too short";
    } elseif (!preg_match('/^[a-zA-Z0-9_\-\p{P}]+$/', $password)) {
        $error="Password invalid";
    }
}


?>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Create a password</label>
                                                <input type="password" id="form3Example4c" class="form-control" name="password" placeholder="<?php echo $error; ?>" />

                                            </div>
                                        </div>
                                        <?php
        if (isset($_POST["submit"])) { $error="";
            if ($password !== $confirm_password) {
                $error="Password invalid";
            }
        }

        ?>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                                <input type="password" id="form3Example4cd" class="form-control" name="confirm_password" placeholder="<?php echo $error; ?>" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Choose a picture</label>
                                                <input type="file" id="form3Example4cd" class="form-control" name="image"  />

                                            </div>
                                          
                                            
                                        </div>

                        

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 mt-3">
                                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class=" col-sm-6 col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 justify-content-center "align="center">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid  w-1" id="image2" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
<!--<script src="project.js"></script>-->

</html>