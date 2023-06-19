<?php
include("database.php");
session_start();
if (isset($_POST['btnLogout'])) {
    session_destroy();
    header('Location: index.php');
}
if (isset($_SESSION['email'])) {
    $sessionEmail = $_SESSION['email'];
    $imgsql = "SELECT image FROM auth WHERE email = '$sessionEmail'";
    $img = mysqli_query($conn, $imgsql);
    $imgUser = mysqli_fetch_assoc($img);
    $_SESSION['image'] = $imgUser["image"] ?? "img_userdefault.avif";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-100">
        <nav class="navbar w-100 bg-light mx-auto">
            <h1 class="ms-5">Home</h1>
            <?php if (isset($_SESSION['email'])) : ?>
                <div class="float-end me-5">
                    <div class="dropdown">
                        <img src="images/<?php echo $_SESSION['image'] ?>" class="rounded-circle dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" alt="">
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li>
                                <form action="" method="POST">
                                    <input type="submit" name="btnLogout" class="dropdown-item" value="Logout">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php else : ?>
                <div class="float-end me-5">
                    <a href="auth/login.php" class="btn btn-primary">Login</a>
                    <a href="auth/register.php" class="btn btn-primary">Register</a>
                </div>
            <?php endif ?>
        </nav>
        <div class="d-flex align-items-center justify-content-center w-100" style="height: 500px;">
            <h2 class="">Welcome From My Website</h2>
        </div>
    </div>
</body>
</html>