<?php
require_once 'models/Model.php';
class User extends Model {
  public function registerUser($username, $password) {
    // Viết truy vấn dạng tham số
    $sql_insert = "INSERT INTO users(username, password) VALUES (:username, :password)";
    // Cbi obj truy vấn:
    $obj_insert = $this->connection->prepare($sql_insert);
    // Tạo mảng
    $inserts = [
      ':username' => $username,
      ':password' => $password
    ];

    return $obj_insert->execute($inserts);
  }

  public function getUserByUsername($username) {
    $sql_select_one = "SELECT * FROM users WHERE username = :username";
    $obj_select_one = $this->connection->prepare($sql_select_one);
    $selects = [
      ':username' => $username
    ];
    $obj_select_one->execute($selects);
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}
