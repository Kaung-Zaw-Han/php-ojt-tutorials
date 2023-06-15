<?php
$serverName = "localhost";
$userName = "root";
$conn = mysqli_connect($serverName, $userName, 'root');
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
}
$dbName = "tutorial08";
$checkDatabase = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($checkDatabase) === TRUE) {
} else {
    echo "Error creating database" . $conn->error;
}
mysqli_select_db($conn, $dbName);
$sql = "CREATE TABLE IF NOT EXISTS Post (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(225),
  content TEXT NOT NULL,
  is_published BOOLEAN,
  created_datetime timestamp default current_timestamp,
  updated_datetime timestamp default current_timestamp ON UPDATE CURRENT_TIMESTAMP
  )";
if (mysqli_query($conn, $sql)) {
} else {
    echo "table created fail";
}
?>
