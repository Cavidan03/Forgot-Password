<?php 
include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="#" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    
                
                       
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>

    <?php

if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $code=rand(100000,999999);
    if($password==$cpassword){
        $x=$db->prepare("INSERT INTO users SET name=?, email=?, password=?, code=? ");
        $insert=$x->execute([
            $name, $email,  $password, $code
        ]);
        if($insert){
            echo "<script>alert ('You have  successfuly registered, you will be redirected to the login page') </script>";
            header('refresh:0, login.php');
        }  
        else{

        }
    }
    else{
        echo "<script>alert ('Password and Confirm Paswword are not same. PLease try again!!') </script>";
    }
}


?>
    
</body>
</html>