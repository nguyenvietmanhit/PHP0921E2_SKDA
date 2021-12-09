<?php
//connection.php
// Kết nối CSDL MySQL sử dụng mysqli, tạo ra biến kết nối dùng chung cho 4 chức năng CRUD
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0921e2_crud';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}
// Biến $connection ddc nhúng vào các file CRUD để sử dụng
echo "Kết nối CSDL thành công";
