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
    <link rel="stylesheet" href="style.css" />
    <title>Admin Page</title>
</head>

<body>
<?php
require "conn.php";


// ==== CSRF Token ====
if(empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$message = "";

// ==== معالجة الفورمز ====
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // تحقق CSRF
    if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die("Invalid request");
    }

    // Allowed values
    $allowed_states = [0,1];
    $allowed_locs = [101,118,318,301];
    $allowed_courses = ['c++','DE','DB','LINUX','OS','WEB'];

    // Group 1
    if(isset($_POST['sub1'])){
        $state = (int)$_POST['state1'];
        $loc = (int)$_POST['loc1'];
        $course = $_POST['course'];

        if(in_array($state, $allowed_states) && in_array($loc, $allowed_locs) && in_array($course, $allowed_courses)) {
            $stmt = $conn->prepare("UPDATE state_g1 SET state_g1=?, loc_g1=?, course_g1=?");
            $stmt->bind_param("iis", $state, $loc, $course);
            if($stmt->execute()) $message = "Group 1 updated<br>";
        }
    }

    // Group 2
    if(isset($_POST['sub2'])){
        $state = (int)$_POST['state2'];
        $loc = (int)$_POST['loc2'];
        $course = $_POST['course'];

        if(in_array($state, $allowed_states) && in_array($loc, $allowed_locs) && in_array($course, $allowed_courses)) {
            $stmt = $conn->prepare("UPDATE state_g2 SET state_g2=?, loc_g2=?, course_g2=?");
            $stmt->bind_param("iis", $state, $loc, $course);
            if($stmt->execute()) $message = "Group 2 updated<br>";
        }
    }

    // Group 3
    if(isset($_POST['sub3'])){
        $state = (int)$_POST['state3'];
        $loc = (int)$_POST['loc3'];
        $course = $_POST['course'];

        if(in_array($state, $allowed_states) && in_array($loc, $allowed_locs) && in_array($course, $allowed_courses)) {
            $stmt = $conn->prepare("UPDATE state_g3 SET state_g3=?, loc_g3=?, course_g3=?");
            $stmt->bind_param("iis", $state, $loc, $course);
            if($stmt->execute()) $message = "Group 3 updated<br>";
        }
    }

    // Group 4
    if(isset($_POST['sub4'])){
        $state = (int)$_POST['state4'];
        $loc = (int)$_POST['loc4'];
        $course = $_POST['course'];

        if(in_array($state, $allowed_states) && in_array($loc, $allowed_locs) && in_array($course, $allowed_courses)) {
            $stmt = $conn->prepare("UPDATE state_g4 SET state_g4=?, loc_g4=?, course_g4=?");
            $stmt->bind_param("iis", $state, $loc, $course);
            if($stmt->execute()) $message = "Group 4 updated<br>";
        }
    }
}

if($message != ""){
    echo "<p id='not'>$message</p>";
}
?>

<!-- Group 1 -->
<form method="post">
    <?php $r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM state_g1 LIMIT 1")); ?>
    <h3>Group 1</h3>

    <div>
        <label>الحالة:</label>
        <select name="state1">
            <option value="1" <?= $r['state_g1']==1?'selected':'' ?>>تشغيل</option>
            <option value="0" <?= $r['state_g1']==0?'selected':'' ?>>إيقاف</option>
        </select>

        <label>القاعة</label>
        <select name="loc1">
            <option value="101" <?= $r['loc_g1']==101?'selected':'' ?>>101</option>
            <option value="118" <?= $r['loc_g1']==118?'selected':'' ?>>118</option>
            <option value="318" <?= $r['loc_g1']==318?'selected':'' ?>>318</option>
            <option value="301" <?= $r['loc_g1']==301?'selected':'' ?>>301</option>
        </select>

        <label for="">course</label>
        <select name="course">
            <option value="c++" <?= $r['course_g1']=='c++'?'selected':'' ?>>c++</option>
            <option value="DE" <?= $r['course_g1']=='DE'?'selected':'' ?>>DE</option>
            <option value="DB" <?= $r['course_g1']=='DB'?'selected':'' ?>>DB</option>
            <option value="LINUX" <?= $r['course_g1']=='LINUX'?'selected':'' ?>>LINUX</option>
            <option value="OS" <?= $r['course_g1']=='OS'?'selected':'' ?>>OS</option>
            <option value="WEB" <?= $r['course_g1']=='WEB'?'selected':'' ?>>WEB</option>
        </select>
    </div>

    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <input type="submit" name="sub1" value="Save Group 1">
</form>

