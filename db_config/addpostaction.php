<?php


include("./db_config/connect.php");


if (isset($_POST["submit"])) {

    $desc = $_POST["desc"];

    $FileName = $_FILES['image']['name'];
    $FileSize = $_FILES['image']['size'];
    $FileType = $_FILES['image']['type'];
    $FileTmp = $_FILES['image']['tmp_name'];

    // adding the usable types of an image into an array
    $ValidImageExtension = ['jpg', 'jpeg', 'png', 'jpeg'];

    // dividing the name into name + type using explode; it returns an array
    $imageExtension = explode('.', $FileName);
    $imageExtension = strtolower(end($imageExtension));

    $error = [];

    // checking if the name or email or password or the repeated password are not empty
    if (empty($desc)) {
        array_push($error, "All fields are required");
        $error["name"] = "empty";
    } elseif ($FileSize > 10000000) {
        array_push($error, "File too large");
    } elseif (!in_array($imageExtension, $ValidImageExtension)) {
        array_push($error, "Wrong type of image");
    }
     else {


        // Generate unique image name
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        // Move uploaded file to "images" folder with new name
        move_uploaded_file($FileTmp, 'images/' . $newImageName);
        // Hash the password
 
        $user_id = $_SESSION['userId'];
        // Update user data in the database
        $sql = " INSERT INTO post (user_id , description , post_img , created_at) VALUES ('$user_id' , '$desc' , '$newImageName' , NOW())";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            header("location:./seePost2.php");
            exit();
        } else {
            // Error occurred while updating, handle the error
            // ...
        }
        
    }

}
?>
