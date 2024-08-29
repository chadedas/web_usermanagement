<?php
include('connection.php');

// รับค่าจากฟอร์ม
$username = mysqli_real_escape_string($con, $_POST['username']);
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$permission = mysqli_real_escape_string($con, $_POST['permission']);

$sql = "UPDATE login SET firstname='$firstname', lastname='$lastname', permission='$permission' WHERE username='$username'";

if (mysqli_query($con, $sql)) {
    header("Location: edituser.php?success=user_updated&username=" . urlencode($username));
    exit;
} else {
    echo "Error updating record: " . mysqli_error($con);
}