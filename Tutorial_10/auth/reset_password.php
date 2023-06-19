<?php
include("../database.php");
session_start();
$sessionEmail = $_SESSION['email'];
$error = "";
if (isset($_POST['btnChange'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if (isset($_SESSION['email'])) {
        if ($confirmPassword == $password) {
            $hashPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE auth SET password = '$hashPassword' WHERE email = '$sessionEmail'";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                echo "<script>window.location='login.php'</script>";
            }
        } else {
            $error = "Unmatch Password...";
        }
    } else {
        echo "<script>alert('Unmatch Email..');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card w-50 mt-5 mx-auto">
            <div class="card-header">
                <h1>Reset Password</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php echo $sessionEmail ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password">
                        <small class="text-danger"><?php echo $error; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword">
                        <small class="text-danger"><?php echo $error; ?></small>
                    </div>
            </div>
            <div class="card-footer">
                <a href="login.php" class="text-decoration-none">Login</a>
                <div class="mb-2 mt-2 float-end">
                    <input type="submit" value="Send" name="btnChange" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>