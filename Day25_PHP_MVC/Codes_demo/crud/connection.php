<?php
//crud/connection.php
/**
 * Viết truy vấn tạo CSDL quanlysinhvien và tạo bảng students
 *
CREATE DATABASE IF NOT EXISTS quanlysinhvien
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS students(
id INT(11) AUTO_INCREMENT,
name VARCHAR(255) DEFAULT NULL,
age INT(11) DEFAULT 0,
avatar VARCHAR(255) DEFAULT NULL,
description TEXT DEFAULT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
 */

// Khai báo các hằng số kết nối CSDL theo PDO:
const DB_DSN = "mysql:host=localhost;dbname=quanlysinhvien;port=3306;charset=utf8";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
  $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
} catch (Exception $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}

echo "<h2>Kết nối CSDL thành công</h2>";
