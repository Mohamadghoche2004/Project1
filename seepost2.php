<?php


session_start();
include("./db_config/connect.php");

if (!isset($_SESSION['logged_in'])) {
    header("location:./signup.php");
}


$sql = "SELECT u.id, p.id as post_id, u.username, u.image, p.user_id, p.description, p.post_img, p.created_at
        FROM user AS u
        JOIN post AS p where  u.id = p.user_id
        ORDER BY p.created_at DESC";

$result = mysqli_query($conn , $sql);





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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    
    
</head>

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
                            <i class="fs-4 bi-grid"></i> <span
                                    class="ms-1 d-none d-sm-inline">Posts</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="./seepost2.php" class="nav-link px-0"> <span class="d-none d-sm-inline">All Posts</span> 
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
                        <a href="./chat.php" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./images/<?php echo $_SESSION['image'];?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
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
            <div class="col py-0 px-0">



            <?php
    
    if(mysqli_num_rows($result) < 1){
        echo "no data found";
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $id = $row['id'];
            $name = $row['username'];
            $image = $row['image'];
            $user_id = $row['user_id'];
            $description = $row['description'];
            $post_image = $row['post_img'];
            $created_at = $row['created_at'];
    
    ?>
    <div class="post-container ">
        <div class="post-header ">
           <img src="./images/<?php echo $image?>" alt="User Avatar">
           <a href="./profileuser.php?id=<?php echo $id; ?>" class="text-light"><h5><?php echo $name; ?></h5></a>
        </div>
        <div class="post-content">
            <img src="./images/<?php echo $post_image?>" class="post-image" alt="Post Image">
            <p class="text-light"><?php echo $description?></p>
        </div>
       
        <div class="post-date">
            <p>Posted on <?php echo $created_at?></p>
        </div>
<?php if($_SESSION['userId']==$id){?>
    <a href="./delete.php?postid=<?php echo $post_id;?>">
    <button type="submit" name="delete " class="btn btn-lg btn-outline-light">Delete</button></a>
        <?php }?>
    </div>
    <?php } ?>

    <?php } ?>


            </div>
        </div>
    </div>
</body>

</html>