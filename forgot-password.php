<?php  include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="#" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Send Verify Code">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception; 

   require 'mail/Exception.php';
   require 'mail/PHPMailer.php';
   require 'mail/SMTP.php';
   
   if(isset($_POST['check-email'])){
   
       $email=$_POST['email'];
       $check=$db->prepare("select  name,code,email from users where email=?");
       $check->execute([$email]);
       $num=$check->rowCount();
       if($num>0){
           $mail = new PHPMailer(true);

           $row=$check->fetch(PDO::FETCH_ASSOC);
           $link='http://localhost/login_signup/reset.php?otpcode='.$row['code'];
           
try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nasirofjavidan@gmail.com';                     //SMTP username
    $mail->Password   = 'eeddtahcqzhqbwty';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nasirofjavidan@gmail.com', 'Cavidan');
    $mail->addAddress($email);     //Add a recipient
    
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset the Password';
    $mail->Body    = "Dear: ".$row['name']."<br> This is Reset Password  link:".$link."<br> Code:".$row['code'];
   

    $mail->send();
    echo "<script> alert('Message has been sent. Plesa check your email')</script>";
  

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

       

       

    }
    else{
        echo "<script>alert('Email Incorrecrt. PLease try Again!!')</script>";
    }
  
}
    ?>

</body>
</html>