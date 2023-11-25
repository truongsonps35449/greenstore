<?php
// include 'm_pdo.php';

function getDanhMuc()
{
    $query = "SELECT * FROM `danh_muc`";
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
