<?php
//demo_cookie.php
// Cookie trong PHP
// - Giống session: dùng để lưu thông tin có thể đc truy cập từ mọi nơi trên hệ thống
// - Khác session:
// + Đc lưu trên trình duyệt -> user biết đc 1 website lưu cookie nào vào trình duyệt
// + Ko mất đi khi đóng trình duyệt, phụ thuộc thời gian sống đc set tại thời điểm tạo bởi bạn
// + Chức năng dùng cookie: lưu thông tin cấu hình trang, lưu thông tin quảng cáo ...
// + PHP tạo 1 biến mảng $_COOKIE chứa tất cả cookie đang có trên hệ thống

// - Cách kiểm tra cookie trên trình duyệt

echo "demo_cookie.php";

// - Thao tác với cookie
// + Tạo cookie mới: ko đc dùng như thêm phần tử mảng
// $_COOKIE['name'] = 'nvmanh'; // sai
setcookie('name', 'nvmanh', time() + 300); //cookie tồn tại trong 300s = 5p
setcookie('test', 'test abc', time() + 10);

// + Lấy giá trị của cookie: giống session/mảng, chú ý case cookie ko tồn tại
echo isset($_COOKIE['test']) ? $_COOKIE['test'] : "";

// + Xóa cookie: ko đc dùng như xóa session/mảng, mà cần set thời gian sống là quá khứ
setcookie('name', '', time() - 1);

// - Debug cookie
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
