<?php
include 'm_pdo.php';
function dangnhap($tentk, $mk)
{
    $query = "SELECT * FROM `tai_khoan` WHERE `ten_tk` = '$tentk' AND `mat_khau` = '$mk'";
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

function getAllUsers()
{
    $query = "SELECT * FROM `tai_khoan`";
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
