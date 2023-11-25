<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra user-view
include_once 'user-view/header.php';
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home': //trang chủ
            //xữ lý dữ liệu


            //hiển thị dữ liệu
            include_once 'user-view/banner.php';
            include_once 'user-view/page.php';
            break;
        case 'dashboard': // 

        default:
            # code...
            break;
    }
    include_once 'user-view/footer.php';
}
