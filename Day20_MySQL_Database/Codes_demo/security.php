<?php
//security.php
// - Giới thiệu 2 lỗi bảo mật chính trong form
// + XSS
// Cross-site scripting: là cách tấn công sử dụng code Javascript -> lấy thông tin của user từ
//trình duyệt hoặc thực hiện các hành vi phá hoại hệ thống , xảy ra trong form
if (isset($_GET['submit'])) {
  $fullname = $_GET['fullname'];
  // Để fix XSS thì trước khi hiển thị ra cần phải cho dữ liệu chạy qua hàm sau:
  // Hàm này chuyển các ký tự HTML đặc biệt thành ký tự an toàn để hiển thị
  // -> Thực tế luôn luôn cần hàm này trc khi hiển thị -> demo bỏ qua
  $fullname = htmlspecialchars($fullname);
  echo $fullname;
  //   <script>alert("hello")</script> => chạy code JS -> XSS
}

// + CSRF - Cross-site request forgery: tấn công hệ thống bằng cách giả mạo người dùng hiện
// tại
// VD: Website có chức năng Xóa user theo link dạng: delete.php?uid=1
// Bạn là admin của hệ thống thì có quyền Xóa user
// Cách tấn công CSRF: kẻ tấn công biết link xóa user đó, lừa để bạn click vào link này
//mà ko hề hay biết -> qua email
// -> Cách phòng chống: sử dụng token: mỗi khi 1 user login thành công -> tạo 1 session có tính
//duy nhất trên hệ thống, gắn với người dùng đó, trong form tạo 1 input ẩn có giá trị bằng
//chính session này. Mỗi lần submit so sánh 2 giá trị này
// -> Sử dụng cơ chế RESFUL API để quy định chặt chẽ các chức năng nào thì phải dùng phương
//thức nào
?>

<form method="get" action="">
  Nhập tên của bạn:
  <input type="text" name="fullname" />
  <input type="submit" name="submit" value="Hiển thị tên" />
</form>


