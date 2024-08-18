<?php
include('connection.php');

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

if ($password !== $confirm_password) {
    // ส่งสถานะข้อผิดพลาดกลับไปยังหน้า editpassword.php
    header("Location: editpassword.php?error=passwords_do_not_match&username=" . urlencode($username));
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE login SET password='$hashed_password' WHERE username='$username'";

// update_password.php
if (mysqli_query($con, $sql)) {
    header("Location: editpassword.php?success=password_updated&username=" . urlencode($username));
    exit;
} else {
    header("Location: editpassword.php?error=update_failed&username=" . urlencode($username));
    exit;
}


?>
