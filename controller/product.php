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
            if (isset($_FILES['image']['name'])) {
                $hinhsp = basename($_FILES['image']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            } else {
                echo "Image is required";
                $flag = 0;
            }
            if (isset($_FILES['smallImage1']['name'])) {
                $hinhsp1 = basename($_FILES['smallImage1']['name']);
                $path = __DIR__ . '/../upload/img';
                $target_file = $path . $hinhsp;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $flag = 1;
            } else {
                echo "Image is required";
                $flag = 0;
            }
            if (isset($_FILES['smallImage2']['name'])) {
                $hinhsp2 = basename($_FILES['smallImage2']['name']);
                $path = __DIR__ . '../user-layout/img';
                $target_file = $path . $hinhsp;
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
            // if (isset($_FILES['image']['name'])) {
            //     $hinhsp = basename($_FILES['image']['name']);
            //     $path = __DIR__ . '/../upload/img';
            //     $target_file = $path . $hinhsp;
            //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            //     $flag = 1;
            // } else {
            //     echo "Image is required";
            //     $flag = 0;
            // }
            // if (isset($_FILES['smallImage1']['name'])) {
            //     $hinhsp1 = basename($_FILES['smallImage1']['name']);
            //     $path = __DIR__ . '/../upload/img';
            //     $target_file = $path . $hinhsp;
            //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            //     $flag = 1;
            // } else {
            //     echo "Image is required";
            //     $flag = 0;
            // }
            // if (isset($_FILES['smallImage2']['name'])) {
            //     $hinhsp2 = basename($_FILES['smallImage2']['name']);
            //     $path = __DIR__ . '../user-layout/img';
            //     $target_file = $path . $hinhsp;
            //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            //     $flag = 1;
            // } else {
            //     echo "Image is required";
            //     $flag = 0;
            // }
            if (empty($_POST['detail'])) {
                echo "Detail is required";
                $flag = 0;
            } else {
                $detail = $_POST['detail'];
            }
            if ($flag == 1) {
                $result = suaSanPham($masp, $name, $price, $price_sale, $description, $detail, $category, $quantity);
                return $result;
            }
        }
    } else {
        return 0;
    }
}
