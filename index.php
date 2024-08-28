<?php
@include("connect.php");
error_reporting(0);
$sql = "SELECT * FROM register";
$data = mysqli_query($conn,$sql);
$total = mysqli_num_rows($data);
 

 if($total !=0){
?>

<table border="1px solid">
<thead>
    <tr>
        <th>S No</th>
        <th>Image</th>
        <th>Name</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>CONFIRM PASSWORD</th>
        <th>OPERATIONS</th>
    </tr>
</thead>
<style>
    .btn{
        background-color: green;
     border-radius: 5px;
        color: white;
        /* padding: 4px; */
        margin: 3px;
        width: 300px;
    }
</style>


<?php

while($result = mysqli_fetch_assoc($data)){
echo "<tr>
<td>".$result['id']."</td>
<td><img src='".$result['image']."' width='100px'></td>
<td>".$result['name']."</td>
<td>".$result['email']."</td>
<td>".$result['password']."</td>
<td>".$result['conpassword']."</td>
<td><a class='btn' href='update.php?userid=".$result['id']."'>Update</a>
<a class='btn' href='delete.php?userid=".$result['id']."'>Delete</a></td>
</tr>";
}
 }
?>
</table>
<a href="form.php">Add user</a>