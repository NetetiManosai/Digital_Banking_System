<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "icon" href = "images/DKB-Bank-Logo.png">
  <link rel = "stylesheet" href = "style.css">
  <title>C-Deposite</title>
</head>
<body>
<img class="logoimg" src= "images/DKB-Bank-Logo.png">
<div class="sign">
    <form method = "post">
      <center><h1>Cash-Deposite Page</h1></center>
      <lable for = "cash">Enter amount to Deposite:</lable>
      <input type = "text" name = "cash" required> <br><br>
      <lable for = "cash1">Re-enter the amount:</lable>
      <input type = "text" name = "cash1"  required><br><br>
      <lable for = "password">Enter Your password:</lable>
      <input type = "password" name = "password" required><br><br>
      <button type = "submit">submit</button>
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
    $cbalance = 0;
    $amt1 = 0;
    $amt2 = 0;
    if(isset($_GET['cid'])){
      $cid = intval($_GET['cid']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $amt1 = $_POST['cash'];
      $amt2 = $_POST['cash1'];
      $cpassword = $_POST['password'];
    
    $conn = mysqli_connect("localhost","root","","bank_project");
    $sql = "SELECT * FROM customers WHERE c_id = $cid AND c_password ='$cpassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $cbalance = $row['c_balance'];
    if(!is_numeric($amt1)||(!is_numeric($amt1)||$amt1!=$amt2 ||(mysqli_num_rows($result)==0)||$amt1<0)){
      echo "<script>alert('Enter the details properly again');</script>";
      exit();
      session_destroy();
    }
    $amt1 = $cbalance+$amt2;
    $sql = "UPDATE customers SET c_balance = $amt1 WHERE c_id = $cid ;";
    mysqli_query($conn,$sql);
    echo "<script>alert('Deposite Sucessfull');</script>";
  }
  ?>