<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_GET['em'])) {
        echo "<script>alert('There is no email')</script>";
        header("refresh:1,reset.php");
    }

    if (isset($_POST['change-password'])) {

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        @$email = $_GET['em'];

        if ($password != $cpassword) {
            echo "<script>alert ('Password and Confirm Password are not same.Please try Again!') </script>";
        } else {


            $check = $db->prepare("select * from users where email=?");
            $check->execute([$email]);
            if ($check->rowCount()) {
                $change = $db->prepare("UPDATE users SET password=? WHERE email=? ");
                $run = $change->execute([$password, $email]);
                if ($run) {
                    echo "<script> alert('Update is successfuly. You direct login page')</script>";
                    header("refresh:1, login.php");
                } else {
                    echo "<script> alert('Update is Failed')</script>";
                }
            } else {
                echo "<script> alert('This is email not here!')</script>";
            }
        }
    }

    ?>

</body>

</html>