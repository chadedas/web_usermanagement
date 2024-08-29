<?php
session_set_cookie_params([
    'lifetime' => 0,  // เซสชั่นจะหมดอายุเมื่อปิดเบราว์เซอร์
    'path' => '/', 
    'domain' => $_SERVER['HTTP_HOST'], 
    'secure' => isset($_SERVER['HTTPS']),  // ทำงานเฉพาะใน HTTPS
    'httponly' => true,  // ป้องกันการเข้าถึงคุกกี้จาก JavaScript
    'samesite' => 'Strict',  // ป้องกันการโจมตี CSRF
]);

session_start();

// ตรวจสอบว่าผู้ใช้ไม่ได้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: index.php");  // ถ้าไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า login
    exit();
}

// ตรวจสอบว่ากิจกรรมล่าสุดนานเกิน 30 นาทีหรือไม่
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();    // ลบข้อมูลเซสชัน
    session_destroy();  // ทำลายเซสชัน
    header("Location: index.php");  // เปลี่ยนเส้นทางไปยังหน้า login
    exit();
}

// อัปเดตเวลาล่าสุดของกิจกรรมในเซสชัน
$_SESSION['LAST_ACTIVITY'] = time();

// สร้าง ID เซสชันใหม่เพื่อป้องกันการ hijacking
session_regenerate_id(true);
?>
