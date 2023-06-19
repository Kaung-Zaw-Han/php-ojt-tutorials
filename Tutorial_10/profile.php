<?php
include("database.php");
session_start();
if (isset($_POST['btnLogout'])) {
    session_destroy();
    header('Location: index.php');
}
$getFromLogin = $_SESSION["email"];
$sql = "SELECT * FROM auth WHERE email = '$getFromLogin' ";
$run = mysqli_query($conn, $sql);
$getData = mysqli_fetch_assoc($run);
$id = $getData['id'];
$name = $getData['name'];
$email = $getData['email'];
$photo = $getData['image'];
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $folder = "./images/";
    $target = $folder . basename($image);
    $imgType = pathinfo($target, PATHINFO_EXTENSION);
    if ($image == '') {
        $image = $photo;
    }
    move_uploaded_file($tmpName, $target);
    if ($getFromLogin == $email) {
        $sql = "UPDATE auth SET name = '$name' , email = '$email' , image = '$image' WHERE email = '$email' ";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            header("Location: profile.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
                        <img src="images/<?php echo $photo; ?>" class="rounded-circle dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" alt="">
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
    </div>
    <div class="card w-50 mt-5 mx-auto">
        <div class="card-header">
            <h1>My Profile Setting</h1>
        </div>
        <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8 mb-3">
                        <?php
                        if ($photo == null) {
                            echo "<img src='./images/img_userdefault.avif' alt=''>";
                        } else {
                            echo "<img src='./images/" . $photo . "' alt=''>";
                        }
                        ?>
                        <input type="file" name="image" id="choose">
                        <button type="button" class="btn btn-outline-primary rounded-pill" onclick="document.getElementById('choose').click()">Upload</button>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control mb-3" placeholder="name" name="name" value="<?php echo $name; ?>">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary float-end">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>