<?php

@include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Email</label>
        <input type=" email" name="email">
        <label for="">Password</label>
        <input type=" text" name="password">
        <label for="">Confirm Password</label>
        <input type=" text" name="conpassword">
        <label for="">Image</label>
        <input type="file" name="file">
        <button type="submit" id="submit" name="submit">submit</button>
        
    </form>

</body>

</html>
<?php

if (isset($_POST['submit'])) {


    $filename = $_FILES["file"]["name"]; 
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname,$folder);
    // echo "<img src='$folder'>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

 $sql =   "INSERT INTO `register` (`image`,`name`, `email`, `password`, `conpassword`) VALUES ('$folder','$name', '$email', '$password', '$conpassword')";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php");
}


?>