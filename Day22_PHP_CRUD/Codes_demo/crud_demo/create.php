<?php
session_start();
require_once 'connection.php';
// crud_demo/create.php
// - XỬ LÝ FORM
// + Tạo biến chứa lỗi
$error = '';
// + Debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
// + Xử lý form chỉ khi user submit form
if (isset($_GET['submit'])) {
  // + Tạo biến trung gian
  $name = $_GET['name'];
  $price = $_GET['price'];
  $description = $_GET['description'];
  // + Validate form
  // - Tên và giá ko đc để trống: empty
  // - Giá phải là số: is_numeric
  if (empty($name) || empty($price)) {
    $error = 'Tên và giá ko đc để trống';
  } elseif (!is_numeric($price)) {
    $error = 'Giá phải là số';
  }
  // + Xử lý logic lưu vào CSDL chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    // Kết nối CSDL, thực hiện insert ...
    // + Sử dụng biến kết nối $connection từ file connection.php
    // + Thực hiện các bước để insert
    // Viết câu truy vấn: id, name, price, description, created_at trong products
    $sql_insert = "INSERT INTO products(name, price, description) VALUES('$name', $price, '$description')";
    // Thực thi truy vấn vừa tạo -> return boolean
    $is_insert = mysqli_query($connection, $sql_insert);
    if ($is_insert) {
        // Chuyển hướng về trang danh sách kèm 1 thông báo thêm thành công
        $_SESSION['success'] = "Thêm mới sản phẩm thành công";
        header("Location: index.php");
        exit();
    } else {
        $error = "Insert thất bại";
    }


  }

}

?>
<!-- + Hiển thị error ra form -->
<h3 style="color: red"><?php echo $error; ?></h3>
<form method="get" action="">
<!--  + Đổ dữ liệu đã nhập ra input   -->
  Nhập tên sp:
  <input type="text" name="name" value="" />
  <br />
  Nhập giá sp:
  <input type="text" name="price" value="" />
  <br />
  Nhập chi tiết sp:
  <textarea name="description"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu" />
  <input type="reset" name="reset" value="Reset form" />
</form>
