<!--index.php-->
<!--<h1>Hello abc</h1>-->

<?php
// Debug xem PHP có bắt đc data gửi lên từ ajax ? Có, dựa vào method từ ajax gửi lên
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
// - Lấy tất cả sp để trả về cho nơi gọi ajax
// + Kết nối CSDL:
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0921e2_crud';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}

echo "<h2>Kết nối CSDL thành công</h2>";
// + Truy vấn CSDL:
// Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// Thực thi truy vấn:
$obj_select_all = mysqli_query($connection, $sql_select_all);
// Lấy mảng kết hợp:
$products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
