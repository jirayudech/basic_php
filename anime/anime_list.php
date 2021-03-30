<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<php? echo 'UTF-8';?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<div class='container'>
<h1>รายการ Anime</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $db = "test";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    echo "<div class='alert alert-primary' role='alert'>
            Connected successfully
        </div>";
    
    echo "
    <form action='add.php' method='get' target='_blank'>
    <div class='mb-3'>
        <label for='exampleInputEmail1' class='form-label'>Anime Name</label>
        <input type='text' class='form-control' id='name' name='name'>
        <div id='emailHelp' class='form-text'>กรอกชื่อ anime ที่ต้องการเพิ่ม.</div>
    </div>
    <button type='submit' class='btn btn-primary'>+ เพิ่ม</button>
    </form>
    ";

    $sql = "SELECT * FROM anime";
    $result = $conn->query($sql);
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {


      echo "
      <table style='width:100%' class='table'>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Action1</th>
          <th>Action2</th>
        </tr>
      ";


      while($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
          <td>{$row["anime_id"]}</td>
          <td>{$row["anime_name"]}</td>
          <td>
          <form action='edit.php' method='get' target='_blank'>
            <input hidden type='text' class='form-control' name='id' value='{$row["anime_id"]}'>
            <input hidden type='text' class='form-control' name='name' value='{$row["anime_name"]}'>
            <button type='submit' class='btn btn-danger'>Edit</button>
          </form>

          <a href='edit.php?id={$row["anime_id"]}&name={$row["anime_name"]}'>Edit by Tag A</a>
          </td>
          <td>
          <form action='delete.php' method='get' target='_blank'>
            <input hidden type='text' class='form-control' name='id' value='{$row["anime_id"]}'>
            <button type='submit' class='btn btn-danger'>Delete</button>
          </form>
          <br>
          <button class='btn btn-danger' onclick='window.location.href=\"delete.php?id={$row["anime_id"]}\";'>
            Delete ไม่ใช้ Form
          </button>

          <a href='delete.php?id={$row["anime_id"]}'>Delete by Tag A</a>
          </td>
        </tr>
        ";
      }

      echo "</table>";   
    } else {
      echo "0 results";
    }
    
    mysqli_close($conn);

    ?>
</div>
</body>
</html>