<?php
session_start(); // Cứ có thao tác với session thì bắt buộc phải khai báo hàm này
//demo_session.php
// Session trong PHP
// - Là 1 dạng lưu trữ thông tin giống như biến, khác biến ở đặc điểm: thông tin lưu bằng session/cookie
// có thể đc truy cập từ mọi nơi trên hệ thống
$name = 'manhnv';
echo $name; //manhnv
// Tạo 1 file test.php, cùng cấp
// - Session là 1 phiên làm việc, có thời gian bắt đầu và thời gian kết thúc phiên
//Session kết thúc khi xóa nó hoặc đóng trình duyệt
// - Chức năng dùng session: đăng nhập, giỏ hàng ...
// - PHP tạo sẵn 1 biến mảng $_SESSION lưu tất cả session đang có trên hệ thống
// - Session đc lưu trên server, nên user sẽ ko thể biết đc
// + VD: tạo 1 session lưu địa chỉ, giống hệt thêm thủ công phần tử vào mảng
$_SESSION['address'] = 'Hà Nội';
$_SESSION['fullname'] = 'nvmanh';
// + Xóa session: giống hệt xóa phần tử mảng:
unset($_SESSION['fullname']);
// + Xóa tất cả session đang có trên hệ thống: ko nên dùng hàm này vì ko kiểm soát các session
//đang bị xóa có đang đc dùng ở đâu ko
// session_destroy();

// + Debug session
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

