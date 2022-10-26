<?php
$alert = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
include 'pr/database.php';
session_start();
$money = "$".$_POST['deposit'];
$a = $_SESSION['username'];
if(gettype($money)=="string"){
$sql = "UPDATE `$a` SET `money`='$money' WHERE 1";
$result = mysqli_query($con,$sql);
if($result){
  $alert = "Your money has been deposited please logout and login again";
}
else{
  $alert = "your money has been not deposited";
}
}
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Deposit</title>
</head>
<body>
<?php require 'pr/_nav.php';

if($alert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Succsess!</strong>'.$alert.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php    ?>
<div class="container">
    <h1 class="text-center">
        Deposite Money
    </h1>
    <form action="/loginsystem/deposit.php" method="post">
  
    <label for="exampleInputPassword1"name="deposit" class="form-label">Deposit*</label>
    <input type="number" name="deposit" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>
