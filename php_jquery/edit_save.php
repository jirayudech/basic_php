<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "update anime set anime_name = '{$_GET['name']}' WHERE anime_id={$_GET['id']};";

echo $sql;
if ($conn->query($sql) === TRUE) {
  echo true;
} else {
  echo false;
}

$conn->close();
?>