<?php
include('./db_config/connect.php');

$id=$_SESSION['userId'];
if(isset($_POST['submit']))
{
    $name=$_POST["username"];

    $FileName = $_FILES['image']['name'];
    $FileSize = $_FILES['image']['size'];
    $FileType = $_FILES['image']['type'];
    $FileTmp = $_FILES['image']['tmp_name'];

    // adding the usable types of an image into an array
    $ValidImageExtension = ['jpg', 'jpeg', 'png' , "jpeg"];

    // dividing the name into name + type using explode; it returns an array
    $imageExtension = explode('.', $FileName);

    $imageExtension = strtolower(end($imageExtension));

    $error = [];

    // checking if the name or email or password or the repeated password are not empty
    if (empty($name)) {
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
      $sql = "UPDATE user SET username='$name',image='$newImageName' WHERE id='$id'";
      $result=mysqli_query($conn,$sql);
      
      if ($result) {
        $_SESSION['username'] = $name;
        $_SESSION['image'] = $newImageName;
        header("location: profile.php");
        exit();}
      }

      



}

if (isset($_POST["delete"])) {

  $id = $_SESSION['userId'];

  $sql = "DELETE FROM user WHERE id = '$id'";
  $result1 = mysqli_query($conn, $sql);

  header("location:logout.php");

  if ($result1) {
      echo "Record deleted successfully";
  } else {
  }
}




?>
