<?php
include_once("upload.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial-06</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
</head>
<body>
    <?php
    if (isset($_SESSION['finalResult'])) {
    ?>
        <div class="alert alert-primary text-center col-10 offset-1" role="alert">
            <?php echo $_SESSION['finalResult']; ?>
        </div>
    <?php
        unset($_SESSION['finalResult']);
    }
    ?>
    <div class="container">
        <h1 class="ttl">Upload Image</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="block mb-4">
                <label for="" class="form-label">Folder Name</label>
                <input type="text" name="name" class="form-control">
                <p class="text-danger "><?php echo $folderError ?></p>
            </div>
            <div class="block mb-4">
                <label for="" class="form-label">Choose Image</label>
                <input type="file" name="image" class="form-control">
                <p class="text-danger"> <?php echo $imgError ?></p>
                <p class="text-danger"> <?php echo $sizeError ?></p>
                <p class="text-danger"> <?php echo $typeError ?></p>
            </div>
            <input type="submit" value="Upload" class="btn btn-primary mb-4" name="upload">
        </form>
    </div>
    <div class="show">
        <div class="row d-flex">
            <?php
            $files = glob('images/*/*.{jpg,png,jpeg}', GLOB_BRACE);
            foreach ($files as $filePath) {
                $lastPath = basename($filePath);
                echo "<div class='col-md-4 p-5'>
                  <div class='bg-light bg-gradient shadow-lg h-75'>
                  <img src='$filePath' class='img-thumbnail h-50 w-75'>
                  <p class='text-center'><a href=''>$lastPath</a></p><br>
                  <p class='text-center'><a href=''>localhost/Tutorial_06/$filePath</a></p>
                  <form method='post'>
                  <input type='hidden' name='deleteData' value='$filePath'>
                    <input type='submit' class='btn btn-danger w-75 text-white' name='btnDelete' value='Delete'>
                  </form>
                  </div>
                  </div>";
            }
            if (isset($_POST['btnDelete'])) {
                $delete = $_POST['deleteData'];
                $result = unlink($delete);
                if ($result) {
                    echo "<script>window.location='index.php'</script>";
                }
            }
            ?>
        </div>
    </div>
</body>
<script src="libs/js/bootstrap.min.js"></script>
</html>