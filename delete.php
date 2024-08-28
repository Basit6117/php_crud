<?php
@include("connect.php");
$userid = $_GET['userid'];
$sql = "DELETE FROM register WHERE id='$userid'";
$data = mysqli_query($conn,$sql);
 header("Location: index.php");

?>