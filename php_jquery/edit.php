<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<php? echo 'UTF-8';?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>
<div class='container'>
<h1>Edit Anime</h1>
<div class='toast position-fixed top-0 end-0 p-3'>
        <div class='toast-header'>
          Message
        </div>
        <div class='toast-body'>
        </div>
      </div>
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

      $sql = "SELECT * FROM anime where anime_id = {$_GET["id"]}";
      $result = $conn->query($sql);
      
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

    echo "


    <form action='edit_save.php' method='get' target='_blank'>
    <div class='mb-3'>
        AnimeId: <input  type='text'  id='id'  value='{$_GET["id"]}'>
    </div>
    <div class='mb-3'>
        <label for='exampleInputEmail1' class='form-label'>Anime Name</label>
        <input type='text' id='name'  value='{$row["anime_name"]}'>
    </div>
    <!--button type='submit' class='btn btn-primary'>แก้ไข</button-->
    </form>
    ";

?>

</div>
</body>

<script type = 'text/javascript' language = 'javascript'>
$(document).ready(function() {
    $(`#name`).change(function(event){
  
    let id = $(`#id`).val();
    let name = $(`#name`).val();
    //let name = event.target.value;
    
    $.get( 
        `edit_save.php?id=${id}&name=${name}`,
        function(result) {

            if(result){
            $('.toast-body').html(`Result: ${name} บันทึกแล้ว`)
            $('.toast').toast('show');
            }
        }
    ); 

    });
});
</script>