<!-- Group 2 -->
<form method="post" >
    <?php $r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM state_g2 LIMIT 1")); ?>
    <h3>Group 2</h3>

    <label>الحالة</label>
    <select name="state2">
        <option value="1" <?= $r['state_g2']==1?'selected':'' ?>>تشغيل</option>
        <option value="0" <?= $r['state_g2']==0?'selected':'' ?>>إيقاف</option>
    </select>

    <label>القاعة</label>
    <select name="loc2">
        <option value="101" <?= $r['loc_g2']==101?'selected':'' ?>>101</option>
        <option value="118" <?= $r['loc_g2']==118?'selected':'' ?>>118</option>
        <option value="318" <?= $r['loc_g2']==318?'selected':'' ?>>318</option>
        <option value="301" <?= $r['loc_g2']==301?'selected':'' ?>>301</option>
    </select>

    <label for="">course</label>
    <select name="course">
        <option value="c++" <?= $r['course_g2']=='c++'?'selected':'' ?>>c++</option>
        <option value="DE" <?= $r['course_g2']=='DE'?'selected':'' ?>>DE</option>
        <option value="DB" <?= $r['course_g2']=='DB'?'selected':'' ?>>DB</option>
        <option value="LINUX" <?= $r['course_g2']=='LINUX'?'selected':'' ?>>LINUX</option>
        <option value="OS" <?= $r['course_g2']=='OS'?'selected':'' ?>>OS</option>
        <option value="WEB" <?= $r['course_g2']=='WEB'?'selected':'' ?>>WEB</option>
    </select>

    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <input type="submit" name="sub2" value="Save Group 2" >
</form>

<!-- Group 3 -->
<form method="post" >
    <?php $r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM state_g3 LIMIT 1")); ?>
    <h3>Group 3</h3>

    <label>الحالة</label>
    <select name="state3">
        <option value="1" <?= $r['state_g3']==1?'selected':'' ?>>تشغيل</option>
        <option value="0" <?= $r['state_g3']==0?'selected':'' ?>>إيقاف</option>
    </select>

    <label>القاعة</label>
    <select name="loc3">
        <option value="101" <?= $r['loc_g3']==101?'selected':'' ?>>101</option>
        <option value="118" <?= $r['loc_g3']==118?'selected':'' ?>>118</option>
        <option value="318" <?= $r['loc_g3']==318?'selected':'' ?>>318</option>
        <option value="301" <?= $r['loc_g3']==301?'selected':'' ?>>301</option>
    </select>

    <label for="">course</label>
    <select name="course">
        <option value="c++" <?= $r['course_g3']=='c++'?'selected':'' ?>>c++</option>
        <option value="DE" <?= $r['course_g3']=='DE'?'selected':'' ?>>DE</option>
        <option value="DB" <?= $r['course_g3']=='DB'?'selected':'' ?>>DB</option>
        <option value="LINUX" <?= $r['course_g3']=='LINUX'?'selected':'' ?>>LINUX</option>
        <option value="OS" <?= $r['course_g3']=='OS'?'selected':'' ?>>OS</option>
        <option value="WEB" <?= $r['course_g3']=='WEB'?'selected':'' ?>>WEB</option>
    </select>

    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <input type="submit" name="sub3" value="Save Group 3" >
</form>

<!-- Group 4 -->
<form method="post" >
    <?php $r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM state_g4 LIMIT 1")); ?>
    <h3>Group 4</h3>

    <label>الحالة</label>
    <select name="state4">
        <option value="1" <?= $r['state_g4']==1?'selected':'' ?>>تشغيل</option>
        <option value="0" <?= $r['state_g4']==0?'selected':'' ?>>إيقاف</option>
    </select>

    <label>القاعة</label>
    <select name="loc4">
        <option value="101" <?= $r['loc_g4']==101?'selected':'' ?>>101</option>
        <option value="118" <?= $r['loc_g4']==118?'selected':'' ?>>118</option>
        <option value="318" <?= $r['loc_g4']==318?'selected':'' ?>>318</option>
        <option value="301" <?= $r['loc_g4']==301?'selected':'' ?>>301</option>
    </select>

    <label for="">course</label>
    <select name="course">
        <option value="c++" <?= $r['course_g4']=='c++'?'selected':'' ?>>c++</option>
        <option value="DE" <?= $r['course_g4']=='DE'?'selected':'' ?>>DE</option>
        <option value="DB" <?= $r['course_g4']=='DB'?'selected':'' ?>>DB</option>
        <option value="LINUX" <?= $r['course_g4']=='LINUX'?'selected':'' ?>>LINUX</option>
        <option value="OS" <?= $r['course_g4']=='OS'?'selected':'' ?>>OS</option>
        <option value="WEB" <?= $r['course_g4']=='WEB'?'selected':'' ?>>WEB</option>
    </select>

    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <input type="submit" name="sub4" value="Save Group 4" >
</form>

</body>
</html>

