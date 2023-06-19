<?php
include("../database.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../libs/PHPMailer/src/Exception.php';
require '../libs/PHPMailer/src/PHPMailer.php';
require '../libs/PHPMailer/src/SMTP.php';
if (isset($_POST["btnSend"])) {
    $email = $_POST["email"];
    $sql = "SELECT * FROM auth WHERE email='" . $email . "'";
    $run = mysqli_query($conn, $sql);
    $_SESSION['email'] = $email;
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'koeshwin9999@gmail.com';
    $mail->Password = 'xusuudhdlrfzxwtu';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('koeshwin9999@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "Recover your password";
    $mail->Body = "<b>Dear User</b>
        <h3>We received a request to reset your password.</h3>
        <p>Kindly click the below link to reset your password</p>
        http://localhost/php-ojt-tutorials/Tutorial_10/auth/reset_password.php?email= " . $_SESSION['email'] . "
        <br><br>
        <p>With regrads,</p>
        <b>Kaung Zaw Han</b>";
    $mail->send();
    if ($mail->send()) {
        echo "<script>window.location.href='reset_password.php'</script>";
    } else {
        echo "<script>alert('Email Adderss did not found in database');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgetPassword Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card w-50 mt-5 mx-auto">
            <div class="card-header">
                <h1>Forget Password</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="email">
                    </div>
            </div>
            <div class="card-footer">
                <a href="login.php" class="text-decoration-none">Login</a>
                <div class="mb-2 mt-2 float-end">
                    <input type="submit" value="Send" name="btnSend" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>