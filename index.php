<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: mainsystem.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    html,
    body {
      font-family: 'Kanit', sans-serif;
      scroll-behavior: smooth;
    }

    .bg-opacity-90 {
      opacity: 0.9 !important;
    }

    .shadow_nav {
      box-shadow: 0px 10px 15px rgb(0 0 0 / 7%);
      z-index: 10000;
    }

    .bg_top {
      background-color: #3784f5;
    }

    .btn:first-child:hover,
    :not(.btn-check)+.btn:hover {
      background: #3784f5;
      color: white !important;
      border-radius: 5px !important;
    }

    .btn1:first-child:hover,
    :not(.btn1-check)+.btn1:hover {
      background: #ff0000;
      color: white !important;
      border-radius: 5px !important;
    }

    .btn2:first-child:hover,
    :not(.btn2-check)+.btn2:hover {
      background: #198754;
      color: white !important;
      border-radius: 5px !important;
    }

    .py-6 {
      padding-top: 6rem !important;
      padding-bottom: 3rem !important;
    }
  </style>
</head>

<body>
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
      <div class="text-center">
        <img src="image/NPPP.png" height="50" width="50" class="rounded mb-2" alt="...">
      </div>
      <h4 class="text-center mb-3">เข้าสู่ระบบ</h4>

      <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
        <div class="form-outline mb-4">
          <label class="form-label" for="username">ชื่อผู้ใช้</label>
          <input type="text" id="user" name="user" class="form-control" required />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="password">รหัสผ่าน</label>
          <input type="password" id="pass" name="pass" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      <p class="text-center mt-5 "><a href="https://www.np-robotics.com/"
          class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover "
          target="_blank">บริษัท.
          เอ็น.พี. โรโบติกส์ แอนด์ โซลูชั่น จำกัด</a></p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function validation() {
      var id = document.f1.user.value;
      var ps = document.f1.pass.value;
      if (id.length == "" && ps.length == "") {
        alert("User Name and Password fields are empty");
        return false;
      }
      else {
        if (id.length == "") {
          alert("User Name is empty");
          return false;
        }
        if (ps.length == "") {
          alert("Password field is empty");
          return false;
        }
      }
    }  
  </script>

</body>

</html>