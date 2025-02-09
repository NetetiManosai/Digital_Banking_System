<?php
 echo "HI";
 $cname = "";
 $cid = 0;
 if (isset($_GET['cname'])) {
    $cname = htmlspecialchars($_GET['cname']);
}

if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
}
$page = "customer_w.php";
$page = $page."?cname=$cname&cid=$cid";
 header("Location : $page");
?>