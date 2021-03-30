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
<h1>Edit Anime</h1>

<?php
  
    echo "

    <form action='edit_save.php' method='get' target='_blank'>
    <div class='mb-3'>
        <label for='exampleInputEmail1' class='form-label'>Id</label>
        <input type='text' class='form-control' id='id' name='id' value='{$_GET["id"]}'>
    </div>
    <div class='mb-3'>
        <label for='exampleInputEmail1' class='form-label'>Anime Name</label>
        <input type='text' class='form-control' id='name' name='name' value='{$_GET["name"]}'>
    </div>
    <button type='submit' class='btn btn-primary'>แก้ไข</button>
    </form>
    ";

?>
</div>
</body>