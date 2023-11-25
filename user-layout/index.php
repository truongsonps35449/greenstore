<?php
include '../model/xl_product.php';
session_start();
$sanphamnoibat = getSanPhamNoiBat();
$sanphammoinhat = getSanPhamMoiNhat();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GREENSTORE</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/detail.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg py-3" style="background-color: #20941e">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" height="50px" alt="" />
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

  <!-- Banner Section -->
  <div class="" style="
        min-height: 300px;
        width: 100%;
        background-image: url(img/bn.jpg);
        color: white;
        background-size: cover;
      ">
    <div class="jumbotron text-center container" style="background: none; max-width: 800px">
      <p class="lead" style="letter-spacing: 2px; font-family: 'Playfair Display', serif">
        CHÀO MỪNG ĐẾN VỚI THE GARDEN​
      </p>
      <h1 class="display-4" style="font-family: 'Playfair Display', serif; font-size: 4.5rem">
        Nơi cung cấp các cây cảnh giá rẻ, chất lượng
      </h1>
      <a class="btn btn-light btn-lg" href="#" role="button">Mua Ngay</a>
    </div>
  </div>
  <!-- main -->
  <div class="container mt-4 text-center">
    <!-- Row with 4 Columns -->
    <div class="row mt-4">
      <h2>NEW ARRIVALS</h2>

      <?php
      foreach ($sanphammoinhat as $sp) {
        echo '
          <div class="col-3 card">
            <img src="/greenstore/upload/img/' . $sp['Hinh_sp'] . '" class="card-img-top" alt="Image">
            <div class="card-body">
              <h5 class="card-title">' . $sp['Ten_sp'] . '</h5>
              <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-secondary"><del>' . $sp['Gia'] . '</dev></li>
              <li class="list-group-item fw-bold">' . $sp['Gia_KM'] . '</li>
            </ul>
            <div class="card-body">
              <a href="detail.php?sp=' . $sp['Ma_sp'] . '" class="btn btn-primary card-link">Mua</a>
              <a href="#" class="btn btn-warning card-link">Thêm</a>
            </div>
          </div>';
      }
      ?>

      <a href="products.php?page=1" class="mt-2" style="text-decoration: none; color: black; font-weight: bold">View all</a>
    </div>
    <div class="row mt-4">
      <h2>TOP VIEW</h2>

      <?php
      foreach ($sanphamnoibat as $sp) {
        echo '
          <div class="col-3 card">
            <img src="/greenstore/upload/img/' . $sp['Hinh_sp'] . '" class="card-img-top" alt="Image">
            <div class="card-body">
              <h5 class="card-title">' . $sp['Ten_sp'] . '</h5>
              <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-secondary"><del>' . $sp['Gia'] . '</dev></li>
              <li class="list-group-item fw-bold">' . $sp['Gia_KM'] . '</li>
            </ul>
            <div class="card-body">
              <a href="detail.php?sp=' . $sp['Ma_sp'] . '" class="btn btn-primary card-link">Mua</a>
              <a href="#" class="btn btn-warning card-link">Thêm</a>
            </div>
          </div>';
      }
      ?>

      <a href="products.php?page=1" class="mt-2" style="text-decoration: none; color: black; font-weight: bold">View all</a>
    </div>

    <div class="row mt-4">
      <h2 class="text-start" style="font-weight: bold">
        Đánh giá của khách hàng
      </h2>
      <!-- Column 1 -->
      <div class="col-md-4 mt-4 px-4">
        <div class="card" style="border: none">
          <div class="card-body">
            <!-- Rating (5 stars) -->
            <div class="rating">
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
            </div>
            <br />
            <h5 class="card-title mt-2 text-start">MR.SON</h5>
            <p class="card-text mt-2 text-start">
              Một trải nghiệm đầy tuyệt vời tại shop GreenStore quần áo gái rẻ
              hơn so với thị trường và chất liệu thì lại rất tốt tôi đánh giá
              5 sao... <a href="">See more</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Column 2 -->
      <div class="col-md-4 mt-4 px-4">
        <div class="card" style="border: none">
          <div class="card-body">
            <!-- Rating (5 stars) -->
            <div class="rating">
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
            </div>
            <br />
            <h5 class="card-title mt-2 text-start">MR.KHOA</h5>
            <p class="card-text mt-2 text-start">
              Một trải nghiệm đầy tuyệt vời tại shop GreenStore quần áo gái rẻ
              hơn so với thị trường và chất liệu thì lại rất tốt tôi đánh giá
              5 sao... <a href="">See more</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Column 3 -->
      <div class="col-md-4 mt-4 px-4">
        <div class="card" style="border: none">
          <div class="card-body">
            <!-- Rating (5 stars) -->
            <div class="rating">
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
              <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt="" /></span>
            </div>
            <br />
            <h5 class="card-title mt-2 text-start">MR.LOC</h5>
            <p class="card-text mt-2 text-start">
              Một trải nghiệm đầy tuyệt vời tại shop GreenStore quần áo gái rẻ
              hơn so với thị trường và chất liệu thì lại rất tốt tôi đánh giá
              5 sao... <a href="">See more</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer bg-dark text-light mt-4">
    <div class="d-flex justify-content-evenly">
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
        <img src="img/fblg.png" alt="" width="30px" />
        <img src="img/inlg.png" alt="" width="30px" />
        <p>Thah toán</p>
        <img src="img/visa.png" alt="" width="30px" />
        <img src="img/momo.jpg" alt="" width="30px" />
      </div>
    </div>
  </footer>
  <!-- Bootstrap JS and Popper.js (for Bootstrap modal and other features) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>