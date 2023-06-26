<?php


include("./db_config/connect.php");
session_start();


if (!isset($_SESSION['logged_in'])) {
    header("location:login.php");
}


$userid=$_SESSION['userId'];

$userid = $_SESSION['userId'];
$sql = "SELECT COUNT(id) AS countid FROM post WHERE user_id='$userid'";
$result1 = mysqli_query($conn, $sql);

if ($result1) {
    $row = mysqli_fetch_assoc($result1);
    $count = $row['countid'];
    
} else {
    echo "Error executing query: " . mysqli_error($conn);
}


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
<link rel="stylesheet" href="./css/style.css">

</head>
<body>
    


    <div class="container-fluid" >
        <div class="row " align="center ">
            <div class=" col-3 col-lg-2 col-xl-2 bg-dark" style=" min-height:100vh;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100  side  " >
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">IUL</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
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
                                    <a href="./seepost2.php" class="nav-link px-0"> <span class="d-none d-sm-inline">All Posts</span> </a>
                                </li>
                               
                            </ul>
                        </li>
                        
                 
                  
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Chat</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./images/<?php echo $_SESSION['image'];?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="./addpost.php">Add Post</a></li>
                            
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                        </ul>
                    </div>
                    </div>
            </div>
            <div class="col-9 col-md-9 col-lg-10 " >
                
    <section class=" gradient-custom-2">
        <div class="container-fluid   " >
            <div class="row d-flex justify-content-center align-items-center mt-4 mb-4">
                <div class="col col-lg-9 col-xl-12">
                    <div class="card card3" >
                        <div class="rounded-top text-white d-flex flex-row justify-content-center"
                            style="background-color: #000; width: 100%;" >
                            <div class="ms-4 mt-5 d-flex flex-column">
                                
                                <img src="./images/<?php echo $_SESSION['image']?>"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2 "
                                    style=" z-index: 1;width: 150px;height: 100px;  ">
                                    <div class="ms-3" style="margin-top: 10px;">
                                <h5><?php echo $_SESSION['username']?></h5>
                                
                            </div><a href="./editprofile.php">
                                <button type="button" class="btn btn-outline-dark mb-4 text-light " data-mdb-ripple-color="dark"
                                    style="z-index: 1;width: 150px;">
                                    Edit profile
                                </button></a>
                                
                            </div>
                          
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-center text-center py-1">
                                <div>
                                    <p class=" h5"><?php echo $count;?></p>
                                    <p class="small text-muted mb-0">Photos</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body p-2 text-black">
                         
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="lead fw-normal mb-0">Recent photos</p>
                                
                            </div>



                            <?php

$id=$_SESSION['userId'];

$query = "SELECT u.id, p.id as post_id, u.username, u.image, p.user_id, p.description, p.post_img, p.created_at
            FROM user AS u
            JOIN post AS p where  '$id' = p.user_id
            and u.id = $id
            ORDER BY p.created_at DESC";

$result_ = mysqli_query($conn , $query);
    
    if(mysqli_num_rows($result_) > 0){
        while($row = mysqli_fetch_assoc($result_)){
            $post_id = $row['post_id'];
            $id = $row['id'];
            $name = $row['username'];
            $image = $row['image'];
            $user_id = $row['user_id'];
            $description = $row['description'];
            $post_image = $row['post_img'];
            $created_at = $row['created_at'];
$_SESSION['postidspec']=$post_id;
        
    
     
    ?>





                            <div class="row g-2 d-flex justify-content-center">
                                <div class="col-10 col-md-6  mb-2">
                                    <img src="./images/<?php echo $post_image?>"
                                        alt="image 1" class="w-100 rounded-3">
                                </div>
                             
                            </div>
                      




                            <?php } ?>
        <?php } ?>






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












  <!--
                <section id="homesection2 ">
                    <div class="container-fluid">
                        <div class="row pt-5 pb-5 d-flex justify-content-center">
                            <div class="col-8">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./myimages/study17.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./myimages/study16.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./myimages/study15.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            -->