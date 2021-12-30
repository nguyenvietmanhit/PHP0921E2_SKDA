<!--views/layouts/main.php-->

<!--
- Mô hình MVC luôn luôn sử dụng layout động để dựng bố cục trang: có các bố cục chung, chỉ thay
đổi phần nội dung động theo từng chức năng
- Nhúng file trong MVC luôn luôn cần đứng từ vị trí file index gốc của ứng dụng để nhúng file
- Để xây dựng layout động, cần xác định nội dung nào sẽ thay đổi động theo từng chức năng -> hiển thị bằng PHP
-?> sử dụng thuộc tính đã khai báo ở class controller cha
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?php echo $this->page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/script.js"></script>
  </head>

  <body>

    <div class="header">
        Đây là header
    </div>

    <div class="main">

        <?php
        // Hiển thị session flash -> xóa sau khi hiển thị
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['error'])) {
          echo $_SESSION['error'];
          unset($_SESSION['error']);
        }
        ?>

        <h3 style="color: red"><?php echo $this->error; ?></h3>

        <?php echo $this->content; ?>
    </div>

    <div class="footer">
        Đây là footer
    </div>

  </body>
</html>
