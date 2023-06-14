<?php
$serverName = "localhost";
$userName = "root";
$dbName = "tutorial08";
$conn = mysqli_connect($serverName, $userName, 'root', $dbName);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
    // echo "Success Join";
}
$sql = "CREATE TABLE IF NOT EXISTS Post (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(225),
  content TEXT NOT NULL,
  is_published BOOLEAN,
  created_datetime timestamp default current_timestamp,
  updated_datetime timestamp default current_timestamp ON UPDATE CURRENT_TIMESTAMP
  )";
if (mysqli_query($conn, $sql)) {
    // echo "table created successfully";
} else {
    echo "table created fail";
}
?>




