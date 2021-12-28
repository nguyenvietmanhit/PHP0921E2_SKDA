<?php
//note_mvc.php
/**
 * + Mô hình MVC:
 * - Là kiến trúc phần mềm 3 lớp bao gồm M - Model, V - View, C - Controller
 * - Mô hình phổ biến trong hầu hết các website viết bằng PHP
 * - Framework Laravel, CMS Wordpress đều đc xây dựng dựa trên MVC
 * - MVC hơi khó tiếp cận với các beginner, vì viết hoàn toàn dựa trên OOP
 * - MVC tách biệt các thành phần để dễ quản lý hơn
 * + Thành phần trong MVC
 * + M - Model: lớp chịu trách nhiệm tương tác với CSDL
 * + V - View: lớp hiển thị giao diện tới user
 * + C - Controller: lớp trung gian giữa Model và View, xử lý logic và luân chuyển dữ liệu giữa Model và View
 * VD: chức năng Create sản phẩm:
 * + Model: code kết nối CSDL, code insert vào db
 * + View: form thêm mới
 * + Controller: code xử lý submit form
 * - Luồng xử lý dữ liệu trong mô hình MVC
 * - Cấu trúc thư mục code MVC:
 * + Tùy thuộc vào người viết code mà cấu trúc file/thư mục MVC sẽ khác nhau
 * - Demo ứng dụng CRUD sản phẩm sử dụng mô hình MVC qua các bước cơ bản
 * + Chuẩn bị CSDL và bảng: done
 * + Chuẩn bị giao diện: bỏ qua
 * + Tạo cấu trúc thư mục MVC:
 * mvc_demo /
 *          /assets: lưu tất cả file mà user có thể truy cập: css, js, image, font, webfont ...
 *                 /css
 *                     /style.css: file css chính
 *                 /js
 *                    /script.js: file js chính
 *                 /images:
 *          /configs: chứa các class cấu hình hệ thống: database, mail ...
 *                  /Database.php: class lưu cấu hình kết nối CSDL theo PDO
 *          /controllers: chứa các class controller - C
 *                      /ProductController.php: class controller xử lý CRUD sản phẩm
 *                      /Controller.php: class cha của tất cả controller, sử dụng cho kế thừa
 *          /models:  chứa các class model - M
 *                 /Product.php: class model xử lý truy vấn DB cho sản phẩm
 *                 /Model.php: class model cha của tất cả model, sử dụng cho kế thừa
 *          /views: chứa các file view - V
 *                /products: chứa tất cả file liên quan đến product
 *                         /create.php: thêm mới
 *                         /update.php: cập nhật
 *                         /index.php: danh sách
 *                         /detail.php: chi tiết
 *                /layouts: bố cục trang, xử lý layout động trong mô hình MVC
 *                        /main.php: file layout chính `
 *          .htaccess: rewrite url -> tạo đường dẫn thân thiện
 *          index.php: file index gốc của mô hình MVC, là nơi mọi request đến đầu tiên!
 */
