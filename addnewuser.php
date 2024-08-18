<?php
include('connection.php');
include('session_check.php');
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add User Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="CSS/style_edituser.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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

    .btnRegister {
      margin-top: 10px;
      width: 100%;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container register">
    <div class="row">
      <div class="col-md-3 register-left">
        <img src="image/NPPP.png" alt="" />
        <h3>User Management</h3>
        <p class="">สำหรับเพิ่มข้อมูลผู้ใช้โปรแกรมถอดประกอบ KR150</p>
      </div>
      <div class="col-md-9 register-right">
        <h3 class="register-heading">เพิ่มข้อมูลผู้ใช้โปรแกรมใหม่</h3>
        <form action="update_new_user.php" method="post">
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname" class="form-label">ชื่อจริง</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="ชื่อจริง *" required />
              </div>
              <div class="form-group">
                <label for="lastname" class="form-label">นามสกุล</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="นามสกุล *" required />
              </div>
              <div class="form-group">
                <label for="permission" class="form-label">สิทธิ์การเข้าถึง</label>
                <select name="permission" id="permission" class="form-control" required>
                  <option value="user">ผู้ใช้ปกติ</option>
                  <option value="admin">แอดมินผู้ดูแล</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="username" class="form-label">ชื่อผู้ใช้ (ภาษาอังกฤษ)</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้ *" required />
              </div>
              <div class="form-group">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน *" required />
              </div>
              <div class="form-group">
                <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน *" required />
              </div>
            </div>
            <input type="submit" class="btn btn-primary btnRegister" value="ยืนยัน" />
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      <?php if ($success == 'user_added'): ?>
        Swal.fire({
          title: 'เพิ่มข้อมูลสำเร็จ',
          text: 'คุณจะถูกเปลี่ยนเส้นทางไปยังระบบหลัก',
          icon: 'success',
          timer: 1000,
          timerProgressBar: true
        }).then(function() {
          window.location = 'mainsystem.php';
        });
      <?php endif; ?>
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
