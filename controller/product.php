<?php
include '../model/xl_product.php';

function addProduct()
{
    $flag = 1;
    $conn = get_connection();
    if (isset($conn)) {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (empty($_POST['name'])) {
                echo "Name is required";
                $flag = 0;
            } else {
                $name = $_POST['name'];
            }
            if (empty($_POST['category'])) {
                echo "Category is required";
                $flag = 0;
            } else {
                $category = $_POST['category'];
            }
            if (empty($_POST['price'])) {
                echo "Price is required";
                $flag = 0;
            } else {
                $price = $_POST['price'];
            }
            if (empty($_POST['price_sale'])) {
                echo "Price Sale is required";
                $flag = 0;
            } else {
                $price_sale = $_POST['price_sale'];
            }
            if (empty($_POST['description'])) {
                echo "Description is required";
                $flag = 0;
            } else {
                $description = $_POST['description'];
            }
            if (empty($_POST['quantity'])) {
                echo "Quantity is required";
                $flag = 0;
            } else {
                $quantity = $_POST['quantity'];
            }
            if (isset($_FILES['image']) && !empty($_FILES['smallImage1']['name'])) {
                $hinhsp = basename($_FILES['image']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            } else {
                echo "Image is required";
                $flag = 0;
            }
            if (isset($_FILES['smallImage1']) && !empty($_FILES['smallImage1']['name'])) {
                $hinhsp1 = basename($_FILES['smallImage1']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp1;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            } else {
                echo "Image is required";
                $flag = 0;
            }
            if (isset($_FILES['smallImage2']) && !empty($_FILES['smallImage2']['name'])) {
                $hinhsp2 = basename($_FILES['smallImage2']['name']);
                $path = __DIR__ . '../user-layout/img';
                $target_file = $path . $hinhsp2;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            } else {
                echo "Image is required";
                $flag = 0;
            }
            if (empty($_POST['detail'])) {
                echo "Detail is required";
                $flag = 0;
            } else {
                $detail = $_POST['detail'];
            }
            if ($flag == 1) {
                $result = themSanPham($name, $price, $price_sale, $hinhsp, $hinhsp1, $hinhsp2, $description, $detail, $category, $quantity);
                return $result;
            }
        }
    } else {
        return 0;
    }
}

function editProduct()
{
    $flag = 1;
    $conn = get_connection();
    if (isset($conn)) {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (empty($_POST['productId'])) {
                echo "Id is required";
                $flag = 0;
            } else {
                $id = $_POST['productId'];
            }
            if (empty($_POST['name'])) {
                echo "Name is required";
                $flag = 0;
            } else {
                $name = $_POST['name'];
            }
            if (empty($_POST['category'])) {
                echo "Category is required";
                $flag = 0;
            } else {
                $category = $_POST['category'];
            }
            if (empty($_POST['price'])) {
                echo "Price is required";
                $flag = 0;
            } else {
                $price = $_POST['price'];
            }
            if (empty($_POST['price_sale'])) {
                echo "Price Sale is required";
                $flag = 0;
            } else {
                $price_sale = $_POST['price_sale'];
            }
            if (empty($_POST['description'])) {
                echo "Description is required";
                $flag = 0;
            } else {
                $description = $_POST['description'];
            }
            if (empty($_POST['quantity'])) {
                echo "Quantity is required";
                $flag = 0;
            } else {
                $quantity = $_POST['quantity'];
            }
            if (isset($_FILES['image'])) {
                $hinhsp = basename($_FILES['image']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            }
            if (isset($_FILES['smallImage1'])) {
                $hinhsp1 = basename($_FILES['smallImage1']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp1;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            }
            if (isset($_FILES['smallImage2'])) {
                $hinhsp2 = basename($_FILES['smallImage2']['name']);
                $path = __DIR__ . '../user-layout/img';
                $target_file = $path . $hinhsp2;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            }
            if (empty($_POST['detail'])) {
                echo "Detail is required";
                $flag = 0;
            } else {
                $detail = $_POST['detail'];
            }
            if ($flag == 1) {
                if ($hinhsp != null) {
                    $image = $hinhsp;
                } else {
                    $image = $_POST['oldImage'];
                }
                if ($hinhsp1) {
                    $smallImage1 = $hinhsp1;
                } else {
                    $smallImage1 = $_POST['oldSmallImage1'];
                }
                if ($hinhsp2) {
                    $smallImage2 = $hinhsp2;
                } else {
                    $smallImage2 = $_POST['oldSmallImage2'];
                }
                $result = suaSanPham($id, $name, $price, $price_sale, $image, $smallImage1, $smallImage2, $description, $detail, $category, $quantity);
                return $result;
            }
        }
    } else {
        return 0;
    }
}

function thayDoiTrangThai($id, $trangthai)
{
    $conn = get_connection();
    if (isset($conn)) {
        $result = thayDoiTrangThaiSp($id, $trangthai);
        return $result;
    }
    return 0;
}
