<?php
include '../model/xl_product.php';
$sanpham = getSanPham();
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
            <img src="../upload/img/logo.png" alt="" width="100px">
          </li>
          <li>
            <a href="index.html"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
          </li>
          <li>
            <a href="order.html"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản kí đơn
              hàng</a>
          </li>
          <li>
            <a href="caterogies.html"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh
              muc</a>
          </li>
          <li>
            <a href="products.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
          </li>
          <li>
            <a href="user.html"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
          </li>
        </ul>
      </nav>
      <div class="main-content">
        <h3 class="title-page">Sản phẩm</h3>
        <div class="d-flex justify-content-end">
          <a href="addProduct.php" class="btn btn-primary mb-2">Thêm sản phẩm</a>
        </div>
        <table id="example" class="table table-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Giá tiền</th>
              <th>Ngày nhập</th>
              <th>Lượt xem</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($sanpham as $s) {
              if ($s['so_luong'] > 0) {
                $trangthai = 'Còn hàng';
              } else {
                $trangthai = 'Hết hàng';
              }

              if (isset($s['trang_thai'])) {
                if ($s['trang_thai'] == 1) {
                  $mode = 0;
                } else {
                  $mode = 1;
                }
              }

              if (isset($s['trang_thai'])) {
                if ($s['trang_thai'] == 1) {
                  $trangthaihientai = "Ẩn";
                } else {
                  $trangthaihientai = "Hiện";
                }
              }
              echo '
              <tr>
                <td>' . $s['Ten_sp'] . '</td>
                <td>' . $s['Gia'] . '</td>
                <td>' . $s['Ngay_nhap'] . '</td>
                <td>' . $s['Luot_xem'] . '</td>
                <td>' . $trangthai . '</td>
                <td>
                  <a href="editProduct.php?ma_sp=' . $s['Ma_sp'] . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>'
                . '
                  <a href="index.php?pg=setStatus&id=' . $s['Ma_sp'] . '&trang_thai=' . $mode . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i>' . $trangthaihientai . '</a>'
                . '
                </td>
              </tr>';
            }
            ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <script src="assets/js/main.js"></script>
  <script>
    // new DataTable("#example");
  </script>
</body>

</html>