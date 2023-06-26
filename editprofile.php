<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("location:signup.php");
}

include("./db_config/editprofileaction.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>

    <body>


        <div class="container-fluid ">
            <div class="row ">
                <div class="col-3 col-sm-3 col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
                    <div
                        class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 side ">

                        <a href="/"
                            class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">IUL</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item">
                                <a href="./home.php" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Posts</span> </a>
                                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="./seepost2.php" class="nav-link px-0"> <span
                                                class="d-none d-sm-inline">All Posts</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                      
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Chat</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./images/<?php echo $_SESSION['image'];?>" alt="hugenerd" width="30"
                                    height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="./addpost.php">Add Post</a></li>
                               
                                <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-9 col-md-9 col-lg-10 py-0 px-0">
                    <section class="section5">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                        <div class="card-body p-5 text-center">

                                            <div class="mb-md-5 mt-md-4 pb-5">

                                                <h2 class="fw-bold mb-2 text-uppercase">Edit profile</h2>
                                                
                                                <form action="editprofile.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-outline form-white mb-4">
                                                        <label class="form-label"
                                                            for="textAreaExample">New Username</label>
                                                        <div class="form-outline">
                                                            <input type="text" name="username" id="form12"
                                                                class="form-control" />

                                                        </div>


                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <label class="form-label" for="customFile">New Profile Picture</label>
                                                        <input type="file" class="form-control" id="customFile"
                                                            name="image" />
                                                    </div>
                                                    <center>
                                                    <button type="submit" class="btn btn-outline-light btn-lg px-5 mb-4"
                                                        name="submit">Confirm
                                                    </button>
                                                    <br>
                                                    <button type="submit" class="btn btn-outline-light btn-lg px-5 "
                                                        name="delete">Delete Account
                                                    </button>
                                                    </center>
                                                </form>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>






                </div>
            </div>
        </div>
    </body>


</html>