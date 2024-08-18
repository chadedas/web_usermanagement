<?php
include('connection.php');

// ตั้งค่าเขตเวลาเป็นประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// รับค่าจากฟอร์ม
$username = mysqli_real_escape_string($con, $_POST['username']);
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$permission = mysqli_real_escape_string($con, $_POST['permission']);

$current_date = date('Y-m-d H:i:s');

$sql = "UPDATE login SET firstname='$firstname', lastname='$lastname', permission='$permission', date='$current_date' WHERE username='$username'";

if (mysqli_query($con, $sql)) {
    header("Location: edituser.php?success=user_updated&username=" . urlencode($username));
    exit;
} else {
    echo "Error updating record: " . mysqli_error($con);
}

?>
