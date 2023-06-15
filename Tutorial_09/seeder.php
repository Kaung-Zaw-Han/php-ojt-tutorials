<?php
include "database.php";
$time[] = array();
for ($i = 1; $i <= 50; $i++) {
    $title = "Title" . $i;
    $content = "Testing Content" . $i;
    $publish = "1";
    $time[] = date('Y-m-d', strtotime('-' . $i . ' days'));
    $randomSql = "INSERT INTO post(title,content,is_published,created_datetime) VALUES ('$title' , '$content' , '$publish','$time[$i]')";
    // $randomSql = "DELETE FROM post";
    $run = mysqli_query($conn, $randomSql);
}
