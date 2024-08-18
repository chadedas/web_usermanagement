<?php
include('connection.php');

// รับค่า username จาก URL
if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($con, $_GET['username']);

    // ลบข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "DELETE FROM login WHERE username='$username'";

    if (mysqli_query($con, $sql)) {
        // หากลบสำเร็จ
        header("Location: mainsystem.php?success=user_deleted");
        exit;
    } else {
        // หากเกิดข้อผิดพลาด
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    die("Username is not specified.");
}
?>
