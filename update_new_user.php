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
$expdate = mysqli_real_escape_string($con, $_POST['expdate']);

// ตรวจสอบว่ารหัสผ่านตรงกันหรือไม่
if ($password !== $confirm_password) {
    header("Location: mainsystem.php?error=passwords_do_not_match");
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// ฟังก์ชันในการ generate licenseKey
function generateLicenseKey($length = 16) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $licenseKey = '';
    for ($i = 0; $i < $length; $i++) {
        $licenseKey .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $licenseKey;
}

// ตรวจสอบ licenseKey ไม่ให้ซ้ำ
do {
    $licenseKey = generateLicenseKey();
    $checkKeyQuery = "SELECT username FROM login WHERE licenseKey = '$licenseKey'";
    $result = mysqli_query($con, $checkKeyQuery);
} while (mysqli_num_rows($result) > 0);

// ตรวจสอบและจัดการวันที่หมดอายุ
$expdate_input = NULL; // ตั้งค่าเริ่มต้น
if ($expdate === 'has') {
    if (!empty($_POST['expdate_input'])) {
        $expdate_input = mysqli_real_escape_string($con, $_POST['expdate_input']);
    }
}

// เตรียม SQL Query สำหรับการบันทึกข้อมูล
$sql = "INSERT INTO login (username, firstname, lastname, permission, password, licenseKey, date, EXPDATE) 
        VALUES ('$username', '$firstname', '$lastname', '$permission', '$hashed_password', '$licenseKey', NOW(), " . 
        ($expdate_input ? "'$expdate_input'" : "NULL") . ")";

// ตรวจสอบว่า SQL Query ทำงานสำเร็จหรือไม่
if (mysqli_query($con, $sql)) {
    header("Location: addnewuser.php?success=user_added&username=" . urlencode($username));
    exit;
} else {
    echo "Error adding record: " . mysqli_error($con);
}
?>
