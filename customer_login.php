<!DOCTYPE html>
<html>
    <head>
        <title>Customer Login</title>
        <link rel = "stylesheet" href = "style.css">
        <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    </head>
    <body>
    <img class="logoimg" src= "images/DKB-Bank-Logo.png">
        <div class="sign-in">
        <h1>Customer Login</h1>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
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
           $cname = "";
           $cpassword = "";
           if($_SERVER['REQUEST_METHOD']=='POST'){
              $cname = $_POST['username'];
              $cpassword = $_POST['password'];
              $conn = mysqli_connect("localhost","root","","bank_project");
              $sql = "SELECT * FROM customers WHERE customer_name = '$cname' AND c_password ='$cpassword'";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)==0){
                exit();
              }
              $row = mysqli_fetch_assoc($result);
              $cbalance = $row['c_balance'];
              $cid = $row['c_id'];
              $page = "customer_w.php";
              $page = $page."?cname=$cname&cid=$cid";
              header("Location:$page");
           }
           session_unset();
        ?>
    </body>
</html>
