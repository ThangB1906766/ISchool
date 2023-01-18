<?php
/*
    Ngày 14/01/2023
    Thực hiện kết nối với csdl
    Note: $conn->connect_error Kiểu kết nối mysql hướng đối tượng
*/
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "lms_db";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed!!");
// } else {
//     echo "Connected!!";
}
?>