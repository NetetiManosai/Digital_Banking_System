<?php
$conn = mysqli_connect("localhost","root","","bank_project");
$id = 1004;
$sql = "SELECT image from rough WHERE rough_id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$re1 =  $row['image'];
echo $re1;
?>