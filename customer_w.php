<!DOCTYPE html>
<html lang="en">
<head>
<link rel = "stylesheet" href = "style.css">
<link rel = "icon" href = "images/DKB-Bank-Logo.png">
    <title>DKB-Customer</title>
    <title></title>
</head>
<body>
    
</body>
</html>
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

$cname = "";
$cid = 0;
$cbalance = 0.00;
$profile = "";
if (isset($_GET['cname'])) {
    $cname = htmlspecialchars($_GET['cname']);
}

if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
}
if (isset($_GET['cbalance'])) {
    $cbalance = intval($_GET['cbalance']);
}
$conn = mysqli_connect("localhost","root","","bank_project");
$sql = "SELECT * FROM customers WHERE c_id = $cid";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$cbalance = $row['c_balance'];
echo "
<img class='logoimg' src= 'images/DKB-Bank-Logo.png'><div class='logout'>
     <button onclick='logout()'>LOGOUT</button>
        </div><center><h1>Welcome Mr/Ms $cname</h1></center>";

echo "<center><h1>YOUR ID: $cid</h1><h2>Balance : RS $cbalance</h2><p style = 'color:lightyellow'> Dear customer, welcome to DKB Bank. We’re here to assist you with all your banking needs.</p></center></center>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    <title>DKB-Customer</title>
</head>
<body>
<div class="mangf">
        <div class="addcus">
            <img src="images/withdraw.jpg">  <p onclick="withdraw()">WITHDRAW MONEY</p>
        </div>
        <div class="remcus">
        <img src="images/deposite.jpg">  <p onclick="deposit()">DEPOSITE MONEY</p>
        </div>
        <div class="udmd">
        <img src="images/transfer.jpg"> <p onclick="transfer()">TRANSFER MONEY</p>
        </div>
        
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

    <script>
function logout() {
    
    window.location.href = 'login.php';
}

        function withdraw() {
            const cid = <?php echo $cid; ?>;
            const cbalance = <?php echo $cbalance; ?>;
            const cname = "<?php echo $cname; ?>";
            const page = `withdrawcash.php?cid=${cid}&cname=${encodeURIComponent(cname)}`;
            window.location.href = page; 
        }

        function deposit() {
            const cid = <?php echo $cid; ?>;
            const cbalance = <?php echo $cbalance; ?>;
            const cname = "<?php echo $cname; ?>";
            const page = `depositecash.php?cid=${cid}&cname=${encodeURIComponent(cname)}`;
            window.location.href = page; 
        }

        function transfer() {
            const cid = <?php echo $cid; ?>;
            const cbalance = <?php echo $cbalance; ?>;
            const cname = "<?php echo $cname; ?>";
            const page = `sendmoney.php?cid=${cid}&cbalance=${encodeURIComponent(cbalance)}&cname=${encodeURIComponent(cname)}`;
            window.location.href = page; 
            
        }
    </script>
</body>
</html>


