<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    <title>C-form</title>
</head>
<body>
<img class='logoimg' src= 'images/DKB-Bank-Logo.png'>
<div class="sinac">
        <h1 style = "font-size:50px">CUSTOMER FORM</h1>
        <P style = "color:azure">(To be filled by the customer)</P>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="mid">Manager Id:</label>
            <input type="text" id="mid" name="mid" required><br><br>
            <label for="cname">Name:</label>
            <input type="text" id="cname" name="cname" required><br><br>
            <label for="cpassword">Enter your Password:</label>
            <input type="password" id="cpassword" name="cpassword" required><br><br>
            <label for="cpassword1">Re enter your password:</label>
            <input type="password" id= "cpassword1" name="cpassword1" required><br><br>
            <label for="balance">Enter Your Initial Balance You want to deposite:</label>
            <input type="text" id= "balance" name="balance" required><br><br>
            <label for="profile">Insert Your image(Please Upload Image in JPEG Format Only):</label>
            <input type ="file" id = "profile" name = "profile" required><br><br>
            <p>Do you need any locker</p><br>
            <label for = "lockery">Yes</label>
            <input type = "radio" id = "lockery" name = "locker" value= "yes"><br><br>
            <button type="submit" style ="border:aqua">submit</button>
        </form>
    </div>
<?php
session_start();
 $timeout_duration = 900;
if (isset($_SESSION['LAST_ACTIVITY'])) {
    $duration = time() - $_SESSION['LAST_ACTIVITY'];
    if ($duration > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
$_SESSION['LAST_ACTIVITY'] = time();
if($_SERVER['REQUEST_METHOD'] ==  'POST')
{
    $profile = $_POST['profile'];
    $cname = $_POST['cname'];
    $cpassword = $_POST['cpassword'];
    $cfpassword = $_POST['cpassword1'];
    $image1 = addslashes(file_get_contents($profile));
    $balance = $_POST['balance'];
    $mid = $_POST['mid'];
    $sql = "SELECT *FROM managers WHERE m_id = $mid";
    $conn = mysqli_connect("localhost","root","","bank_project");
    $res = mysqli_query($conn,$sql);
    $val = $res->num_rows;

    if($cpassword != $cfpassword || filter_var($balance, FILTER_VALIDATE_FLOAT) == false ||$val==0)
    {
        echo "<script> alert('Please fill the form correctly and submit again');</script>";
        exit();
    }
    $balance = floatval($balance);
    $lck = "no";
    if (isset($_POST['locker'])) {
        $selected_option = $_POST['locker'];
        $lck =  htmlspecialchars($selected_option);
    }
    $nol = 0;
    if($lck == "yes")
    {
        $nol = 1;
    }
    $sql = "INSERT INTO customers(c_password,customer_name,c_balance,no_lockers,profilepic) VALUES('$cfpassword','$cname',$balance,$nol,'$image1') ;";
    if(mysqli_query($conn,$sql))
    {
        echo "<script> alert('Sucessfully added Customer');</script>";
        echo "Dear Customer,Congrats on creating a new account!!!";
    }
    $sql = "SELECT c_id FROM customers 
    WHERE customer_name = '$cname' AND c_password = '$cpassword' ;";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $cid = $row['c_id'];
    if($lck=="yes")
    {
     $nol = 1;
     $sql = "INSERT INTO lockers(c_id,gold,silver,documents,cash) VALUES($cid,0.00,0.00,0,0);";  
     if(mysqli_query($conn,$sql))
     {
         echo "Dear Customer,Congrats on creating a new locker!!!";
     }
    }
    $sql = "UPDATE managers
            SET noc_added = noc_added+1
            WHERE m_id = $mid ;";
    mysqli_query($conn,$sql);
    $sql = "UPDATE managers
    SET noc_added = noc_added+1
    WHERE m_id = $mid ;";
}
?>
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