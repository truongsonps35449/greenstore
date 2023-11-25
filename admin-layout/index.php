<?php
include '../controller/product.php';

if (isset($_GET['pg'])) {
    switch ($_GET['pg']) {
        case 'addProduct':
            $result = addProduct();
            if ($result === 1) {
                header('Location: http://localhost/greenstore/admin-layout/products.php');
            } else {
                echo "Bug";
            }
            break;

        case 'editProduct':
            $result = editProduct();
            if ($result === 1) {
                header('Location: http://localhost/greenstore/admin-layout/products.php');
            } else {
                echo "Bug";
            }
            break;

        default:
            # code...
            break;
    }
}
