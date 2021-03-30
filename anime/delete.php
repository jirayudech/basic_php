<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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

$sql = "DELETE FROM anime WHERE anime_id={$_GET['id']};";

if ($conn->query($sql) === TRUE) {
  echo "Anime Id: {$_GET['id']} Deleted";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>