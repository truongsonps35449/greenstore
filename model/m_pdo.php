<?php

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function get_connection()
{
    $mysqli = new mysqli("localhost", "root", "", "webcaycanh");
    return $mysqli;
}
