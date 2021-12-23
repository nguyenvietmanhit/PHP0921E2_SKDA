<?php
session_start();
require_once 'connection.php';
//crud/create.php
//students:id,name,age,avatar,description,created_at
// XỬ LÝ FORM
// + Debug
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Tạo biến chữa lỗi:
$error = '';
// + Xử lý form chỉ khi user submit form:
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian:
  $name = $_POST['name'];
  $age = $_POST['age'];
  $description = $_POST['description'];
  $avatars = $_FILES['avatar']; //gán lại thành mảng 1 chiều
  // + Validate form:
  // Tên ko để trống
  // File upload phải là ảnh, dung lượng ko vượt quá 2MB
  if (empty($name)) {
    $error = "Tên ko để trống";
  } elseif ($avatars['error'] == 0) {
    // Đã tải file lên
    // + Validate file upload phải là ảnh:
    // Lấy đuôi file từ tên file
    $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
    // Convert về ký tự thường
    $extension = strtolower($extension);
    // Tạo mảng đuôi file ảnh
    $allowed = ['png', 'jpg', 'jpeg', 'gif'];
    if (!in_array($extension, $allowed)) {
      $error = 'Cần upload file ảnh';
    }
    // + Validate dung lượng file ko đc vượt quá 2Mb
    $size_b = $avatars['size']; //Byte
    // 1MB = 1024KB = 1024 * 1024 B
    $size_mb = $size_b / 1024 / 1024;
    $size_mb = round($size_mb, 2);
    if ($size_mb > 2) {
        $error = "Dung lượng file ko đc vượt quá 2Mb";
    }
  }

  // + Xử lý logic chính chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
      $avatar = '';
      // Xử lý upload file nếu có
      if ($avatars['error'] == 0) {
        $dir_upload = 'uploads';
        // Check nếu chưa tồn tại thư mục uploads thì mới tạo
        if (!file_exists($dir_upload)) {
            mkdir($dir_upload);
        }
        // Tạo tên file mang tính duy nhất
        $avatar = time() . "-" . $avatars['name'];
        // Upload file
        move_uploaded_file($avatars['tmp_name'], "$dir_upload/$avatar");
      }
      // Thêm vào CSDL
      // - Viết truy vấn theo cơ chế truyền param mà PDO hỗ trợ để tránh lỗi bảo mật SQLInjection:
      $sql_insert = "INSERT INTO students(name, age, avatar, description) VALUES(:name, :age, :avatar, :description)";
      // - Cbi obj truy vấn:
      $obj_insert = $connection->prepare($sql_insert);
      // - Tạo mảng để truyền giá trị thật vào param trong câu truy vấn nếu có:
      $inserts = [
        ':name' => $name,
        ':age' => $age,
        ':avatar' => $avatar,
        ':description' => $description
      ];
      // - Thực thi obj truy vấn, với INSERT UPDATE DELETE  return boolean, riêng SELECT return 1 obj nào đó
      $is_insert = $obj_insert->execute($inserts);
      var_dump($is_insert);
      // Code logic chuyển hướng sang trang danh sách nếu thêm thành công, ngược lại thì báo lỗi ở trang hiện tại
      // BTVN: xử lý CRUD còn lại theo PDO
  }
}
?>

<form action="" method="post" enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="name" />
  <br />
  Nhập tuổi:
  <input type="text" name="age" />
  <br />
  Upload avatar:
  <input type="file" name="avatar" />
  <br />
  Nhập mô tả:
  <textarea name="description"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>
