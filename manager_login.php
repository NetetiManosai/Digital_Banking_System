<!DOCTYPE html>
<html>
    <head>
        <title>Manager Login</title>
        <link rel = "stylesheet" href = "style.css">
        <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    </head>
    <body>
    <img class="logoimg" src= "images/DKB-Bank-Logo.png">
        <div class="sign-in">
        <h1>Manager Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="mname" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="mpassword" required><br><br>
            <button type="submit">submit</button>
        </form>
        </div>
        <?php
          $mname = "";
          $mpassword = "";
          if($_SERVER["REQUEST_METHOD"]=='POST')
          {
              $mname = $_POST['mname'];
              $mpassword = $_POST['mpassword'];
          }
          $conn = mysqli_connect("localhost","root","","bank_project");
          $sql = "SELECT * FROM managers WHERE manager_name = '$mname' AND m_password = '$mpassword'; ";
          $result = mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) == 0)
          {
            echo "<p>Please enter correct Username and password</p>";
            session_reset();
          }
          else{
          $row = mysqli_fetch_assoc($result);
          $mid = $row['m_id'];
          $page = "manager_w.php";
          $page = $page."?mname=$mname&mid=$mid";
          session_reset();
          header("Location: $page");
          }
        ?>
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
    </body>
</html>
