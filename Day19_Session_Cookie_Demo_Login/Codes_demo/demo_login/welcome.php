<?php
session_start();
// - Xử lý case user chưa login mà truy cập thẳng vào file này thì cần ko cho truy cập
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Bạn chưa đăng nhập nên ko thể truy cập welcome.php';
  header('Location: login.php');
  exit();
}
//welcome.php

//echo "<h1 style='color: green'>" . $_SESSION['success'] . "</h1>";
if (isset($_SESSION['success'])) {
  echo "<h1 style='color: green'>{$_SESSION['success']}</h1>";
  // Sau khi hiển thị xong thì xóa đi -> session dạng flash
  unset($_SESSION['success']);
}

echo "Chào bạn, <b>{$_SESSION['username']}</b>";
echo "<a href='logout.php'>Đăng xuất</a>";
// Debug
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
