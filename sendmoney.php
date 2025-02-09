<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "style.css">
  <link rel = "icon" href = "images/DKB-Bank-Logo.png">
  <title>C-Transfer</title>
</head>
<body>
<img class="logoimg" src= "images/DKB-Bank-Logo.png">
<div class="sign">
    <form method = "post">
      <center><h1>Cash-Transfer Page</h1></center>
      <lable for = "cash">Enter amount to Transfer:</lable>
      <input type = "text" name = "cash"  required> <br><br>
      <lable for = "cash1">Enter the Account Id of customer:</lable>
      <input type = "text" name = "tcid"  required><br><br>
      <lable for = "password">Enter Your password:</lable>
      <input type = "password" name = "password"  required><br><br>
      <input type = "submit" name = "submit" value="submit">
    </form>
    </div>
</body>
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
</html>
<?php
    session_start();
    $cid  = 0;
    $cbalance = 0;
    $amt = 0;
    $tcid = 0;
    if(isset($_GET['cid'])){
      $cid = intval($_GET['cid']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $amt = intval($_POST['cash']);
    $tcid = intval($_POST['tcid']);
    $cpassword = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","bank_project");
    $sql = "SELECT * FROM customers WHERE c_id = $cid AND c_password ='$cpassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "SELECT * FROM customers WHERE c_id = $tcid ;";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    if(!is_numeric($amt)||(mysqli_num_rows($result)==0)||$amt<0 ||(mysqli_num_rows($result1)==0)){
        echo "<script>alert('Invalid Details or Balance insufficient');</script>";
        exit();
        session_destroy();
      }
    $cbalance = $row['c_balance'];
    $cbalance1 = $row1['c_balance'];
    if($amt>$cbalance){
        echo "<script>alert('Invalid Details or Balance insufficient');</script>";
        exit();
    }
    $cbalance1 = $cbalance1+$amt;
    $sql = "UPDATE customers SET c_balance = $cbalance1 WHERE c_id = $tcid ;";
    mysqli_query($conn,$sql);
    $sql = "UPDATE customers SET c_balance = $cbalance-$amt WHERE c_id = $cid ;";
    mysqli_query($conn,$sql);
    echo "<script>alert('Transaction Sucessfull');</script>";
  }
  ?>