<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (@!$_GET['otpcode']) {
        echo "<script>alert('There is no otpcode')</script>";
        header("refresh:1,forgot-password.php");
    }
    if (isset($_POST['check-reset-otp'])) {

        $code=$_POST['otp'];
        $show=$db->prepare("select * from users where code=?");
        $show->execute([$code]);
        $row=$show->fetch(PDO::FETCH_ASSOC);

    
        if(@$code==@$_GET['otpcode']){
            echo "<script>alert('There is verified')</script>";
            header("refresh:1,change-password.php?em=".$row['email']);
        }else{
            echo "<script>alert('Code  Incorrect. Plase try Again!')</script>";
        }

    }

    ?>

</body>

</html>