<?php
//mvc_demo/configs/Database.php
// Class lưu thông tin kết nối CSDL theo PDO
// Nếu 1 file PHP mà chứa 1 class thì nên đặt tên file trùng tên class!
//define, const
class Database {
  const DB_DSN = "mysql:host=localhost;dbname=php0921e2_crud;port=3306;charset=utf8";
  const DB_USERNAME = "root";
  const DB_PASSWORD = "";
}
