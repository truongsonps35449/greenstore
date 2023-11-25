<?php
include '../controller/product.php';
include '../model/xl_category.php';
session_start();

$danhmuc = getDanhMuc();
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
        <h3 class="title-page">Thêm sản phẩm</h3>

        <form class="addPro" action="index.php?pg=addProduct" method="POST" enctype="multipart/form-data">
          <div class="form-group"></div>
          <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sả phẩm" />
          </div>
          <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="category" aria-label="Default select example">
              <option selected>Chọn danh mục</option>
              <?php
              foreach ($danhmuc as $v) {
                echo '<option value="' . $v['ma_dm'] . '">' . $v['ten_dm'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc" />
            </div>
          </div>
          <div class="form-group">
            <label for="price_sale">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" name="price_sale" id="price_sale" class="form-control" placeholder="Giá khuyến mãi" />
            </div>
          </div>
          <div class="form-group">
            <label>Số lượng</label>
            <input class="form-control" type="text" name="quantity" rows="3" placeholder="Nhập số lượng" />
          </div>
          <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px"></textarea>
          </div>
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile" />
          </div>
          <div class="custom-file">
            <input type="file" name="smallImage1" class="custom-file-input" id="exampleInputFile2" />
          </div>
          <div class="custom-file">
            <input type="file" name="smallImage2" class="custom-file-input" id="exampleInputFile3" />
          </div>
          <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea class="form-control" name="detail" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>

  </script>
</body>

</html>