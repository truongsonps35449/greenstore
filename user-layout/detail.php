<?php
include '../model/xl_product.php';
session_start();
$query = explode('=', $_SERVER["QUERY_STRING"]);
$ctsanpham = getProductById($query[1])[0];
$sanphammoinhat = getSanPhamMoiNhat();
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
  <!-- main -->
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 d-flex justify-content-center">
        <div>
          <!-- Hình chính -->
          <img id="main-image" src="/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp']; ?>" alt="Hình Chính">
          <!-- Hình phụ -->
          <div class="mt-2 d-flex justify-content-center">
            <img class="thumbnail me-2 p-2 " src="/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp']; ?>" alt="Thumbnail 1" onclick="changeImage('/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp']; ?>')" />
            <img class="thumbnail me-2 p-2 " src="/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp_nho_1']; ?>" alt="Thumbnail 2" onclick="changeImage('/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp_nho_1']; ?>')">
            <img class="thumbnail me-2 p-2 " src="/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp_nho_2']; ?>" alt="Thumbnail 3" onclick="changeImage('/greenstore/upload/img/<?php echo $ctsanpham['Hinh_sp_nho_2']; ?>')">
          </div>
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-center">
        <div>
          <!-- Tên cây -->
          <h3>
            <?php echo $ctsanpham['Ten_sp']; ?>
          </h3>
          <!-- Rating (5 stars) -->
          <div class="rating mt-2">
            <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt=""></span>
            <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt=""></span>
            <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt=""></span>
            <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt=""></span>
            <span class="fa fa-star checked float-start me-2"><img src="img/star.png" width="25px" alt=""></span>
          </div><br>
          <p class="mt-2">
            loại cây: <strong><?php echo $ctsanpham['ten_dm']; ?></strong>
          </p>
          <div class="d-flex">
            <?php
            $giakm = number_format($ctsanpham['Gia_KM'], 0, '', ',');
            $gia = number_format($ctsanpham['Gia'], 0, '', ',');
            ?>
            <div class="text-dark mt-2 fs-3 me-2"><?php echo $giakm; ?>đ</div>
            <div class="text-dark mt-2 fs-3"><del><?php echo $gia; ?>đ</del></div>
          </div>
          <smal class="mt-2">Còn <strong><?php echo $ctsanpham['so_luong']; ?></strong> sản phẩm</small>
            <br>
            <!-- Số lượng và nút thêm/bớt sản phẩm -->
            <div class="mt-2">
              <button id="remove-from-cart" class="btn btn-secondary" onclick="updateQuantity(-1)">-</button>
              <span id="quantity">1</span>
              <button id="add-to-cart" class="btn btn-secondary" onclick="updateQuantity(1)">+</button>
            </div>
            <button class="btn btn-outline-dark btn-lg mt-2">Thêm giỏ hàng</button> <br>
            <button class="btn btn-outline-success btn-lg mt-2">Mua ngay</button>
        </div>
      </div>
      <h3 class="mt-2">Mô tả</h3>
      <p class="my-3 fs-5">
        <?php echo $ctsanpham['Mo_ta_ct']; ?>
      </p>
    </div>
    <!-- Vùng bình luận -->
    <div id="comments">
      <h2 class="mt-2">Bình Luận</h2>
      <div class=" my-3 py-2 border rounded-3" style="background-color: #F5F7F4;">
        <div class="ms-4">
          <strong>Phạm Huỳnh Khoa</strong>
          28/07/2023 <br>
          <i>Đã mua <strong>1 </strong>sản phẩm</i>
        </div>
        <div class="px-4 mx-4 mt-2">
          Thân, Tán, Lá: Cây dạng bụi to, thân tròn cao mập,
          có nhiều lóng ngắn, lá có bẹ dài ôm lấy thân cây,
          cuốn lá tròn, cuốn lá và bẹ đều màu đỏ tươi rất đẹp. ueu5uw
          rike674e6ẻu eu54ijruiejkede7i6ksw5m ertoimhnoisdrtoijrt 4t ertwer4y tw34b98q34b m
        </div>
      </div>
      <p> <strong>0</strong> bình luận</p>
      <!-- Thêm nội dung bình luận ở đây -->
      <form class="d-flex align-items-center mt-2" action="" method="post">
        <img class="flex-shrink-0" src="img/user.jpg" style="max-width: 50px;" alt="...">
        <input class="flex-grow-1 ms-1 border-0" style=" height: 50px;background-color: #F5F7F4;" type="text" placeholder="  Viết bình luận">
      </form>
    </div>
    <div class="row text-center">
      <h2 class="mt-4">Sản phẩm tương tự</h2>

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
  <script src="js/detail.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>