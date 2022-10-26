<?php
session_start();
$date = date("dS F");
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
else{
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="dashbord.css">
<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>    
    <header>
        <div class="username">
            Hello,<?php echo $_SESSION['username']?>
        </div>
        <div class="logo">
            My account
        </div>
    </header>
    <div class="content">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam id quasi blanditiis! Asperiores, voluptate amet. Soluta, totam. Inventore fugiat possimus quis corrupti ipsa quasi dolorum amet. Eos quam quaerat ad?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid itaque laboriosam perspiciatis nam assumenda minima eligendi perferendis cum culpa vitae fugit quos, velit ad sequi eius rerum magni minus facere. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio voluptas inventore dolorum maiores aliquid magnam pariatur quae exercitationem incidunt dolor saepe dolorem ex ab repudiandae, necessitatibus vitae totam libero labore?</p>
    </div>
    <div class="bar">
        <a class="item" href="/loginsystem/logout.php">Logout</a>
        <hr>
        <p class="item">Dashbord</p>
        <hr>
        <div class="investing">
           <a href="deposit.php">INVESTING</a>
            <p>Invest / Deposit</p>
            <p class="widthraw">Widthraw</p>
        </div>
        <hr>
    </div>
    <div class="dashborde">
        <div class="itemerow2"><p>ACCOUNT BALANCE</p><span><?php echo $_SESSION['account_balance']?></span></div>

        <div class="itemerow2"><p>EARNED TOTAL</p><span><?php echo $_SESSION['earned_total']?></span></div>

        <div class="itemerow2"><p>PENDING WITHDRAWAL</p><span><?php echo $_SESSION['pending_withdrawl']?></span></div>

        <div class="itemerow2"><p>WITHDREW TOTAL</p><span><?php echo $_SESSION['withdrew_total']?></span></div>

        <div class="itemerow2"><p>BALANCE DETAIL</p><span><?php echo $_SESSION['balance_detail']?></span></div>

        <div class="itemerow2"><p>ACTIV DEPOSIT</p><span><?php echo $_SESSION['activ_deposit']?></span></div>

        <div class="itemerow2"><p>LAST DEPOSIT</p><span><?php echo $_SESSION['last_deposit']?></span></div>

        <div class="itemerow2"><p>TOTAL DEPOSIT</p><span><?php echo $_SESSION['activ_deposit']?></span></div>

        <div class="itemerow2"><p>LAST WITHDRAWAL</p><span><?php echo $_SESSION['activ_deposit']?></span></div>

        <div class="itemerow2"><p>WITHDREW TOTAL</p><span><?php echo $_SESSION['activ_deposit']?></span></div>

        <div class="itemerow2"><p>LAST ACCESS</p><span><?php echo $date?></span></div>
        <div class="itemerow2"><p>EMAIL</p><span><?php echo $_SESSION['username']?></span></div>
    </div>
</body>
</html>

