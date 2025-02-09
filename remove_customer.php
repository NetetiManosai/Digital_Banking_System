<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "style.css">
    <link rel = "icon" href = "images/DKB-Bank-Logo.png">
  <title>Remove-Customer</title>
</head>
<body>
<img class='logoimg' src= 'images/DKB-Bank-Logo.png'>
<div class="sign">
    <form method = "post">
      <center><h1>Remove Customer</h1></center>
      <lable for = "cid">Enter ID of Customer To be Removed:</lable>
      <input type = "text" name = "cid"  required> <br><br>
      <input type = "submit" name = "Remove"  value="Remove">
    </form>
</div>
<div class="footer">
            <div class="f1">
                About
            </div>
            <div class="f1">
                FAQ
            </div>
            <div class="f1">
                Help Center
            </div>
            <div class="f1">
                Terms of use
            </div>
           
        </div>
</body>
</html>
<?php
    session_start();
    $cid  = 0;
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $cid = intval($_POST['cid']);
      if(isset($_POST['Remove']))
      {
      $conn = mysqli_connect("localhost","root","","bank_project");
      $sql = "SELECT * FROM customers WHERE c_id = $cid";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if((mysqli_num_rows($result)==0)){
        echo "<script>alert('Recheck the ID properly again');</script>";
        exit();
        session_destroy();
    }
    $sql = "DELETE FROM customers  WHERE c_id = $cid ;";
    If(mysqli_query($conn,$sql))
    {
      echo "<script>alert('Customer Account has been Sucessfully deleted');</script>";
    }
    exit();
}
  }
  ?>