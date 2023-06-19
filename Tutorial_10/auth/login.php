<?php
include("../database.php");
session_start();
$userEmail = $userPassword = $errorEmail = $errorPassword = $error = "";
if (isset($_POST['btnLogin'])) {
    $userEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM auth WHERE email='$userEmail' and password='$userPassword'";
    $run = mysqli_query($conn, $sql);
    if (empty($userEmail) && empty($userPassword)) {
        $errorEmail = "Need Your Email...";
        $errorPassword = "Need Your Password...";
    } elseif (empty($userEmail)) {
        $errorEmail = "Need Your Email...";
    } elseif (empty($userPassword)) {
        $errorPassword = "Need Your Password...";
    } else {
        if ($run) {
            $_SESSION['email'] = $userEmail;
            header('Location: ../index.php');
        } else {
            $error = "Please Check Your Email and Password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card w-50 mt-5 mx-auto">
            <div class="card-header">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $userEmail; ?>">
                        <small class="text-danger"><?php echo $errorEmail; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $userPassword; ?>">
                        <small class="text-danger"><?php echo $errorPassword; ?></small>
                    </div>
                    <a href="forget_password.php" class="text-decoration-none">forget password?</a>
                    <div class="mb-2 mt-2">
                        <input type="submit" value="Login" class="btn btn-primary w-100" name="btnLogin">
                        <small class="text-danger text-center d-block"><?php echo $error; ?></small>
                    </div>
                    <p class="text-center">Not a member? <a href="register.php" class="text-decoration-none">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>