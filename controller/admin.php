<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra user-view
include_once 'admin-view/menu.php';
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'dashboards': //trang chủ
            //xữ lý dữ liệu
           
         
            //hiển thị dữ liệu
            include_once 'admin-view/dashboards.php';
            break;
        case 'order': //trang chủ
            //xữ lý dữ liệu
            
            
            //hiển thị dữ liệu
            include_once 'admin-view/order.php';
            break;   
        case 'caterogies': //trang chủ
            //xữ lý dữ liệu
            
            
            //hiển thị dữ liệu
            include_once 'admin-view/caterogies.php';
            break;   
        case 'products': //trang chủ
            //xữ lý dữ liệu
            
            
            //hiển thị dữ liệu
            include_once 'admin-view/products.php';
            break;   
        case 'account': //trang chủ
            //xữ lý dữ liệu
            
            
            //hiển thị dữ liệu
            include_once 'admin-view/account.php';
            break;
        default:
            # code...
            break;
    }
}
?>