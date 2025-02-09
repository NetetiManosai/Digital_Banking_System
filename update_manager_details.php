<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager-Update</title>
  <link rel = "stylesheet" href = "style.css">
  <link rel = "icon" href = "images/DKB-Bank-Logo.png">
</head>
<body>
<img class="logoimg" src= "images/DKB-Bank-Logo.png">
    <form method = "post">
      <div class="sign">
      <center><h1>Update Details</h1></center>
      <lable for = "mname">Enter new Name:</lable>
      <input type = "text" name = "mname"  required> <br><br>
      <lable for = "mpassword">Enter Your New Password:</lable>
      <input type = "password" name = "mpassword" required><br><br>
      <lable for = "mpassword1">Re-enter New Password:</lable>
      <input type = "password" name = "mpassword1" required><br><br>
      <input type = "submit" name = "submit" value="submit">
      <button onclick="back()">back</button>
    </form>
</div>
    <script>
function back(){
  window.location.href = 'login.php';
}
  </script>
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
$mid = 0;
if(isset($_GET['mid'])){
  $mid = intval($_GET['mid']);
}
$nmname = "";
$nmpassword = "";
$nmpassword1 = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $nmname = $_POST['mname'];
  $nmpassword = $_POST['mpassword'];

  $nmpassword1 = $_POST['mpassword1'];
}
if(!ctype_alpha($nmname)||strlen($nmname)<=2||$nmpassword!=$nmpassword1){
  echo "<script>alert('Enter The details properly');</script>";
  exit();
}
$conn = mysqli_connect("localhost","root","","bank_project");
$sql = "UPDATE managers
        SET manager_name = '$nmname', m_password = '$nmpassword1'
        WHERE m_id = $mid;";
$result = mysqli_query($conn,$sql);
if($result){

  echo "<script>alert('Manager Details Updated Sucessfully');</script>";
  exit();
}


?>
