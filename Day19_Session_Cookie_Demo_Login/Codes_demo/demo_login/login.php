<?php
session_start();
// - Xử lý nếu tồn tại cookie username hoặc password thì là đăng nhập thành công
if (isset($_COOKIE['username']) || isset($_COOKIE['password'])) {
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    //Set session username để tránh chuyển hướng vô hạn
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: welcome.php');
    exit();
}

// - Xử lý case khi login r thì ko thể truy cập lại đc trang này nữa, chuyển hướng welcome.php
if (isset($_SESSION['username'])) {
  $_SESSION['success'] = 'Bạn đã đăng nhập rồi, ko thể truy cập lại login.php';
  header('Location: welcome.php');
  exit();
}

// demo_login/
//           /login.php: form đăng nhập
//           /welcome.php: hiển thị username sau khi đăng nhập thành công
//           /logout.php: đăng xuất
// XỬ LÝ SUBMIT FORM
// - Debug:
echo "<pre>";
print_r($_POST);
echo "</pre>";
// - Tạo biến lỗi (ko cần biến kết quả vì khi login thành công -> chuyển hướng sang trang khác)
$error = '';
// - Xử lý form chỉ khi user submit form:
if (isset($_POST['login'])) {
  // - Tạo biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  // - Validate form:
  // + Ko đc để trống 1 trong 2 trường: empty
  // + Username phải có định dạng email: filter_var
  // + Password >= 2 ký tự
  if (empty($username) || empty($password)) {
    $error = 'Ko đc để trống 1 trong 2 trường';
  } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $error = 'Username phải có định dạng email';
  } elseif (strlen($password) < 2) {
    $error = 'Password >= 2 ký tự';
  }
  // - Xử lý logic chính chỉ khi ko có lỗi nào xảy ra
  if (empty($error)) {
    // Giả lập đăng nhập thành công khi password = 123456
    if ($password == '123456') {
      // - Xử lý ghi nhớ đăng nhập chỉ khi đăng nhập thành công
      // Ghi nhớ đăng nhập/Remember me là chức năng cho phép ko cần đăng nhập lại khi thoát trình duyệt
      // -> dùng cookie để lưu lại username và password -> mã hóa -> demo bỏ qua
      // Chỉ khi có check Remember me thì mới lưu cookie
      if (isset($_POST['remember_me'])) {
        setcookie('username', $username, time() + 3600); //1 giờ
        setcookie('password', $password, time() + 3600); //1 giờ
      }

      // Đăng nhập thành công: ko còn ở lại trang login này nữa, mà chuyển hướng sang trang khác -> welcome.php
      // welcome.php cần hiển thị thông tin username lấy từ trang login này -> lưu username ntn ? session
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'Đăng nhập thành công';
      // Chuyển hướng , mang theo các session vừa tạo khi chuyển hướng
      header('Location: welcome.php');
      // Kết thúc header luôn dùng hàm exit để đảm bảo chuyển hướng ko lỗi trong 1 số case
      exit();
    } else {
      $error = 'Sai username/password';
    }
  }
}

?>
<?php
// Hiển thị session error theo cơ chế flash
if (isset($_SESSION['error'])) {
  echo "<h3 style='color: red'>{$_SESSION['error']}</h3>";
  unset($_SESSION['error']);
}

// Hiển thị session success theo cơ chế flash
if (isset($_SESSION['success'])) {
  echo "<h3 style='color: green'>{$_SESSION['success']}</h3>";
  unset($_SESSION['success']);
}

?>

<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
    Username:
    <input type="text" name="username" value=""/>
    <br/>
    Password:
    <input type="password" name="password"/>
    <br/>
    <!--  Nếu chỉ có 1 checkbox duy nhất thì name có thể ở dạng đơn đc  -->
    <input type="checkbox" name="remember_me" value="remember_me"/> Remember me
    <br/>
    <input type="submit" name="login" value="Login"/>
</form>
