<?php
require 'conn.php';
session_start();

// === CSRF Token ===
if(empty($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32));
}


//هشوف الدكتور وافق ولا لا انه يفتح وبجيب اول صف فقط لاغير
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT state_g2_c1 FROM state_g2 LIMIT 1"));
// خزن القيمه بتاعت الموقع يفتح ولا لا وحط ان الافتراضى يكون صفر
$state_g2_c1 = $row ? $row['state_g2_c1'] : 0;
// بنفترض انه الجهاز لم يسجل ولا مره 0
$alreadyRegistered = false;
// بخزن عداد الوقت وهيبدا من 0 ملى ثانية وهيبدا يعد الوقت علشان اليوسر يسجل تانى
$remaining = 0;
// بشوف هل الجهاز ده سجل قبل كده  ولا لا 
if(isset($_COOKIE['registered_time'])){
    // هنا بنشوف الوقت الى شخص سجل فيه ونحولة لرقم عشرى عن طريق intval 
    $lastTime = intval($_COOKIE['registered_time']);
    // هنا الديد لاين يعنى بعد الفتره دى يفتح تانى 
    $waitTime = 10; 
    if(time() - $lastTime < $waitTime){
        // هنا بقى بنعمل الشرط لو الوقت الحالى - الوقت الى سجل فيه اصغر من الديد لاين ال هو 10 ثوانى 
        $alreadyRegistered = true; // لو بالفعل الوقت اقل اذن هو بالفعل مسجل = صح 

        $remaining = $waitTime - (time() - $lastTime);// هنا بيسجل الوقت الى انتظر فيه : الوقت = الدبد لاين - الوقت الحالى - اخر مره سجل = 
        // الوقت الى سجل ففيه = 5.5 الوقت الحالى = 5.15 الديد لاين = 5 دقايق === 5 - 5.15  -5.5 = 5 بقالة 5 دقايق مسجل يعنى الشرط بقى =0
    }
}

