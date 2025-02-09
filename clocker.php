<!DOCTYPE html>
<html>
    <head>
        <title>Locker Login</title>
        <link rel = "stylesheet" href = "style.css">
        <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    </head>
    <body>
    <img class="logoimg" src= "images/DKB-Bank-Logo.png">
        <div class="sign-in">
        <h1>Locker Login</h1>
        <form method="post">
            <label for="username">Customer Accno:</label>
            <input type="text" id="username" name="cid" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type = "submit">submit</button>
        </form>
        </div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
         <br> <br> <br> <br> <br> <br> <br> <br> <br> 
         <br> <br>  <br> <br> <br> <br>
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
           
        <?php
        session_start();
           $cid = 0;
           $cpassword = "";
           if($_SERVER['REQUEST_METHOD']=='POST'){
              $cid = intval($_POST['cid']);
              $cpassword = $_POST['password'];
              $conn = mysqli_connect("localhost","root","","bank_project");
              $sql = "SELECT * FROM lockers WHERE c_id = $cid";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)==0){
                exit();
              }
              $sql1 = "SELECT * FROM customers WHERE c_id = $cid and c_password = '$cpassword'";
              $result1 = mysqli_query($conn,$sql1);
              if(mysqli_num_rows($result1)==0){
                exit();
              }
              $row = mysqli_fetch_assoc($result);
              $cid = $row['c_id'];
              $page = "locker_w.php";
              $page = $page."?cid=$cid";
              header("Location:$page");
           }
           session_unset();
        ?>
    </body>
</html>
