<?php


include("db_config/connect.php");


if (isset($_POST["submit"])) {

    $chat = $_POST["chat"];
    $user_id=$_SESSION['userId'];
 

     // Insert user data into database
$sql = "INSERT INTO chats (user_id,chat, created_at) VALUES ('$user_id', '$chat',  NOW())";

    $result = mysqli_query($conn, $sql);

    header("location:../chat.php");
}

?>