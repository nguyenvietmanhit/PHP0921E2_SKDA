<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// echo date('d-m-Y H:i:s');
//backend/index.php
// File index gốc của ứng dụng
// URL MVC: index.php?controller=product&action=create
// - Lấy tham số từ url
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //product
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create
// - Chuyển đổi controller thành tên file controller tương ứng: product -> ProductController
$controller = ucfirst($controller); //Product
$controller .= "Controller"; //ProductController
// - Nhúng file controller nếu tồn tại:
$controller_path = "controllers/$controller.php"; //controllers/ProductController.php
if (!file_exists($controller_path)) {
  die("Trang bạn tìm ko tồn tại");
}
require_once "$controller_path";
// - Khởi tạo đối tượng từ class controller vừa nhúng
$obj = new $controller(); //$obj = new ProductController();
// - Dùng obj trên truy cập phương thức $action của controller nếu tồn tại phương thức đó
if (!method_exists($obj, $action)) {
  die("Phương thức $action ko tồn tại trong class $controller");
}
$obj->$action();

