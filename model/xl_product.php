<?php
include 'm_pdo.php';

function themSanPham($tensp, $gia, $gia_km, $hinhsp, $hinhspnho1, $hinhspnho2, $motangan, $motact, $madm, $sl)
{
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO 
        `san_pham`(`Ma_sp`, `Ten_sp`, `Gia`, `Gia_KM`, `Luot_xem`, `Hinh_sp`, `Hinh_sp_nho_1`, `Hinh_sp_nho_2`, `Ngay_nhap`, `Mo_ta_ngan`, `Mo_ta_ct`, `ma_dm`, `so_luong`, `Ghim`, `trang_thai`) 
        VALUES (null,'$tensp','$gia', '$gia_km', 0, '$hinhsp', '$hinhspnho1','$hinhspnho2', '$date', '$motangan','$motact', '$madm','$sl', null, 1)";
    $conn = get_connection();
    if ($conn) {
        $result = mysqli_query($conn, $query);
        if ($result) {
            return 1;
        }
        return 0;
    }
}

function suaSanPham($masp, $tensp, $gia, $gia_km, $hinhsp, $hinhspnho1, $hinhspnho2, $motangan, $motact, $madm, $sl)
{
    $query = "UPDATE `san_pham` 
    SET `Ten_sp`='$tensp',
    `Gia`='$gia',
    `Hinh_sp`='$hinhsp',
    `Hinh_sp_nho_1`='$hinhspnho1',
    `Hinh_sp_nho_2`='$hinhspnho2',
    `Mo_ta_ngan`='$motangan',
    `Mo_ta_ct`='$motact',
    `ma_dm`='$madm',
    `so_luong`='$sl',
    `Gia_KM`='$gia_km'
    WHERE `Ma_sp` = $masp";
    $conn = get_connection();
    if ($conn) {
        $result = mysqli_query($conn, $query);
        if ($result) {
            return 1;
        }
        return 0;
    }
}

function getSanPham()
{
    $query = "SELECT * FROM `san_pham`";
    $conn = get_connection();
    if ($conn) {
        $result = mysqli_query($conn, $query);
        $json_data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($json_data, $row);
        }
        return $json_data;
    }

    $conn->close();
}

function getProductById($id)
{
    $query = "SELECT * FROM `san_pham` WHERE `Ma_sp` = " . $id;
    $conn = get_connection();
    if ($conn) {
        $result = mysqli_query($conn, $query);
        $json_data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($json_data, $row);
        }
        return $json_data;
    }

    $conn->close();
}

function thayDoiTrangThaiSp($id, $trangthai)
{
    $query = "UPDATE `san_pham` 
    SET `trang_thai`= $trangthai
    WHERE `Ma_sp` = $id";
    $conn = get_connection();
    if ($conn) {
        $result = mysqli_query($conn, $query);
        if ($result) {
            return 1;
        }
        return 0;
    }
}
