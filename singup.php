<?php
$alert = false;
$err=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'pr/database.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $money ="$0.00";
    if(strlen($password)<4){
      $err = "Password must be greter than 4 digit";
    }
    // else{
    //   $otp=rand(1000,9999);
    //   $fields = array(
    //     "variables_values" => "$otp",
    //     "route" => "otp",
    //     "numbers" => "$username",
    // );
    
    // $curl = curl_init();
    
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_SSL_VERIFYHOST => 0,
    //   CURLOPT_SSL_VERIFYPEER => 0,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => json_encode($fields),
    //   CURLOPT_HTTPHEADER => array(
    //     "authorization: ens2gS2oDmNNNAR4Znk03rj1Uj0OzwR2BBQYHz8boCiODGNnc9VDQ0fGrDQv",
    //     "accept: */*",
    //     "cache-control: no-cache",
    //     "content-type: application/json"
    //   ),
    // ));
    
    // $response = curl_exec($curl);
    // $err = curl_error($curl);
    // curl_close($curl);
    


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
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Singup</title>
    
</head>
<body>
      <?php require 'pr/_nav.php' ?>
      <?php
    if($err){
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps!</strong>'.$err.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';        
    }
    if($alert){
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succsess!</strong> your account has been created succsessfull and now you can login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
          ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <div class="container">
        <h1 class="text-center">
            Singnup to our website
        </h1>
        <form action="/loginsystem/singup.php" method="post">
  <div class="mb-3">
    <label for="username"class="form-label">Username*</label>
    <input type="text" name="username" class="form-control" id="Username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"name="password" class="form-label">Password*</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" name="cpassword" class="form-label">Confirm Password*</label>
    <input type="password" name = "cpassword" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>