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

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // เซสชั่นหมดอายุหลังจาก 30 นาทีของการไม่ได้ใช้งาน
    session_unset();    
    session_destroy();  
    header("Location: login.php");
    exit();
}
?>
