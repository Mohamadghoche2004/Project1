<?php

include("./db_config/connect.php");

$id=$_GET['postid'];
if(isset($_POST['submit']))
{
    $query="DELETE FROM post WHERE id='$id'";
    $results=mysqli_query($conn,$query);
    if($results)
    {header('location:seepost2.php');}
}


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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<style>
    .row1{
        margin-top: 20%;
    }
    button{
        width: 100%;
    }

</style>
</head>
<body>
    
<div class="container-fluid">
    <div class="row row1">
        <div class="col-12" align="center">
            <h1>DO YOU WANT TO DELETE THIS POST ??</h1>

        </div>
        <div class="row ">

            <div class="col-3 d-flex justify-content-center ms-auto">
            <form action="./delete.php?postid=<?php echo $id; ?>" method="post" style="width:100%;">
                <button type="submit" name="submit" class="btn  btn-lg btn-outline-danger">YES</button>
            </form>
                </div>
                <div class="col-3 me-auto">
                    <a href="./seepost2.php">
                <button class="btn  btn-lg btn-outline-success">NO</button></a>
            </div>
            </div>
    </div>
</div>



</body>
</html>