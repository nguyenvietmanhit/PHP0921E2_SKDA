<?php
/**
 * crud_demo/index.php
 * - Demo về ứng dụng CRUD - Create - Read/List - Update - Delete 1 sản phẩm
 * - Tạo cấu trúc file như sau:
 * crud_demo /
 *           /index.php: chức năng R - Read/List - trang liệt kê sản phẩm
 *           /create.php: C - Create - trang thêm mới sp
 *           /update.php: U - Update - trang sửa sp
 *           /delete.php: D - Delete - trang xóa sp
 *           /connection.php: tạo biến kết nối CSDL dùng chung cho 4 chức năng trên
 * - Tạo CSDL php0921e2_crud
CREATE DATABASE IF NOT EXISTS php0921e2_crud
CHARACTER SET utf8
COLLATE utf8_general_ci;
 * - Tạo bảng products: id, name, price, description, created_at
 * #Tạo bảng products: id, name, price, description, created_at
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
price INT(11) DEFAULT 0,
description TEXT DEFAULT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
 *
 */
