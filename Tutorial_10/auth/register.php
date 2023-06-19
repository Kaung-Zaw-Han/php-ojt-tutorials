<?php
include("../database.php");
$userName = $userEmail = $userAddress = $userPassword = $userPhone = "";
$errorName = $errorEmail = $errorPassword = $errorPhone = $errorAddress = "";
if (isset($_POST['btnRegister'])) {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userPassword = $_POST['password'];
    $userAddress = $_POST['address'];
    if (empty($userName) && empty($userEmail) && empty($userPhone) && empty($userPassword) && empty($userAddress)) {
        $errorName = "Name Field is required";
        $errorPhone = "Phone Field is required";
        $errorEmail = "Email Field is required";
        $errorPassword = "Password Field is required";
        $errorAddress = "Address Field is required";
    } elseif (empty($userName)) {
        $errorName = "Name Field is required";
    } elseif (empty($userEmail)) {
        $errorEmail = "Email Field is required";
    } elseif (empty($userPhone)) {
        $errorPhone = "Phone Field is required";
    } elseif (empty($userPassword)) {
        $errorPassword = "Password Field is required";
    } elseif (empty($userAddress)) {
        $errorAddress = "Address Field is required";
    } else {
        $hashPw = password_hash($userPassword, PASSWORD_DEFAULT);
        $sql = "INSERT INTO auth (name,email,phone,password,address) VALUES ('$userName','$userEmail','$userPhone','$hashPw','$userAddress')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "fail";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <script src="../libs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card w-50 mt-5 mx-auto">
            <div class="card-header">
                <h1>Register</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-2">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $userName; ?>">
                        <small class="text-danger"><?php echo $errorName; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php echo $userEmail; ?>">
                        <small class="text-danger"><?php echo $errorEmail; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Phone</label>
                        <input type="number" class="form-control" placeholder="09*******" name="phone" value="<?php echo $userPhone; ?>">
                        <small class="text-danger"><?php echo $errorPhone; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="password" name="password" value="<?php echo $userPassword; ?>">
                        <small class="text-danger"><?php echo $errorPassword; ?></small>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $userAddress; ?>">
                        <small class="text-danger"><?php echo $errorAddress; ?></small>
                    </div>
                    <div class="mb-2">
                        <input type="submit" value="Register" name="btnRegister" class="btn btn-primary w-100">
                    </div>
                    <p class="text-center"><a href="login.php" class="text-decoration-none">Already have an account?</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>