<?php
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="normalize.css">
    <title>Admin</title>

    <!-- STYLE فوق -->
</head>

<body>

<div class="admin-box">

    <h1>Admin Panel</h1>

    <form method="post">
        <button type="submit" name='doc'>Doctor</button>
        <button type="submit" name='lec'>Assistant</button>
    </form>

<?php
require 'conn.php';

if(isset($_POST['doc'])){
echo "
        <button class='panel-btn'><a href='dash.php'>Dashboard</a></button>
        <button class='panel-btn'><a href='g1_t.php'>Group 1 Table</a></button>
        <button class='panel-btn'><a href='g2_t.php'>Group 2 Table</a></button>
        <button class='panel-btn'><a href='g3_t.php'>Group 3 Table</a></button>
        <button class='panel-btn'><a href='g4_t.php'>Group 4 Table</a></button>
    ";
}

if(isset($_POST['lec'])){
echo "
        <button class='panel-btn'><a href='c_dash.php'>Section Dashboard</a></button>
        <button class='panel-btn'><a href='g1_t.php'>Group 1 Table</a></button>
        <button class='panel-btn'><a href='g2_t.php'>Group 2 Table</a></button>
        <button class='panel-btn'><a href='g3_t.php'>Group 3 Table</a></button>
        <button class='panel-btn'><a href='g4_t.php'>Group 4 Table</a></button>
    ";
}
?>

</div>

</body>
</html>
