<?php


session_start();
include("./db_config/connect.php");
include('./db_config/chataction.php');

if (!isset($_SESSION['logged_in'])) {
    header("location:./signup.php");
}


$sql = "SELECT u.id, c.id as chat_id, u.username, u.image, c.user_id, c.chat, c.created_at
        FROM user AS u
        JOIN chats AS c where  u.id = c.user_id
        ORDER BY c.created_at DESC";

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
    <link rel="stylesheet" href="./css/post.css">
</head>

<body>

    <div class="container-fluid ">
        <div class="row ">
            <div class="col-3 col-sm-3 col-md-3 col-xl-2 px-sm-2 px-0 bg-dark " style="min-height: 100vh;">
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
                                    <a href="./seepost2.php" class="nav-link px-0"> <span class="d-none d-sm-inline">All
                                            Posts</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>



                        </li>

                        <li>
                            <a href="./chat.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Chat</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./images/<?php echo $_SESSION['image'];?>" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
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
            <div class="col-9 col-sm-9 col-md-9 col-xl-10 py-0 px-0" style="background:linear-gradient(cornflowerblue,cornflowerblue,white);">
                <div style="width: 100%;height: 20vh; ">
                    <div style="width: 100%; height: 10%; background-color:cornflowerblue; margin: auto;" class="row">
                        <div class="col-8 d-flex justify-content-center" style="margin: auto;">
                            <form action="./chat.php" method="post" style="width: 100%; margin: auto;">

                                <div class="form-outline">
                                    <input type="text" id="form12" class="form-control" name="chat"
                                        style="width: 100%; margin: auto; border-radius: 20px; " />

                                </div>
                           
                        </div>
                        <div class="col-1  d-flex justify-content-center  " style="margin: auto;">
                           <button type="submit" name="submit" class="btn btn-lg btn-outline-light mt-2" style="margin: auto;border-radius: 20px;"> <i class="bi bi-send "></i></button>
                        </div>
                    </form>
                    </div>
                </div>

                <?php
    
                if(mysqli_num_rows($result) < 1){
                    echo "no data found";
                }else{
                    while($row = mysqli_fetch_assoc($result)){
                        $chat_id = $row['chat_id'];
                        $id = $row['id'];
                        $name = $row['username'];
                        $image = $row['image'];
                        $user_id = $row['user_id'];
                        $chat = $row['chat'];
                        $created_at = $row['created_at'];
                if($_SESSION['userId']==$id)
                {
                ?>
                    <div class="col-8 ms-auto m-1">
                <div class="container">
                    <img src="./images/<?php echo $image;?>" alt="Avatar" style="width:70%;">
                    <p><?php echo $chat;?></p>
                    <span class="time-right"><?php echo $created_at;?></span>
                  
                </div>
                </div>
                <?php } else{ ?>
                    <div class="col-8 me-auto m-1">
                  <div class="container darker">
                    <img src="./images/<?php echo $image;?>" alt="Avatar" class="right" style="width:70%;">
                    <p><?php echo $chat;?></p>
                    <span class="time-left"><?php echo $created_at;?></span>
                  </div>
               
            </div> 

            <?php } ?>
       
            <?php } ?>

            <?php } ?>

            </div>

        </div>
    </div>
    </div>

</body>

</html>

<!-- <div class="col-8 me-auto m-1">
                  <div class="container darker">
                    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:70%;">
                    <p>Hey! I'm fine. Thanks for asking!</p>
                    <span class="time-left">11:01</span>
                  </div>
               
            </div> -->