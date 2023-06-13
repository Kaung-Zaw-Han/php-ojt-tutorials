<?php
require_once 'libs/phpqrcode/qrlib.php';
if (!is_dir("images/")) {
    mkdir("images/");
}
$success = $error = "";
if (isset($_POST['btnGenerator'])) {
    $qrName = $_POST['qr'];
    if (empty($qrName)) {
        $error = "QR name field is required";
    } else {
        $name = $qrName . '.png';
        $filePath = "images/" . $name;
        QRcode::png($qrName, $filePath);
        $success = '<div class=" d-flex aligns-items-center justify-content-center ">
  <img class="w-25 img-thumbnail" src="' . $filePath . '">
</div>';
    }
}
