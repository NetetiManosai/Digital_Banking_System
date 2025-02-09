<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            DKB
        </title>
        <link rel = "stylesheet" href = "style.css">
        <link rel = "icon" href = "images/DKB-Bank-Logo.png">
    </head>
    <body>
<img class="logoimg" src= "images/DKB-Bank-Logo.png">
        <div class="firstdiv">     
        <center><h1 style="color:lightyellow">Welcome To The DK Bank!!!</h1>
        <h3 style ="color:lightyellow">always committed to serving your banking needs.</h3> </center>
        <p style = "padding-bottom:50px">DKB never asks for confidential information such as PIN and OTP from customers.
                 Any such call can be made only by a fraudster. Please do not share personal info.</p>
            <button style="font-size: x-large;" onclick="mpage()">Manager Login</button> &nbsp;
            <button style="font-size: x-large" onclick="cpage()">Customer Login</button>
            <br><br>
            <button style="font-size: x-large" onclick="lpage()">Locker Login</button>
            <script lang="javascript">
                function mpage()
                {
                    window.location.href = "manager_login.php";
                }
                function cpage()
                {
                    window.location.href = "customer_login.php";
                }
                function lpage()
                {
                    window.location.href = "clocker.php";
                }
            </script>
        </div>
        <div class="flex">
            <div class="dep">
                <img style="height: 200px; width:300px" src = "images/deposite.jpg">
                <p>Deposit Facility in Bank Account</p>
            </div>
            <div class="wid">
            <img style="height: 200px; width:300px" src = "images/withdraw.jpg">
            <p>Withdraw Funds from Your Bank Account</p>
            </div>
            <div class="trn">
            <img style="height: 200px; width:300px" src = "images/transfer.jpg">
                <p>Transfer Funds Easily Between Accounts</p>
            </div>
            <div class="lck">
            <img  style="height: 200px; width:300px" src = "images/lockers.jpg">
                <p>Locker Facility for Secure Storage</p>
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

    </body>
</html>
