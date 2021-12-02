<?php
session_start();
//logout.php
// Xử lý chức năng đăng xuất: đăng nhập tạo ra session nào thì đăng xuất sẽ xóa đi tương ứng
unset($_SESSION['username']);
// Xóa cookie liên quan khi đăng nhập thành công
setcookie('username', '', time() - 1);
setcookie('password', '', time() - 1);

$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();
