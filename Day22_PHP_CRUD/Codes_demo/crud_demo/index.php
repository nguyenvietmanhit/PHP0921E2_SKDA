<?php
session_start();
require_once "connection.php";
/**
 * crud_demo/index.php
 * - Demo về ứng dụng CRUD - Create - Read/List - Update - Delete 1 sản phẩm
 * - Tạo cấu trúc file như sau:
 * crud_demo /
 *           /index.php: chức năng R - Read/List - trang liệt kê sản phẩm
 *           /create.php: C - Create - trang thêm mới sp
 *           /update.php: U - Update - trang sửa sp
 *           /delete.php: D - Delete - trang xóa sp
 *           /connection.php: tạo biến kết nối CSDL dùng chung cho 4 chức năng trên
 * - Tạo CSDL php0921e2_crud
CREATE DATABASE IF NOT EXISTS php0921e2_crud
CHARACTER SET utf8
COLLATE utf8_general_ci;
 * - Tạo bảng products: id, name, price, description, created_at
 * #Tạo bảng products: id, name, price, description, created_at
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
price INT(11) DEFAULT 0,
description TEXT DEFAULT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
 *
 */
// - Truy vấn CSDL lấy tất cả sản phẩm đang có
// + Viết câu truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// + Thực thi truy vấn: return về obj trung gian
$obj_select_all = mysqli_query($connection, $sql_select_all);
// + Lấy mảng kết hợp
$products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";


?>

<?php
// Hiển thị session message nếu có r xóa đi
if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];
  unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}
?>
<a href="create.php">Thêm mới sản phẩm</a>
<br />
<h2>Danh sách sản phẩm</h2>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Created_at</th>
    <th></th>
  </tr>

  <?php foreach ($products AS $product): ?>
    <tr>
      <td><?php echo $product['id']; ?></td>
      <td><?php echo $product['name']; ?></td>
      <td><?php echo number_format($product['price'], 0, '.', '.') ?></td>
      <td><?php echo $product['description']; ?></td>
      <td>
<!--        14/12/2021 19:25:50-->
        <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
      </td>
      <td>
        <a href="update.php?id=<?php echo $product['id']; ?>">Update</a>
        <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure delete?')" >Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>

</table>
