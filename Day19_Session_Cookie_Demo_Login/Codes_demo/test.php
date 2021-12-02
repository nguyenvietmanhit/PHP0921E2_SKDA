<?php
session_start(); // Bắt buộc phải khai báo hàm này khi có thao tác với session
//test.php: làm cách nào để sử dụng đc biến $name ở file demo_session.php?
// -> nhúng file
// ->  1 hệ thống web có hàng nghìn file
// -> lưu thông tin dạng session/cookie
//require_once 'demo_session.php';
//echo $name;
// - Hiển thị session: giống hệt lấy giá trị phần tử mảng
// echo $_SESSION['address']; // Hà Nội?
// - Demo trường hợp thao tác với session ko tồn tại khi tắt trình duyệt hoặc truy cập file này
//bằng trình duyệt ẩn
// -> cần kiểm soát session đến từ đâu, có chắc chắn tồn tại hay ko
echo isset($_SESSION['address']) ? $_SESSION['address'] : '';

