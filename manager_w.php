<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKB-Manager</title>
    <link rel = "icon" href = "images/DKB-Bank-Logo.png">
</head>
<body>
    
</body>
</html>
<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
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

$mname = "";
$mid = 0;

if (isset($_GET['mname'])) {
    $mname = htmlspecialchars($_GET['mname']);
}
if (isset($_GET['mid'])) {
    $mid = intval($_GET['mid']);
}

echo "
<img class='logoimg' src= 'images/DKB-Bank-Logo.png'>
<div class='logout'>
     <button onclick='logout()'>LOGOUT</button>
        </div>
<center><h1>Welcome Mr/Ms $mname</h1>
<p style = 'color:lightyellow'> Welcome to DKB, we are pleased to have you as the account manager and look forward to supporting your banking needs.</p></center>
";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class="mangf">
        <div class="addcus">
            <img src="images/addcus.jpg">  <p onclick="addcus()">ADD CUSTOMER</p>
        </div>
        <div class="remcus">
        <img src="images/remcus.jpg">  <p onclick="remcus()">REMOVE CUSTOMER</p>
        </div>
        <div class="udmd">
        <img src="images/udmd.jpg"> <p onclick="udmd()">UPDATE DETAILS</p>
        </div>
        
    </div>
<script>
function addcus() {
    window.location.href = 'addcus.php';
}
function remcus() {
    window.location.href = 'remove_customer.php';
}
function udmd() {
    const mid = <?php echo $mid; ?>;
    const page = `update_manager_details.php?mid=${mid}`;
    window.location.href = page;
}
function logout() {
    
    window.location.href = 'login.php';
}

</script>
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


