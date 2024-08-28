<?php
@include("connect.php");
$userid = $_GET['userid'];

$sql = "SELECT * FROM register WHERE id='$userid'";
$data = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($data);
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
        <input type="text" value="<?php echo $result['name'] ?>" name="name">
        <label for="">Email</label>
        <input type=" email" value="<?php echo $result['email'] ?>" name="email">
        <label for="">Password</label>
        <input type=" text" value="<?php echo $result['password'] ?>" name="password">
        <label for="">Confirm Password</label>
        <input type=" text" value="<?php echo $result['conpassword'] ?>" name="conpassword">
        <label for="">Image</label>
        <input type="file" name="file" value="<?php echo $result['image'] ?>">
        <button type="submit" id="update" name="update" value="Update">Update</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];


    if ($_FILES['file']['name']) {
        $filename = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $folder = "images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            $current_image = $result['image'];
            if ($current_image && file_exists("images/" . $current_image)) {
                unlink("images/" . $current_image);
            }
            $sql .= ", image='$filename'";
        } else {
            echo "Failed to upload new image.";
            exit;
        }
    }
    $sql = "UPDATE `register` SET image='$folder',name='$name',  email='$email', password='$password', conpassword='$conpassword'";

    $sql .= " WHERE id='$userid'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!";
    } else {
        echo "Failed to update record in database.";
    }

    header("Location: index.php");
    exit;
}
?>
