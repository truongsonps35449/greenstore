<?php
session_start();
include '../model/xl_user.php';

$allUsers = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="container-fluid main-page">
    <div class="app-main">
      <nav class="sidebar bg-success">
        <ul>
          <li>
            <img src="../upload/img/logo.png" alt="" width="100px" />
          </li>
          <li class="d-flex align-items-center">
            <img src="assets/img/user.jpg" alt="Avatar" width="30" class="rounded-circle">
            <?php
            if (isset($_SESSION['ten_tk'])) {
              echo '<div class="ms-3 text-white"> Hi, ' . $_SESSION['ten_tk'] . '</div>';
            } else {
              echo '<div class="ms-3">Hi anonymous</div>';
            }
            ?>
          </li>
          <li>
            <a href="dashboard.php"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
          </li>
          <li>
            <a href="order.php"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản kí đơn
              hàng</a>
          </li>
          <li>
            <a href="caterogies.php"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh
              muc</a>
          </li>
          <li>
            <a href="products.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
          </li>
          <li>
            <a href="user.php"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
          </li>
        </ul>
      </nav>
      <div class="main-content">
        <h3 class="title-page">Thành viên</h3>
        <div class="d-flex justify-content-end">
          <a href="" class="btn btn-primary mb-2">Thêm thành viên</a>
        </div>
        <table id="example" class="table table-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Mã tài khoản</th>
              <th>Tên user</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Quyền</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($allUsers as $user) {
              if ($user['quyen'] == 1) {
                $tenquyen = 'User';
              } else {
                $tenquyen = 'Admin';
              }

              echo '
                  <tr>
                    <td>' . $user['ma_tk'] . '</td>
                    <td>' . $user['ten_tk'] . '</td>
                    <td>' . $user['email'] . '</td>
                    <td>' . $user['dia_chi'] . '</td>
                    <td>' . $tenquyen . '</td>
                    <td>
                      <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                      <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Ẩn</a>
                      <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hiện</a>
                    </td>
                  </tr>
                ';
            }
            ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <script>
    // new DataTable('#example');
  </script>
</body>

</html>