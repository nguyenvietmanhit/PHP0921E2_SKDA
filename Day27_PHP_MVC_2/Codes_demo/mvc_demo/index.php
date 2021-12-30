<?php
session_start();

// Set lại múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

//mvc_demo/index.php
// - Trong mô hình MVC ngoài đặc trừng là M V C, có 1 file có vai trò rất quan trọng là file index gốc
// của ứng dụng MVC - entry point
// - Tên file bắt buộc phải là index.php
// - Mọi request từ user gửi lên sẽ chạy vào file này đầu tiên!
// - Nhiệm vụ quan trọng nhất của file index gốc này là: phân tích url để gọi đúng controller
// xử lý
// - Mọi URL trong MVC đều phải tuân theo chuẩn mà ng định nghĩa ra mô hình MVC đó quy định
//, với mô hình MVC này thì url bắt buộc phải có format sau:
// index.php?controller=<tên-đối-tượng>&action=<tên-phương-thức-trong-controller>
// VD: index.php?controller=product&action=create   -> thêm mới sp
// index.php?controller=product&action=index   -> liệt kê sp
// index.php?controller=products&action=update&id=1   -> cập nhật sp có id = 1
// index.php?controller=product&action=delete&id=3    -> xóa sp có id = 3

// + Phân tích url để lấy ra controller và action:
// index.php?controller=product&action=create
// + Lấy controller, nếu ko tồn tại thì gán cho HomeController xử lý
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //product
// + Lấy action, nếu ko tồn tại thì gán cho 1 action mặc định
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create

// + Cần nhúng file controller tương ứng vào: product -> ProductController.php
$controller = ucwords($controller); //Product
$controller .= "Controller"; //ProductController
$controller_path = "controllers/$controller.php"; // controllers/ProductController.php

if (!file_exists($controller_path)) {
  die("Trang bạn tìm không tồn tại - 404");
}

require_once "$controller_path";

// + Khởi tạo đối tượng từ class bên trong controller
$obj = new $controller();

// + Gọi phương thức tương ứng để thực thi chức năng từ obj sinh ra -> tham số action từ url:
if (!method_exists($obj, $action)) {
  die("Phương thức $action ko tồn tại trong controller $controller");
}

$obj->$action();

