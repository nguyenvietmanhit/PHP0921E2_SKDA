<!--list.php-->
<!--
1/Ajax là gì?
- Là 1 kỹ thuật dựa trên Javascript giúp tạo ra các ứng dụng ko đồng bộ: Single Page Application
- PHP là ngôn ngữ theo kiểu đồng bộ: Server side Application
- Không đồng bộ -> trang có hiệu suất tải nhanh -> trải nghiệm tốt cho user
- Đồng bộ -> trang tải lâu hơn
- Nên sử dụng Ajax với thư viện jQuery cho dễ thao tác hơn là dùng Ajax của Javascript thuần
- Cơ chế: Ajax gọi lên PHP thông qua url, PHP xử lý dữ liệu xong trả lại cho Ajax, Ajax hiển thị lên HTML
-->
<html>
<head>
    <title>Demo Ajax với PHP</title>
    <!--      Tích hợp jQuery-->
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
<h1>Demo ứng dụng Ajax sử dụng jQuery với PHP</h1>

<a href="#" id="a-click">Click để lấy hiển thị danh sách sản phẩm</a>

<div id="result">Sau khi click danh sách sp hiển thị tại đây</div>
<script>
    $(document).ready(function () {
        $('#a-click').click(function () {
            // Tạo 1 obj Javascript chuẩn bị cho gọi ajax
            var obj_ajax = {
              url: 'index.php', //url gọi tới file PHP
              method: 'get', //phương thức truyền dữ liệu lên PHP
              data: {  // obj chứa data sẽ gửi từ ajax lên PHP
                  name: 'abc',
                  age: 31
              },
              success: function(response) { // nơi nhận kết quả trả về từ PHP
                  console.log(response);
                  // Hiển thị kết quả trả về ra HTML
                  $('#result').html(response);
              }
            };
            $.ajax(obj_ajax);
            // Cách debug ajax -> Inspect HTML của trình duyệt -> Network
        })
    })
    // Nghỉ giải lao -> 20h25
</script>
</body>
</html>
