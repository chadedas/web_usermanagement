<?php
$host = "mysql:host=localhost;dbname=nproboti_program_assember";
$user = "nproboti_program";
$pass = "TDamZzAkqYwFr7vwwu77";
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try {
    $con = new PDO($host, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit(); // เพิ่มการปิดการทำงานหากเกิดข้อผิดพลาด
}
?>
