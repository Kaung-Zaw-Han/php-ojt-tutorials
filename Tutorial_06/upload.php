<?php
session_start();
$imgError = $folderError = "";
$success = "";
$sizeError = $typeError = "";
$finalResult = "";
$imageInfo = "";
$tmpName = $imgName = $folderName = "";
if (isset($_POST['upload'])) {
    $folderName = $_POST['name'];
    $imgName =  $_FILES['image']['name'];
    $tmpName =  $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    if (empty($folderName) && empty($imgName['tmp_name'])) {
        $folderError = "Folder name field is required";
        $imgError = "Image field is required";
    } else {
        if (empty($folderName)) {
            $folderError = "Folder name field is required";
        } else {
            if (!is_uploaded_file($tmpName)) {
                $imgError = "Image field is required";
            } else {
                $typeFile = explode('.', $imgName);
                $typeResult = strtolower(end($typeFile));
                if (!($typeResult == 'jpg' || $typeResult == 'jpeg' || $typeResult == 'png')) {
                    $typeError = "Image File extesion must be (JPG,PNG,JPEG)";
                } elseif ($imgSize == 0) {
                    $sizeError = "Image File size must be less than 2000";
                } else {
                    if (is_dir($folderName)) {
                        mkdir("images/$folderName");
                    }
                    $targetFile = "images/$folderName/" . $imgName;
                    move_uploaded_file($tmpName, $targetFile);
                   $_SESSION['finalResult'] = "Upload Image Successfully";
                   header("Location : index.php");
                }
            }
        }
    }
}
