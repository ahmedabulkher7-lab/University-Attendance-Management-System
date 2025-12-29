<?php

$on = new mysqli('localhost','root','','form');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $s_id = $_POST['id'];
    $phone = $_POST['phone'];

$ffl = mysqli_query($on,"INSERT INTO form (name,s_id,phone) VALUES ('$name','$s_id','$phone')");


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <label for="">name</label>
        <input type="text" name="name" required>
        <br><br>
         <label for="">student id</label>
        <input type="number" name="id" required>
        <br><br>
         <label for="">phone</label>
        <input type="number" name="phone" required>
        <br><br>
        <input type="submit" name="submit">
        <a href="data.php">data</a>
    </form>
</body>
</html>