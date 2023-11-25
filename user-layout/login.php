<?php
include '../model/xl_user.php';
$query = explode('&', $_SERVER["QUERY_STRING"]);
session_start();
$ketqua = -1;
$thongbao = '';

if (isset($_SESSION['ten_tk']) && isset($_SESSION['ma_tk']) && isset($_SESSION['quyen'])) {
  if ($_SESSION['quyen'] == 1) {
    header('Location: http://localhost/greenstore/user-layout/index.php');
  } else if ($_SESSION['quyen'] == 0) {
    header('Location: http://localhost/greenstore/admin-layout/dashboard.php');
  }
}

if (isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] != '') {
  if ($_SERVER["QUERY_STRING"] != 'action=logout' && isset($query)) {
    $username = explode('=', $query[0])[1];
    $password = explode('=', $query[1])[1];
    $taikhoan = dangnhap($username, $password);

    if (count($taikhoan) > 0) {
      if ($taikhoan[0]['quyen'] == 1) {
        $ketqua = 1;
      } else {
        $ketqua = 2;
      }
    } else {
      $ketqua = 0;
    }

    if ($ketqua == 1) {
      $_SESSION['ten_tk'] = $taikhoan[0]['ten_tk'];
      $_SESSION['ma_tk'] = $taikhoan[0]['ma_tk'];
      $_SESSION['quyen'] = $taikhoan[0]['quyen'];
      header('Location: http://localhost/greenstore/user-layout/index.php');
    } else if ($ketqua == 2) {
      $_SESSION['ten_tk'] = $taikhoan[0]['ten_tk'];
      $_SESSION['ma_tk'] = $taikhoan[0]['ma_tk'];
      $_SESSION['quyen'] = $taikhoan[0]['quyen'];
      header('Location: http://localhost/greenstore/admin-layout/dashboard.php');
    }
  } else {
    $_SESSION['ten_tk'] = null;
    $_SESSION['ma_tk'] = null;
    $_SESSION['quyen'] = null;
    header('Location: http://localhost/greenstore/user-layout/login.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENSTORE</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/detail.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg py-3" style="background-color: #20941E;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" height="50px" alt="">
      </a>
      <button class="navbar-toggler border-0 bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item mx-2">
            <a class="nav-link " href="index.php">Trang chủ</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="products.php?page=1">Sản phẩm</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Danh mục
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link " href="#">Liên hệ</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link " href="#">Giới thiệu</a>
          </li>
          <li class="nav-item mx-2">
            <form class="d-flex mt-2">
              <button class="rounded-start-pill border-0" style="background-color: #D4CBCB;" type="submit"><img src="img/search.png" width="20px" alt=""></button>
              <input class="rounded-end-pill border-0 me-1" style="background-color: #D4CBCB;" type="search" placeholder="Tìm kiếm" aria-label="Search">
            </form>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#"><img src="img/cart.png" width="30" alt=""></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/user.jpg" alt="Avatar" width="30" class="rounded-circle">
            </a>
            <ul class="dropdown-menu">
              <?php
              if (!isset($_SESSION['ten_tk'])) {
                echo '<li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>';
              } else {
                echo '<li><a class="dropdown-item" href="#">Hi' . $_SESSION['ten_tk'] . '</a></li> 
                <li>
                <hr class="dropdown-divider">
              </li>
                <li><a class="dropdown-item" href="login.php?action=logout">Đăng xuất</a></li>';
              }
              ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h2 class="card-header">Đăng nhập</h2>
          <div class="card-body">
            <form id="loginForm">
              <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" class="form-control border border-primary" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control border border-primary" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary float-end">Đăng nhập</button>
            </form>
          </div>
          <?php
          if ($ketqua == 0) {
            $thongbao = 'Sai tên tài khoản hoặc mật khẩu';
          }
          ?>
          <div id="error-message" class="ms-3 text-danger"><?php echo $thongbao ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer bg-dark text-light mt-4">
    <div class="d-flex justify-content-evenly ">
      <div class="p-2 mt-4">
        <h5>Thông tin liên hệ:</h5>
        <p>Phone: 0355451956</p>
        <p>Email: greenStore.vn@gmail.com</p>
      </div>
      <div class="p-2 mt-4">
        <h5>Chính sách hỗ trợ:</h5>
        <p>Tìm kiếm</p>
        <p>Giới thiệu</p>
        <p>Chính sách đổi trả</p>
        <p>Chính sách bảo mật</p>
        <p>Điều khoản dịch vụ</p>
      </div>
      <div class="p-2 mt-4">
        <h5>Thông tin liên kết:</h5>
        <p>Kết nối với chúng tôi</p>
        <img src="img/fblg.png" alt="" width="30px">
        <img src="img/inlg.png" alt="" width="30px">
        <p>Thah toán </p>
        <img src="img/visa.png" alt="" width="30px">
        <img src="img/momo.jpg" alt="" width="30px">
      </div>
    </div>
  </footer>
  <!-- Bootstrap JS and Popper.js (for Bootstrap modal and other features) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    function login() {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      var errorMessage = document.getElementById('error-message');

      // Kiểm tra xem có trường nào để trống không
      if (!username || !password) {
        errorMessage.innerHTML = 'Vui lòng điền đầy đủ thông tin.';
        return;
      }
    }
  </script>

</body>

</html>