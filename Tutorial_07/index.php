<?php
include "generate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_07</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row  mt-5">
            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <h1 class="text-center">QR Code Generator</h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <label for="" class="form-label">QR Name</label>
                        <input type="text" name="qr" id="" placeholder="Enter QR Name" class="form-control">
                        <small class="text-danger"><?php echo $error; ?></small>
                        <div>
                            <input type="submit" value="Generator" name="btnGenerator" class="btn btn-primary w-100 mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5"></div>
    <?php echo $success; ?>
    </div>
    <div class="display-box  w-100">
        <div class="card mx-auto">
            <h2>QR List</h2>
            <div class="card-body d-flex">
                <?php
                $folder = "images/";
                if (is_dir($folder)) {
                    $files = glob($folder . "*");
                    foreach ($files as $file) {
                        if (is_file($file) && $file != 'index.php') {
                            echo '<div class="col-3 d-flex aligns-items-center justify-content-center">';
                            echo '<img class="img-thumbnail w-75" src="' . $file . '">';
                            echo basename($file);
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="libs/js/bootstrap.min.js"></script>
</html>