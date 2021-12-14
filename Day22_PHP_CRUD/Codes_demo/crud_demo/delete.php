<?php
session_start();
//File delete.php
require_once "connection.php";
// delete.php?id=3
// - Validate tham số id từ url, giống update
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = 'Tham số Id ko hợp lệ';
  header('Location: index.php');
  exit();
}

$id = $_GET['id'];
// - Truy vấn CSDL để xóa bản ghi theo id
// + Tạo truy vấn xóa:
$sql_delete = "DELETE FROM products WHERE id=$id";
// + Thực thi truy vấn: return boolean
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
  $_SESSION['success'] = "Xóa sản phẩm có id = $id thành công";
} else {
  $_SESSION['error'] = "Xóa sản phẩm có id = $id thất bại";
}

header("Location: index.php");
exit();
