<?php 
include './inc/db.php';
include './inc/form.php';
include './inc/select.php'; 
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>  زياد بندر الحارثي</title>
<link rel="stylesheet" href="./css/style.css">
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</head>
<body>


<div class="hero-section">
<div class="hero-content">
<img src="flo.jpg" alt="زياد بندر" class="admin-img">
<h1>فرصتك للفوز تبدأ هنا!</h1>
<h2>  <p>إعداد: زياد بندر  الحارثي</p>  </h2>
<div id="countdown">0 يوم و 0 ساعة و 5 دقيقة و 0 ثانية</div>
<br>
      
</div>
</div>
<br>
<br>




<div class="conditions-bar">
<div class="conditions-container">
<h3>شروط المشاركة في السحب:</h3>
 <ul>
 <li>▶️  <a href="https://youtu.be/6hgBFDTTwEk" target="_blank" class="video-link">مشاهدة الفيديو إلزامية (اضغط هنا)</a></li>
 <li>✅ التسجيل بالاسم الحقيقي لضمان صحة بيانات المشارك.</li>
 <li> ⏱️ يتم السحب تلقائيا وبشكل عشوائي بين المشاركين.</li>
 </ul>
</div>
</div>








<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 <h3 style="text-align: center; color: #bab6b6;">أدخل بياناتك للمشاركة في السحب</h3>
 <input type="text" name="firstName" placeholder="الاسم الأول" value="<?php echo htmlspecialchars($firstName ?? '') ?>">
<div class="error"><?php echo $errors['firstNameError'] ?? '' ?></div>
        
<input type="text" name="lastName" placeholder="الاسم الأخير" value="<?php echo htmlspecialchars($lastName ?? '') ?>">
<div class="error"><?php echo $errors['lastNameError'] ?? '' ?></div>
        
<input type="email" name="email" placeholder="البريد الإلكتروني" value="<?php echo htmlspecialchars($email ?? '') ?>">
<div class="error"><?php echo $errors['emailError'] ?? '' ?></div>

<div class="agreement-container">
<input type="checkbox" id="agree" name="agree" required>
<label for="agree">أوافق على استخدام معلوماتي لإدارةالسحب والتواصل مع الفائز.</label>
</div>
 <button type="submit" name="submit" id="submit">تأكيد المشاركة</button>
</form>
</div>






<button id="winner-btn">ابدأ السحب</button>

  <div id="modal">
  <div class="modal-content">
  <div id="loader" class="loader"></div>
  <div id="winner-details">
  <h2>🎉 الفائز هو 🎉</h2>
  <div class="separator"></div>
  <h1 class="winner-name">
 <?php echo $winner ? ($winner['firstName'] . ' ' . $winner['lastName']) : "لا يوجد مسجلين"; ?>
  </h1>
    <button class="close-btn-modern" onclick="location.reload()">إغلاق النافذة</button>
 </div>
 </div>
</div>






<script src="./js/script.js"></script>

<script>
    const winBtn = document.getElementById("winner-btn");
    const modalView = document.getElementById("modal");
    const loaderCircle = document.getElementById("loader");
    const infoWinner = document.getElementById("winner-details");

    winBtn.onclick = function() {
        modalView.style.display = "block";
        loaderCircle.style.display = "block";
        infoWinner.style.display = "none";

        setTimeout(function() {
            loaderCircle.style.display = "none";
            infoWinner.style.display = "block";

            var end = Date.now() + (2 * 1000);
            (function frame() {
                confetti({ particleCount: 5, angle: 60, spread: 55, origin: { x: 0 }, zIndex: 10001 });
                confetti({ particleCount: 5, angle: 120, spread: 55, origin: { x: 1 }, zIndex: 10001 });
                if (Date.now() < end) { requestAnimationFrame(frame); }
            }());
            confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 }, zIndex: 10001 });
        }, 2500);
    };
</script>

</body>
</html>
<?php include './inc/db_close.php'; ?>