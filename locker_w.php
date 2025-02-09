<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    <title>Locker</title>
</head>
<body>
<img class="logoimg" src= "images/DKB-Bank-Logo.png">
<div class='logout'>
     <button onclick='logout()'>LOGOUT</button>
        </div>
<div class="start">
    <center>
        <h1>Locker Page</h1>
    </center>
</div>
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
$cid = 0;
if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
}
$conn = mysqli_connect("localhost","root","","bank_project");
$sql = "SELECT * FROM customers WHERE c_id = $cid";
$sql1 = "SELECT * FROM lockers WHERE c_id = $cid";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$cname = $row['customer_name'];
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$gold = $row1['gold'];
$silver = $row1['silver'];
$documents = $row1['documents'];
$cash = $row1['cash'];
echo "<center><h2>Welcome Mr/Ms $cname </h2><p style ='color:white' >Your security is our priority. Protect your 
valuables with DKB's trusted locker services.</p></center>";

?>
<div class="mangf">
        <div class="addcus">
            <img src="images/gold.jpg">  <p onclick="goldpage()">GOLD AND SILVER</p> <h4>Gold :<?php echo $gold?> gms Sliver: <?php echo $silver?> gms</h4>
        </div>
        <div class="remcus">
        <img src="images/documents.jpg">  <p onclick="documentspage()">DOCUMENTS</p>  <h4>Documents: <?php echo $documents?> </h4>
        </div>
        <div class="udmd">
        <img src="images/cash.jpg"> <p onclick="cashpage()">CASH</p>  <h4>Cash: <?php echo $cash?> </h4>
        </div>
    </div>
    <script>
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