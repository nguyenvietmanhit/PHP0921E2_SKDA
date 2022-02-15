<?php
/**
 * Chức năng giỏ hàng của Web bán hàng
 * - Các cơ chế lưu giỏ hàng:
 * + session: ưu tiên dùng vì các dữ liệu của giỏ hàng thường là tạm thời
 * + cookie
 * + database
 * - Code: áp dụng Ajax (jQuery) khi thêm sản phẩm vào giỏ
 *
 * - Cách đẩy code từ local lên server thật sử dụng PHPStorm
 * Domain: php0921e2-1.itpsoft.com.vn
 * - Công	    php0921e2-1.itpsoft.com.vn
   FTP Username: PHP0921E2_nhom1
   FTP Password: 123456
   DB Username: PHP0921E2_nhom1
   DB Password: 123456
   - Hoàng	php0921e2-2.itpsoft.com.vn        nhóm 2
   - Linh	php0921e2-3.itpsoft.com.vn        nhóm 3
   - Quân	    php0921e2-4.itpsoft.com.vn      nhóm 4
 * - FileZilla
 * - Demo đẩy thư mục backend lên server, sử dụng PHPStorm để kết nối
 * -> Tools -> Deployments -> Configuration
 * - Sau khi két nối thành công, xem trực quan Server bằng:
 * Tools -> Deployments -> Browse Remote Host
 * - Upload code trực tiếp bằng cách chuột phải project -> Deployment
 * -> Upload to ...
 * - Truy cập PHPMyadmin trên server để xem thông tin DB tương ứng
 * -> Cần import db trên local lên server
 * - Cần sửa thông tin DB trên local sau đó đẩy lại lên server
 * - Xóa file index.html trên server, chuột phải -> Delete
 * - Url chạy sẽ là domain đc cập
 */