<?php
/*
 * Các step dựng website từ đầu:
 * B1: Chuẩn bị giao diện tĩnh HTML CSS JS cho cả 2 backend và frontend
 * B2: Xác định các chức năng mà web có thể có dựa vào chủ đề website, vd với web bán hàng:
 * + Giỏ hàng
 * + Bình luận sp: dùng bl của Facebook hoặc tự dựng chức năng bl
 * Bảng comments: id, user_id, content, comment_date ...
 * + Feedback sản phẩm: sau khi mua sp sẽ cho phép user đã đăng nhập mới đc đánh giá sp
 * Bảng feedbacks: id, user_id, product_id, content, feedback_date ...
 * + Danh sách sp yêu thích: chứa các sp khi click vào icon trái tim, có thể lưu bằng
 * cookie hoặc database
 * + Danh sách sản phẩm theo các tiêu chí: mới nhất, bán chạy nhất ...
 * + Thanh toán:
 * + Mã giảm giá: hệ thống sẽ tạo ra các mã giảm giá để cho user áp dụng vào các đơn hàng của họ
 * Bảng discounts: id, code, price_discount, expired_at, max_use ...
 * + Tích điểm khi mua hàng: mỗi khi đặt hàng thành công sẽ đc cộng điểm theo giá, điểm đc tích lũy
 * có tác dụng như 1 mã giảm giá hoặc trở thành KH vip
 * + Trang chủ, trang chi tiết, liên hệ ...
 * -> trải nghiệm các chức năng trên website thực tế để có hình dung tốt hơn
 * B3: Phân tích CSDL từ giao diện tĩnh: đi toàn bộ các trang HTML, check giao diện đi từ trên xuống
 * , nếu nội dung xác định luôn thay đổi -> tạo bảng, còn nếu nội dung ít khi thay đổi thì để tĩnh:
 * + Bảng menus: id, name, link, status, created_at, updated_at
 * + Bảng products: id, category_id, status, created_at, updated_at, name, price, amount, content, avatar ...
 * + Bảng categories: id, status, created_at, updated_at, name, description ...
 * B4: Tạo CSDL php0921e2_mvc: dựa vào file mẫu file_create_db.html hoặc import file mvc_project.sql
 * B5: Tạo khung MVC cho ứng dụng, thư mục gốc là mvc_demo:
 * backend/
 *        /assets/
 *               /css
 *               /js
 *               /images
 *               /fonts
 *        configs/
 *               /Database.php
 *        controllers/
 *                   /Controller.php
 *                   /ProductController.php
 *        models/
 *              /Model.php
 *              /Product.php
 *        views/
 *             /products/
 *                      /index.php
 *                      /create.php
 *                      /update.php
 *             /layouts/
 *                     /main.php
 *        .htaccess
 *        index.php
 * frontend: cấu trúc tương tự backend
 *
 * B6: CODE!!!
 */
