<?php 
ob_start();
session_start();
include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="#" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                   
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    <?php
      if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
      $sql = $db->prepare("select *from users where email=? and password=?");
      $sql->execute([$email, $password]);
      $num=$sql->rowCount();
      if($num>0){
        $_SESSION['email']=$email; 
        echo "<script> alert('You have  successfuly, you will be redirected to the home page') </script>";
        header('Refresh:1,index.php');
      
      }
      else{
          echo "<script> alert('Password or Usarname Incoorect! PLease try again.') </script>";
      }
      }
    
    
    
    
    ?>

    
</body>
</html>