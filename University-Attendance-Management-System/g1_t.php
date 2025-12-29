<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data-Group1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="page-container">

    <h1 class="main-title">Table For Group 1</h1>

    <form method="post" class="form-box form-show-course">
        <h2 class="form-title">Group Course</h2>

        <select name="se" class="input-select">
            <option value="C++">C++</option>
            <option value="DB">DB</option>
            <option value="DE">DE</option>
            <option value="WEB">WEB</option>
            <option value="LINUX">LINUX</option>
            <option value="OS">OS</option>
        </select>

        <input type="submit" name="sub" value="Show Course" class="btn-submit">
    </form>

    <form method="post" class="form-box form-delete-course">
        <h2 class="form-title">Delete Group Course</h2>

        <select name="se" class="input-select">
            <option value="C++">C++</option>
            <option value="DB">DB</option>
            <option value="DE">DE</option>
            <option value="WEB">WEB</option>
            <option value="LINUX">LINUX</option>
            <option value="OS">OS</option>
        </select>

        <input type="submit" name="del" value="Delete Course" class="btn-submit">
    </form>


    <h2 class="section-title">Sections</h2>

    <form method="post" class="form-box form-show-section">
        <select name="sel" class="input-select">
            <option value="c1">c1</option>
            <option value="c2">c2</option>
            <option value="c3">c3</option>
            <option value="c4">c4</option>
        </select>

        <select name="co" class="input-select">
            <option value="C++">C++</option>
            <option value="DB">DB</option>
            <option value="DE">DE</option>
            <option value="WEB">WEB</option>
            <option value="LINUX">LINUX</option>
            <option value="OS">OS</option>
        </select>

        <input type="submit" name="su" value="Show Section" class="btn-submit">
    </form>

    <h2 class="section-title">Delete Section</h2>

    <form method="post" class="form-box form-delete-section">
        <select name="sel" class="input-select">
            <option value="c1">c1</option>
            <option value="c2">c2</option>
            <option value="c3">c3</option>
            <option value="c4">c4</option>
        </select>

        <select name="co" class="input-select">
            <option value="C++">C++</option>
            <option value="DB">DB</option>
            <option value="DE">DE</option>
            <option value="WEB">WEB</option>
            <option value="LINUX">LINUX</option>
            <option value="OS">OS</option>
        </select>

        <input type="submit" name="dell" value="Delete Section" class="btn-submit">
    </form>

</body>
</html>

<?php
require 'conn.php';

if(isset($_POST['sub'])){
    $sel = $_POST['se'];
    $sql = mysqli_query($conn, "SELECT name_g1, id_g1, loc_g1, course_g1, tim FROM group1 WHERE course_g1='$sel' ORDER BY id_g1 ASC");
    
    echo "    <h3 class='table-title'>Table Group 1 Course : $sel</h3>";
    echo "  <table class='data-table'>
            <tr>
                 <th class='table-head'>Name</th>
            <th class='table-head'>ID</th>
            <th class='table-head'>Location</th>
            <th class='table-head'>Course</th>
            <th class='table-head'>Time</th>
            </tr>";
    while($row = mysqli_fetch_assoc($sql)){
        echo "<tr>
                <td class='table-head'>{$row['name_g1']}</td>
                <td class='table-head'>{$row['id_g1']}</td>
                <td class='table-head'>{$row['loc_g1']}</td>
                <td class='table-head'>{$row['course_g1']}</td>
                <td class='table-head'>{$row['tim']}</td>
              </tr>";
    }
    echo "</table>";
}

if(isset($_POST['del'])){
    $sel = $_POST['se'];
    $de = mysqli_query($conn, "DELETE FROM group1 WHERE course_g1='$sel'");
    
  
}

if(isset($_POST['su'])){
    $sel = $_POST['sel'];
    $co = $_POST['co'];
    
    $name = "name_g1_$sel";
    $id = "id_g1_$sel";
    $loc = "loc_g1_$sel";
    $course = "course_g1_$sel";

    $sql = mysqli_query($conn, "SELECT `$name`, `$id`, `$loc`, `$course`, tim FROM group1 WHERE (`$name`<>'' OR `$id`<>'' OR `$loc`<>'' OR `$course`<>'') AND `$course`='$co'");
    
    echo " <h3 class='table-title'>Table Group 1 Course : $sel</h3>";
    echo " <table class='data-table'>
            <tr>
                <th class='table-head' >Name</th>
                <th class='table-head'>ID</th>
                <th class='table-head'>Location</th>
                <th class='table-head'>Course</th>
                <th class='table-head'>Time</th>
            </tr>";
    while($row = mysqli_fetch_assoc($sql)){
        echo "<tr>
                <td class='table-cell'>{$row[$name]}</td>
                <td class='table-cell'>{$row[$id]}</td>
                <td class='table-cell'>{$row[$loc]}</td>
                <td class='table-cell'>{$row[$course]}</td>
                <td class='table-cell'>{$row['tim']}</td>
              </tr>";
    }
    echo "</table>";
}

// حذف بيانات القسم
if(isset($_POST['dell'])){
    $sel = $_POST['sel'];
    $co = $_POST['co'];

    $course = "course_g1_$sel";

    $de = mysqli_query($conn, "DELETE FROM group1 WHERE `$course`='$co'");

}
?>
