

<?php
session_start();
require "conn.php"; // الملف اللي فيه الاتصال بالداتا بيز

// ==== CSRF Token ====
if(empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$error = "";

// ==== معالجة الفورم ====
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die("Invalid request");
    }

    // تنظيف المدخلات
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)) {
        $error = "Please fill all fields";
    } else {
        // جلب المستخدم من الداتا بيز بأمان
        $stmt = $conn->prepare("SELECT id, password FROM acount WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user && password_verify($password, $user['password'])) {
            // تسجيل الدخول
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_id'] = $user['id'];

            header("Location: main.php");
            exit;
        } else {
          echo  "<p id='not' >Invalid email or password</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
        <link rel="shortcut icon" href="https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png" type="image/x-icon" />

</head>
<body >
        <div class="login-container">

    <?php if($error != ""): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" class="login-box">
            <h2 class="login-title">Login</h2>

        <label dir="ltr">Email </label><br>
        <input type="email" name="email" placeholder="Enter your email" required  dir="ltr"><br><br>

        <label dir="ltr">Password </label><br>
        <input type="password" name="password"placeholder="Enter your password" required dir="ltr"><br><br>

        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
   <input type="submit" name="submit" value="Login" class="login-btn">
             <img src="https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png" alt="Logo" class="logo" />
        
        </form>
        </div>
</body>
</html>

