<?php


include("db_config/connect.php");


if (isset($_POST["submit"])) {

    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];



    $FileName = $_FILES['image']['name'];
    $FileSize = $_FILES['image']['size'];
    $FileType = $_FILES['image']['type'];
    $FileTmp = $_FILES['image']['tmp_name'];

    // adding the usable types of an image into an array
    $ValidImageExtension = ['jpg', 'jpeg', 'png' , "jpeg"];

    // dividing the name into name + type using explode; it returns an array
    $imageExtension = explode('.', $FileName);

    $imageExtension = strtolower(end($imageExtension));
$checkEmail="Select* from user Where email='$email'";
$checkEmail_result = mysqli_query($conn, $checkEmail);

$rowCount = mysqli_num_rows($checkEmail_result);
$error = [];
$error1 = [];
if($rowCount>0)
{
    $error["email"]="email is already in use";
}
elseif (empty($name) || empty($email) || empty($password)) {
    array_push($error, "All fields are required");
    $error["name"] = "empty";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email is not valid");
}

elseif (strlen($password) < 5) {
    array_push($error, "Password too short");
}
elseif (strlen($name) > 15) {
    array_push($error, "name too long");
}
elseif ($password!= $confirm_password) {
    array_push($error, "different password");
}
elseif (!preg_match("/^[_a-zA-Z0-9]+$/", $name)|| !preg_match('/^[a-zA-Z0-9_\-\p{P}]+$/', $password)) {
    array_push($error, "invalid name or password");
}

elseif ($_FILES['image']['error'] === 4) {
    array_push($error, "Error while selecting an image");
} elseif (!in_array($imageExtension, $ValidImageExtension)) {
    array_push($error, "Wrong type of image");
} elseif ($FileSize > 10000000) {
    array_push($error, "File too large");
} 
else{
     // Generate unique image name
    $newImageName = uniqid();
    $newImageName .= '.' . $imageExtension;

     // Move uploaded file to "images" folder with new name
    move_uploaded_file($FileTmp, 'images/' . $newImageName);
     // Hash the password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

     // Insert user data into database
$sql = "INSERT INTO user (username, email, password,image, date) VALUES ('$name', '$email', '$password_hashed','$newImageName', NOW())";

    $result = mysqli_query($conn, $sql);

    header("location:../login.php");
}
}
?>