if ($state_g2_c1 == 1) { // هنا لو الدكتور لالفعل حط واحد يعنى فتح الموقع

    if ($alreadyRegistered  ==true) {
        // بتاكد ان لو اليوسر فعلا سجل قبل كده يعنى الاف دى ترو ف اذا ممنوع التسجيل حاليا
echo "

  <link rel='stylesheet' href='normalize.css' />
    <link rel='stylesheet' href='style.css' />

<div class='full-msg'>
    <div class='msg-box'>
        <img src='https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png' class='msg-icon' alt=''>
        <h2>لقد سجلت مسبقًا</h2>
        <p>لا يمكنك التسجيل مرة أخرى الآن، يرجى الانتظار.</p>
        <a href='index.html' class='back-btn'>رجوع</a>
    </div>
</div>
";
        exit();
    }
// لو ضغط ارسال هناخد بياناته علشان اخزنها فى الداتا بز
    if(isset($_POST['sub'])){
           if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
            die("حدث خطأ أمني (CSRF)");
           }
       // تنظيف المدخلات
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
        $id_s = intval($_POST['id_s']);
        
        $sqll =mysqli_query($conn, "SELECT course_g2_c1 FROM state_g2 LIMIT 1 ");
        while($row  = mysqli_fetch_assoc($sqll)){
        $course = $row ['course_g2_c1'];
        
    }
       $sl =mysqli_query($conn, "SELECT loc_g2_c1 FROM state_g2 LIMIT 1 ");
       while($row  = mysqli_fetch_assoc($sl)){
        $s_loc = $row ['loc_g2_c1'];
        
    }


      // اضافة البيانات فى الداتا بيز
            // === Prepared Statement لمنع SQL Injection ===
        $stmt = $conn->prepare("INSERT INTO group2 (name_g2_c1, id_g2_c1, course_g2_c1, loc_g2_c1) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $id_s, $course, $s_loc);

        if($stmt->execute()){ // او بالفعل الداتا دخلت الداتا بيز
                // حفظ وقت التسجيل بالكوكي علشان يبقلى عارف الشخص سجل قبل كده ولا لا لمدة ساعه 
  setcookie("registered_time", time(), [
                'expires' => time() + 3600,
                'path' => '/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]);                // اذ البيانات دخلت هيطبع دى ويحول اليوسر للصفحة الرئيسية
                echo "<script>alert(' تم تسجيل حضورك بنجاح!');window.location.href='index.html';</script>";
                exit();
            } else {
                echo "<p id='not'>❌ حدث خطأ أثناء التسجيل.</p>";
            }
        //}
    }

    // استلام الموقع من الجافا زفت
 // === الحصول على الموقع ===
    $lat = isset($_POST['lat']) ? floatval($_POST['lat']) : null;
    $lon = isset($_POST['lon']) ? floatval($_POST['lon']) : null;
    $tolerance = 0.000045;
 // تعريف البعد المتاح  قبل استخدامه

    $lo = mysqli_query($conn, "SELECT loc_g2_c1 FROM state_g2 LIMIT 1");
    while($row = mysqli_fetch_assoc($lo)){
        $locNum = $row['loc_g2_c1'];
// هنا بجيب الفيم من بتاعت اللوكيشن من الداتا بيز 
         if($locNum == 106){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_106, loc2_106 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_106'];
            $storedLon = $loc['loc2_106'];
        }
        elseif($locNum == 202){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_202, loc2_202 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_202'];
            $storedLon = $loc['loc2_202'];
        }
        elseif($locNum == 203){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_203, loc2_203 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_203'];
            $storedLon = $loc['loc2_203'];
        }
        elseif($locNum == 205){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_205, loc2_205 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_205'];
            $storedLon = $loc['loc2_205'];
        }
               elseif($locNum == 207){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_207, loc2_207 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_207'];
            $storedLon = $loc['loc2_207'];
        }
           elseif($locNum == 316){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_316, loc2_316 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_316'];
            $storedLon = $loc['loc2_316'];
        }
          elseif($locNum == 304){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_304, loc2_304 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_304'];
            $storedLon = $loc['loc2_304'];
        }
          elseif($locNum == 315){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_315, loc2_315 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_315'];
            $storedLon = $loc['loc2_315'];
        }
          elseif($locNum == 316){
            $loc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT loc1_316, loc2_316 FROM location_b LIMIT 1"));
            $storedLat = $loc['loc1_316'];
            $storedLon = $loc['loc2_316'];
        }
    }
    
// لو فيه قيم بالفعل هينفذ الى داخل الشرط
    if ($lat && $lon) {
        // بيعمل مقارنه لو القيم المدخله =< القيم المخزنه 
        // مكان الطال<= القيم المخزنه - الحد الادنى 
        if ($lat >= $storedLat - $tolerance && $lat <= $storedLat + $tolerance &&
            $lon >= $storedLon - $tolerance && $lon <= $storedLon + $tolerance) {

            // عرض فورم التسجيل
            echo "
             <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

         <link rel='stylesheet' href='normalize.css' />
    <link rel='stylesheet' href='style.css' />
    <link rel='shortcut icon' href='https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png'
        type='image/x-icon' />
<div class='container'>
        <img src='web1.jpg' alt='web1' class='web-img'>
        <section class='group-section'>
            <h2 class='group-title'>The absence of The Group 2</h2>
                <h1>Group 2 Section 1</h1>
                <hr>
            <form method='post' class='group-form'>
                <div class='form-group'>
                <input type='hidden' name='token' value='{$_SESSION['token']}'>
                 <label for='name' class='form-label'>Name</label>
                    <input  type='text' id='name' name='name' class='form-input' required><br>
                   <label for='id_s' class='form-label'>ID</label>
                    <input type='number' id='id_s' name='id_s' class='form-input' required />
                   <br><br>
                   </div>
                     <div class='form-actions'>
                    <button type='submit' name='sub' class='submit-btn'>submit</button>
                </div>
                </form>
                </section>
            </div>
             </body>
</html>
            ";
            exit();

        } else {
            echo "<p id='not'>❌ أنت بعيد عن الموقع</p>
            $lat,$lon
            ";
        }
    } else {
        $message = "<p> من فضلك شغل اللوكيشن علشان تقدر تسجل </p> ";
    }

   
    echo "
     <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <link rel='stylesheet' href='normalize.css' />
    <link rel='stylesheet' href='style.css' />
    <link rel='shortcut icon' href='https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png' type='image/x-icon' />
            </head>
            <body>
            <div class='page'>
        
        <div class='card'>
            <h2 class='title'>Group 2 Section 1</h2>
            <div class='line'></div>

            <p class='msg'>Please enable location<br>services so you can register</p>

            <form method='post' id='locForm'>
                <input type='hidden' name='lat' id='lat'>
                <input type='hidden' name='lon' id='lon'>
                <button type='submit' id='sendBtn' disabled>
                    Register your location
                </button>
            </form>
        </div>

        <div class='right'>
            <img src='https://i.postimg.cc/0y44MsH1/Picsart-25-11-27-23-47-53-304.png' type='image/x-icon' class='logo'>
            <p class='arabic'>جامعة برج العرب التكنولوجية</p>
            <p class='eng'>BORG AL ARAB TECHNOLOGICAL UNIVERSITY</p>
        </div>

    </div>

        <script>
        // خاصية اقدر من خلالها الموقع من المتصفح 
        navigator.geolocation.getCurrentPosition(
        // دالة بتاخد خط الطول والعرض
            function(pos) {
                document.getElementById('lat').value = pos.coords.latitude;// خط الطول
                document.getElementById('lon').value = pos.coords.longitude; // خط العرض
                const btn = document.getElementById('sendBtn'); // بياخد قيمة الوتن من الموقع
                btn.disabled = false; // لو البوتن فولس  ويغير الرسالة الى ارسال الموقع
                btn.textContent = 'إرسال الموقع ';  
            },

            
            function(err) {
            // دالة للايرورز 
                let msg = document.createElement('p'); // فى حالة وجود خطا بيخرج رسالة داخل برجراف 
                msg.style.color = 'red'; // لونها احمر
                msg.textContent = ' لم يتم الإذن أو حدث خطأ: ' + (err.message || ''); // الرسالة الى هتخرج + الايرور بتاع المتصفح
                document.body.insertBefore(msg, document.forms[0]); // هنا هيخلى الرسالة تبقى فوق ف اول الصفحة
            },
            //دالة بتحاول تعلى دقة الموقع 
            { enableHighAccuracy: true }
        );
        </script>
         </body>
</html>
    ";

} else {
    // لو المجموعة مقفولة
    echo "
     <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

  <link rel='stylesheet' href='style.css'>

<div class='closed-wrapper'>
    <div class='closed-box'>
        <h1>This Section is Closed Now</h1>
        <p class='sub'>Please check again later.</p>
        <hr>
    </div>
</div>
 </body>
</html>
    ";
}
?>