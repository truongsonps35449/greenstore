<?php
include '../controller/product.php';

if (isset($_GET['pg'])) {
    switch ($_GET['pg']) {
        case 'addProduct': {
                $result = addProduct();
                if ($result === 1) {
                    header('Location: http://localhost/greenstore/admin-layout/products.php');
                } else {
                    echo "Bug";
                }
                break;
            }

        case 'editProduct': {
                $result = editProduct();
                if ($result === 1) {
                    header('Location: http://localhost/greenstore/admin-layout/products.php');
                } else {
                    echo "Bug";
                }
                break;
            }

        case 'setStatus': {
                $id = $_GET['id'];
                $trangthai = $_GET['trang_thai'];
                $result = thayDoiTrangThai($id, $trangthai);
                if ($result === 1) {
                    header('Location: http://localhost/greenstore/admin-layout/products.php');
                } else {
                    echo "Bug";
                }
                break;
            }

        default:
            # code...
            break;
    }
}
