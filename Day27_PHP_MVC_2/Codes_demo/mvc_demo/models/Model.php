<?php
// Nhúng file Database.php để sử dụng đc các hằng số bên trong class
require_once "configs/Database.php";
//mvc_demo/models/Model.php
// Model cha tạo ra 1 đối tượng kết nối dùng chung cho các model con

class Model {
  // Đối tượng kết nối CSDL theo PDO, dùng chung cho các model con
  public $connection;

  // Sử dụng phương thức khởi tạo để tự động khởi tạo kết nối CSDL và gán cho thuộc tính connection
  public function  __construct() {
    try {
      $this->connection = new PDO(Database::DB_DSN, Database::DB_USERNAME, Database::DB_PASSWORD);
    } catch (Exception $e) {
      die("Lỗi kết nối: " . $e->getMessage());
    }
  }
}
