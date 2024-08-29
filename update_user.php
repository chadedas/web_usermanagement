<?php
include('connection.php');

// รับค่าจากฟอร์ม
$username = mysqli_real_escape_string($con, $_POST['username']);
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$permission = mysqli_real_escape_string($con, $_POST['permission']);
$expdate = mysqli_real_escape_string($con, $_POST['expdate']);
$expdate_input = !empty($_POST['expdate_input']) ? mysqli_real_escape_string($con, $_POST['expdate_input']) : NULL;


// เตรียม SQL Query สำหรับการอัพเดตข้อมูล
$sql = "UPDATE login SET firstname='$firstname', lastname='$lastname', permission='$permission', EXPDATE=" . 
        ($expdate === 'has' ? ($expdate_input ? "'$expdate_input'" : "NULL") : "NULL") . 
        " WHERE username='$username'";
        
if (mysqli_query($con, $sql)) {
    header("Location: edituser.php?success=user_updated&username=" . urlencode($username));
    exit;
} else {
    echo "Error updating record: " . mysqli_error($con);
}