<?php
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
