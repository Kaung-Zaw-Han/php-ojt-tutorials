<?php
$serverName = "localhost";
$userName = "root";
$conn = mysqli_connect($serverName, $userName, 'root');
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
}
$dbName = "tutorial10";
$checkDatabase = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($checkDatabase) === TRUE) {
} else {
    echo "Error creating database" . $conn->error;
}
mysqli_select_db($conn, $dbName);
$sql = "CREATE TABLE IF NOT EXISTS auth (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE ,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  image VARCHAR(255) NULL ,
  address TEXT NOT NULL,
  created_datetime timestamp default current_timestamp,
  updated_datetime timestamp default current_timestamp
  )";
if (mysqli_query($conn, $sql)) {
} else {
    echo "table created fail";
}
