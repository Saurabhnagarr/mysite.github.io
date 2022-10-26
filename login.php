<?php
$alert = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'pr/database.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "Select * from $username where username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if($result){
      $numrow = mysqli_num_rows($result);
      if($numrow==1){
        $n = mysqli_fetch_assoc($result);
        
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;   
        $_SESSION['account_balance'] = $n['money'];
        $_SESSION['earned_total'] = $n['money'];
        $_SESSION['pending_withdrawl'] = "$0.00";
        $_SESSION['withdrew_total'] = "$0.00";
        $_SESSION['balance_detail'] = "$0.00";
        $_SESSION['activ_deposit'] = "$0.00";
        $_SESSION['last_deposit'] = "$0.00";
        header("location:welcome.php");
  }
  else{
    $alert = true;
  }
}
  else{
    $alert = true;
    } 
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<?php require 'pr/_nav.php' ?>
<?php
  if($alert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Oppps!</strong> Check your username or password.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="container">
    <h1 class="text-center">
        login to our website
    </h1>
    <form action="/loginsystem/login.php" method="post">
  <div class="mb-3">
    <label for="username"class="form-label">Username*</label>
    <input type="text" name="username" class="form-control" id="Username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"name="password" class="form-label">Password*</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>
