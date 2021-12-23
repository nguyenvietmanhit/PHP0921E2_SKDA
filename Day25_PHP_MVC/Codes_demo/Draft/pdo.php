<?php
//pdo.php
// KẾT NỐI PHP TỚI CSDL MYSQL SỬ DỤNG THƯ VIỆN PDO
// - MySQLi chỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL
// - PDO - PHP Data Object - là thư viện kết nối đc nhiều CSDL thông dụng hiện nay, code hoàn toàn theo OOP

// Các bước kết nối và demo CRUD với PDO:
// - Khởi tạo kết nối:
// DSN = Data Source Name, là chuỗi theo format bắt buộc của PDO
const DB_DSN = "mysql:host=localhost;dbname=php0921e2_crud;port=3306;charset=utf8";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

// Bắt lỗi ngoại lệ, là các lỗi mà ko lường trước được khi code chạy
// Try catch bắt buộc dùng khi khởi tạo kết nối sử dụng PDO
try {
  $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
} catch (Exception $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}

echo "<h2>Kết nối CSDL thành công</h2>";

// products: id, name, price. description, created_at, updated_at
// Chú ý: cần tận dụng tính năng chống lỗi bảo mật SQLInjection của PDO khi viết truy vấn!
// - INSERT
// B1: Tạo truy vấn: để chống lỗi bảo mật truyền giá trị kiểu param, chứ ko phải là giá trị thật khi viết truy vấn
// -> bind param
$sql_insert = "INSERT INTO products(name, price) VALUES (:name, :price)";
// B2: Chuẩn bị obj truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// B3: [Option] Truyền giá trị thật cho các param trong câu truy vấn nếu có
// Số phần tử mảng = số param truy vấn
$inserts = [
  ':name' => 'Điện thoại Samsung S7',
  ':price' => 1000
];
// B4: Thực thi obj truy vấn, với INSERT return true/false
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);

// - SELECT: select nhiều và 1 bản ghi
// + SELECT nhiều bản ghi:
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC"; // ko có param nào
// B2: Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: [Option] Truyền giá trị thật cho các param trong câu truy vấn nếu có -> bỏ qua vì truy vấn ko có param nào
// B4: Thực thi obj truy vấn, chú ý SELECT ko chưa trả về mảng kqua mong muốn tại bước này
$obj_select_all->execute();
// B5: Lấy mảng kết hợp 2 chiều: chú ý cú pháp truy cập hằng trong 1 class giống với PT/TT tĩnh
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
// + SELECT 1 bản ghi:
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id=:id";
// B2: Cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng truyền giá trị cho tham số trong câu truy vấn
$selects = [
  ':id' => 1
];
// B4: Thực thi, chú ý SELECT chưa trả về mảng dữ liệu mong muốn tại bước này
$obj_select_one->execute($selects);
// B5: Lấy mảng 1 chiều
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($product);
echo "</pre>";

// + UPDATE: cơ chế giống hệt INSERT
//B1:
$sql_update = "UPDATE products SET name=:name, price=:price WHERE id=:id";
//B2:
$obj_update = $connection->prepare($sql_update);
// B3:
$updates = [
  ':id' => 2,
  ':name' => 'New name',
  ':price' => 55555
];
// B4:
$is_update = $obj_update->execute($updates);
var_dump($is_update);

// + DELETE: cơ chế giống hệt INSERT UPDATE
//B1:
$sql_delete = "DELETE FROM products WHERE id > :id";
// B2:
$obj_delete = $connection->prepare($sql_delete);
// B3:
$deletes = [
  ':id' => 10
];
// B4:
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
