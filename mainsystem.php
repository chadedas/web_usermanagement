<?php
include('session_check.php');
?>
<!doctype php>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Kanit', sans-serif;
      scroll-behavior: smooth;
    }
    .btn-group-inline form {
      display: inline-block;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-5 mb-1">
    <div class="col-md-10 mx-auto">
      <div class="row">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <div class="card-header bg-primary text-white text-center">
              <h4 class="mb-0">User Management</h4>
            </div>
            <div class="d-flex justify-content-end mb-2">
              <a href="addnewuser.php"><button type="button" class="btn btn-sm btn-success shadow-sm mb-1 mt-1">เพิ่มผู้ใช้</button></a>
              <a href="logout.php"><button type="button" class="btn btn-sm btn-danger shadow-sm mb-1 mt-1 ms-2">Logout</button></a>
            </div>
            <table class="table align-middle mb-0 bg-white table-hover">
            <thead class="bg-light">
                <tr class="fw-bold text-center">
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>ชื่อผู้ใช้</th>
                  <th>สิทธิ์การแก้ไข</th>
                  <th>วันที่เพิ่ม</th>
                  <th>แก้ไข</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include('connection.php');

                // Query to select data from Persons table
                $result = mysqli_query($con, "SELECT firstname, lastname, username, permission, date FROM login");

                if ($result) {
                  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } else {
                  die("Error executing query: " . mysqli_error($con));
                }
                ?>
                <?php if (!empty($data)): ?>
                  <?php foreach ($data as $row): ?>
                    <tr class="text-center">
                      <td><?= htmlspecialchars($row['firstname']) ?></td>
                      <td><?= htmlspecialchars($row['lastname']) ?></td>
                      <td><?= htmlspecialchars($row['username']) ?></td>
                      <td>
                        <?php
                          if ($row['permission'] === 'admin') {
                            echo 'ผู้ดูแล';
                          } elseif ($row['permission'] === 'user') {
                            echo 'ผู้ใช้ปกติ';
                          } else {
                            echo 'สิทธิ์ไม่ทราบ';
                          }
                        ?>
                      </td>
                      <td><?= htmlspecialchars($row['date']) ?></td>
                      <td class="btn-group-inline">
                        <form action="edituser.php" method="get">
                          <input type="hidden" name="username" value="<?= htmlspecialchars($row['username']) ?>">
                          <button type="submit" class="btn btn-success btn-sm fw-bold">แก้ไขข้อมูล</button>
                        </form>
                        <form action="editpassword.php" method="get">
                          <input type="hidden" name="username" value="<?= htmlspecialchars($row['username']) ?>">
                          <button type="submit" class="btn btn-danger btn-sm fw-bold">เปลี่ยนรหัสผ่าน</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php else: ?>
                  <tr>
                    <td colspan="2" class="text-center">ไม่พบข้อมูลผู้ใช้</td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-muted text-center">
            Program Kuka KR150 Assember
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
