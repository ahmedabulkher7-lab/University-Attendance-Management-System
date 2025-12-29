<?php
session_start();
require 'conn.php';

// ==== تحقق من تسجيل الدخول للأدمن ====
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true){
    header("Location: login.php");
    exit;
}

// ==== CSRF Token ====
if(empty($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// ==== دالة لحماية عرض البيانات ====
function safe($data){
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>
<body>

<h2 class="title">Select Group</h2>
<form method='post'>
    <button name='state_g1'>Group1</button>
    <button name='state_g2'>Group2</button>
    <button name='state_g3'>Group3</button>
    <button name='state_g4'>Group4</button>
</form>

<?php
// ==== اختيار الجروب ====
$allowed_groups = ['g1','g2','g3','g4'];
$allowed_sections = ['c1','c2','c3','c4'];

foreach($allowed_groups as $g){
    if(isset($_POST["state_$g"])){
        echo "
        <form method='post'>
            <input type='hidden' name='group' value='$g'>
            <input type='hidden' name='token' value='{$_SESSION['token']}'>
            <button name='c1'>C1</button>
            <button name='c2'>C2</button>
            <button name='c3'>C3</button>
            <button name='c4'>C4</button>
        </form>
        ";
    }
}

// ==== اختيار السكشن ====
$group = $_POST['group'] ?? null;
$section = null;

foreach($allowed_sections as $s){
    if(isset($_POST[$s])){
        $section = $s;
    }
}

if($group && $section){
    echo "
    <form method='post'>
        <input type='hidden' name='group' value='".safe($group)."'>
        <input type='hidden' name='section' value='".safe($section)."'>
        <input type='hidden' name='token' value='{$_SESSION['token']}'>
        
        <label>State:</label>
        <select name='state'>
            <option value='1'>On</option>
            <option value='0'>Off</option>
        </select>
        <br><br>

        <label>Location:</label>
        <select name='loc'>
            <option value='106'>106</option>
            <option value='202'>202</option>
            <option value='203'>203</option>
            <option value='205'>205</option>
            <option value='207'>207</option>
            <option value='216'>216</option>
            <option value='304'>304</option>
            <option value='315'>315</option>
            <option value='316'>316</option>
        </select>
        <br><br>

        <label>Course:</label>
        <select name='course'>
            <option value='c++'>C++</option>
            <option value='DE'>DE</option>
            <option value='DB'>DB</option>
            <option value='LINUX'>LINUX</option>
            <option value='WEB'>WEB</option>
        </select>
        <br><br>

        <input type='submit' name='save' value='Save'>
    </form>
    ";
}

// ==== حفظ التعديلات مع Prepared Statements و CSRF ====
if(isset($_POST['save'])){
    if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
        die("CSRF token mismatch");
    }

    $group = $_POST['group'];
    $section = $_POST['section'];
    $state = $_POST['state'];
    $loc = $_POST['loc'];
    $course = $_POST['course'];

    if(!in_array($group, $allowed_groups) || !in_array($section, $allowed_sections)){
        die("Invalid group or section");
    }

    $sql = "UPDATE state_$group SET state_{$group}_{$section}=?, loc_{$group}_{$section}=?, course_{$group}_{$section}=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $state, $loc, $course);
    mysqli_stmt_execute($stmt);

    echo "<p>✅ Updated ".safe($group)." - ".safe($section)." successfully!</p>";
}
?>
</body>
</html>
