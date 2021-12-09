<?php
// php_connect_mysql.php
// Cách PHP kết nối tới CSDL MySQL
// - PHP và MySQL hoàn toàn độc lập với nhau
// - Để PHP và MySQL có thể tương tác đc -> dùng thư viện đc xây dựng sẵn để cho phép
// PHP kết nối tới MySQL
// - 2 thư viện thông dụng nhất: mysqli, pdo
// - Hiện tại sẽ demo mysqli trước, vì mysqli cung cấp các hàm PHP thuần (ngoài ra mysqli
//cũng có cú pháp của OOP), còn pdo chỉ dùng cú pháp OOP
// - mysqli chỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL, còn pdo hỗ trợ kết nối
// tới nhiều CSDL thông dụng -> thực tế ưu tiên dùng pdo
// - Cơ chế kết nối của mysqli và pdo là như nhau, chỉ khác về cú pháp triển khai
// - mysqli mặc định có sẵn trong PHP, tuy nhiên pdo chưa chắc -> xampp enable cả 2

// - Các bước kết nối từ PHP tới MySQL sử dụng mysqli
// + Khởi tạo kết nối
// Máy chủ chứa CSDL sẽ kết nối
const DB_HOST = 'localhost';
// Username login vào CSDL -> có sẵn sau khi cài XAMPP
const DB_USERNAME = 'root';
// Password login vào CSDL -> có sẵn sau khi cài XAMPP
const DB_PASSWORD = '';
// Tên CSDL sẽ thao tác
const DB_NAME = 'php0921e2_demo'; # id, name, description, created_at
// Cổng kết nối tới CSDL MySQL, mặc định là 3306
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}

echo "Kết nối CSDL thành công";

// - INSERT: thêm dữ liệu vào CSDL
// Tạo câu truy vấn SQL để insert:
$sql_insert = "INSERT INTO categories(name, description) VALUES('Thể thao', 'Mô tả cho thể thao')";
// Cách debug: chạy trực tiếp câu truy vấn trong tab SQL của trình duyệt để xem lỗi
// Thực thi câu truy vấn:, kết quả trả về với truy vấn INSERT là boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);

// - SELECT: lấy dữ liệu, có 2 dạng lấy dữ liệu
// + Lấy 1 bản ghi duy nhất, vd: lấy bản ghi có id = 1
// Viết câu truy vấn
$sql_select_one = "SELECT * FROM categories WHERE id = 1";
// Thực thi truy vấn, tuy nhiên kết quả trả về ko còn là boolean như INSERT mà là 1 đối tượng trung gian nào đó
$result_one = mysqli_query($connection, $sql_select_one);
echo "<pre>";
print_r($result_one);
echo "</pre>";
// Lấy dữ liệu dưới mảng kết hợp 1 chiều
$category = mysqli_fetch_assoc($result_one);
echo "<pre>";
print_r($category);
echo "</pre>";
echo "Tên danh mục: {$category['name']}";
// + Lấy nhiều bản ghi, vd: lấy tất cả bản ghi đang có
// Viết câu truy vấn:
$sql_select_all = "SELECT * FROM categories ORDER BY id DESC";
// Thực thi truy vấn -> trả về 1 obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// Lấy dữ liệu dưới dạng mảng kết hợp 2 chiều nhiều phần tử
$categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC); //phải có hằng số này thì mới trả về mảng kết hợp đc
echo "<pre>";
print_r($categories);
echo "</pre>";
foreach ($categories AS $category) {
  echo "<br /> Tên danh mục: {$category['name']}";
}

// - UPDATE: cập nhật bản ghi, luôn kèm điều kiện khi update
// VD: cập nhật name = name new, description = des new với các bản ghi có id < 4
// + Tạo câu truy vấn:
$sql_update = "UPDATE categories SET name='name new', description='des new' WHERE id < 4";
// + Thực thi truy vấn: giống INSERT trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);

// - DELETE: xóa bản ghi, luôn phải kèm điều kiên
// vd: xóa bản ghi có id > 10
// + Tạo câu truy vấn:
$sql_delete = "DELETE FROM categories WHERE id > 10";
// + Thực thi truy vấn, giống INSERT UPDATE -> boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
