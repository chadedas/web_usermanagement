<?php
include('connection.php');

// ตั้งค่าเขตเวลาเป็นประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// รับค่าจากฟอร์ม
$username = mysqli_real_escape_string($con, $_POST['username']);
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$permission = mysqli_real_escape_string($con, $_POST['permission']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

if ($password !== $confirm_password) {
    // ส่งสถานะข้อผิดพลาดกลับไปยังหน้า editpassword.php
    header("Location: mainsystem.php?error=passwords_do_not_match");
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO login (username, firstname, lastname, permission, password, date) 
        VALUES ('$username', '$firstname', '$lastname', '$permission', '$hashed_password', NOW())";

if (mysqli_query($con, $sql)) {
    header("Location: addnewuser.php?success=user_added&username=" . urlencode($username));
    exit;
} else {
    echo "Error adding record: " . mysqli_error($con);
}
?>