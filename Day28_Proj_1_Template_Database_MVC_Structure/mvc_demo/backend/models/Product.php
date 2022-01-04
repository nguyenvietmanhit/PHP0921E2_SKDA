<?php
//models/Product.php
require_once 'models/Model.php';

class Product extends Model {

  public function insertData($data) {
    $name = $data['name'];
    $price = $data['price'];
    // + Viết truy vấn INSERT theo dạng param để tránh lỗi bảo mật SQL Injection
    $sql_insert = "INSERT INTO products(name, price) VALUES(:name, :price)";
    // + Cbi obj truy vấn:
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị thật vào param của câu truy vấn:
    $inserts = [
      ':name' => $name,
      ':price' => $price
    ];
    // + Thực thi obj truy vấn, INSERT UPDATE DELETE trả về boolean
    return $obj_insert->execute($inserts);
  }
}
