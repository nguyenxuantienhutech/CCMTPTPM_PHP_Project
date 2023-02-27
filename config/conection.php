<?php 
// Thông tin cần thiết để kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
$username = "root"; // Tên đăng nhập
$password = ""; // Mật khẩu
$dbname = "webphp"; // Tên cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
echo "Kết nối đến cơ sở dữ liệu thành công!";

?>