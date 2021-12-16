<?php
session_start();
require_once 'connection.php';
//update.php
// - Check nếu như ko tồn tại tham số id hoặc tồn tại nhưng giá trị ko phải số -> báo lỗi, ko cho truy cập
// false -> update.php, update.php?id=dsadsad
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = 'Tham số Id ko hợp lệ';
  header('Location: index.php');
  exit();
}

// - Lấy id từ url: update.php?id=3
$id = $_GET['id']; //3

// - Đổ dữ liệu của sp tương ứng ra form -> cần truy vấn CSDL
// + Viết truy vấn lấy 1 bản ghi:
$sql_select_one = "SELECT * FROM products WHERE id = $id";
// + Thực thi truy vấn: return obj trung gian
$obj_select_one = mysqli_query($connection, $sql_select_one);
// + Lấy mảng 1 chiều kết hợp
$product = mysqli_fetch_assoc($obj_select_one);
//echo "<pre>";
//print_r($product);
//echo "</pre>";

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
  // + Xử lý logic cập nhật bản ghi vào CSDL chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    // + Truy vấn CSDL để cập nhật bản ghi theo id
    // Tạo câu truy vấn:
//    $updated_at = date('Y-m-d H:i:s'); //lấy ra thời gian hiện tại theo format của kiểu DATETIME/TIMESTAMP
    // Sinh tự động trường ngày cập nhật cuối cùng này, thay vì phải tính thủ công như trên
    $sql_update = "UPDATE products SET name='$name', price=$price, description='$description' WHERE id=$id";
    // Thực thi truy vấn: return boolean
    $is_update = mysqli_query($connection, $sql_update);
    if ($is_update) {
      $_SESSION['success'] = "Update bản ghi có id = $id thành công";
      header("Location: index.php");
      exit();
    } else {
      $error = 'Update thất bại';
    }
  }

}
// Bảng users: id, username, password

?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3>Sửa sản phẩm với id = #<?php echo $id; ?></h3>
<form method="get" action="">
<!-- Tạo 1 input ẩn, có name = id để ko bị chạy vào logic ko tồn tại tham số id khi submit form -->
  <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
  Tên sp:
  <input type="text" name="name" value="<?php echo $product['name']; ?>" />
  <br />
  Giá sp:
  <input type="text" name="price" value="<?php echo $product['price']; ?>" />
  <br />
  Chi tiết sp:
  <textarea name="description"><?php echo $product['description']; ?></textarea>
  <br />
  <input type="submit" name="submit" value="Cập nhật" />
  <input type="reset" name="reset" value="Reset form" />
</form>

