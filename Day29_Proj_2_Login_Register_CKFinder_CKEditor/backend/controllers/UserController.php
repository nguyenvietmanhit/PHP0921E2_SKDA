<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
  //index.php?controller=user&action=register
  public function register() {
    // - Xử lý submit form
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      // Validate
      if (empty($username) || empty($password)) {
        $this->error = "Phải nhập username hoặc password";
      } elseif ($password != $password_confirm) {
        $this->error = "Password nhập lại chưa đúng";
      }
      // Đăng ký user
      if (empty($this->error)) {
        $user_model = new User();
        // - Cần check trùng username, ko cho phép đăng ký username đã tồn tại trong CSDL
        // SELECT * FROM users WHERE username = '$username';
        $user = $user_model->getUserByUsername($username);
        if (!empty($user)) {
         $_SESSION['error'] = "Username $username đã tồn tại, ko thể đăng ký";
         header("Location: index.php?controller=user&action=register");
         exit();
        }

        // - Luôn luôn cần mã hóa mật khẩu trước khi lưu vào CSDL, 1 số thuật toán như md5, bcrypt, sha ...
        $password = password_hash($password, PASSWORD_BCRYPT);
        $is_insert = $user_model->registerUser($username, $password);
//        var_dump($is_insert);
        if ($is_insert) {
          $_SESSION['success'] = "Đăng ký thành công";
          header("Location: index.php?controller=user&action=login");
          exit();
        }
        $this->error = "Đăng ký thất bại";
      }

    }

    $this->page_title = "Đăng ký user";
    // - Gọi view để hiển thị form đăng ký
    $this->content = $this->render('views/users/register.php');
    // Không ko dùng layout này cho đăng ký, tạo 1 layout khác
    require_once 'views/layouts/main_login.php';
//    require_once 'views/layouts/main.php';
  }

  public function login() {
    // - Xử lý submit form
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      // - Validate
      // - Xử lý login
      if (empty($this->error)) {
        // Lấy ra mật khẩu đã mã hóa trong CSDL tương ứng với username đang đăng nhập
        $user_model = new User();
        $user = $user_model->getUserByUsername($username);
        if (empty($user)) {
          $this->error = "Username $username ko tồn tại";
        } else {
          // Lấy ra mật khẩu đã mã hóa
          $password_hash = $user['password'];
          // So sánh mật khẩu đã mã hóa với mật khẩu nhập từ form theo cơ chế PHP cung cấp sẵn
          $is_login = password_verify($password, $password_hash);
//          var_dump($is_login);
          if ($is_login) {
            $_SESSION['success'] = "Đăng nhập thành công";
            // Tạo session để lưu lại thông tin của user hiện tại
            $_SESSION['user'] = $user;
            header("Location: index.php?controller=product&action=index");
            exit();
          }
          $this->error = "Sai tài khoản hoặc mật khẩu";
        }

      }
    }

    // - Gọi view
    $this->page_title = "Form đăng nhập";
    $this->content = $this->render('views/users/login.php');
    require_once 'views/layouts/main_login.php';
  }

  public function logout() {
    unset($_SESSION['user']);
    $_SESSION['success'] = "Đăng xuất thành công";
    header("Location: index.php?controller=user&action=login");
    exit();
  }
}
