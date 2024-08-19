<?php
include('connection.php');
session_start();
// ตรวจสอบการเข้าสู่ระบบ
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

// รับ username จาก URL
if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($con, $_GET['username']);
    
    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $result = mysqli_query($con, "SELECT * FROM login WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die("User not found.");
    }
} else {
    die("Username is not specified.");
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style_edituser.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Kanit', sans-serif;
      scroll-behavior: smooth;
    }

    .form-label {
      font-size: 0.9em;
      color: #6c757d;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container register">
    <div class="row">
      <div class="col-md-3 register-left">
        <img src="image/NPPP.png" alt="" />
        <h3>User Management</h3>
        <p>สำหรับแก้ไขข้อมูลผู้ใช้โปรแกรมถอดประกอบ KR150</p>
      </div>
      <div class="col-md-9 register-right">
        <h3 class="register-heading">แก้ไขรหัสผ่าน</h3>
        <form action="update_password.php" method="post">
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password *" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password *" required />
              </div>
              <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
              <input type="submit" class="btnRegister" value="ยืนยัน" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    <?php if ($error == 'passwords_do_not_match'): ?>
      Swal.fire({
        icon: 'error',
        title: 'รหัสผ่านไม่ถูกต้อง',
        text: 'รหัสผ่านไม่ตรงกัน',
      }).then(function() {
        window.location = 'FRONT_END/editpassword.php?username=' + encodeURIComponent('<?php echo htmlspecialchars($user['username']); ?>');
      });
    <?php elseif ($success == 'password_updated'): ?>
      Swal.fire({
        title: 'เปลี่ยนรหัสผ่านสำเร็จ',
        text: 'คุณจะถูกเปลี่ยนเส้นทางไปยังระบบหลัก',
        icon: 'success',
        timer: 1000,
        timerProgressBar: true
      }).then(function() {
        window.location = 'FRONT_END/mainsystem.php'; // เปลี่ยนเส้นทางไปยังหน้า mainsystem.php
      });
    <?php endif; ?>
  });
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
