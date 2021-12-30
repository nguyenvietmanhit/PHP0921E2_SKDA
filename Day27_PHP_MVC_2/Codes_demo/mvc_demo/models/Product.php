<?php
// mvc_demo/models/Product.php
require_once 'models/Model.php';

class Product extends Model {

  // INSERT vào bảng products
  public function insertData($datas = []) {
//    $datas = [
//      'name' => 'Tivi SS',
//      'price' => 123,
//      'description' => 'ABC'
//    ]
    // + Viết truy vấn dạng tham số để tránh lỗi bảo mật SQL Injection: bind param
    $sql_insert = "INSERT INTO products(name, price, description) VALUES(:name, :price, :description)";
    // + Cbi obj truy vấn:
    $obj_insert =  $this->connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị thật vào tham số của câu truy vấn:
    $inserts = [
      ':name' => $datas['name'],
      ':price' => $datas['price'],
      ':description' => $datas['description']
    ];
    // + Thực thi obj truy vấn trên, với INSERT, UPDATE, DELETE -> boolean
    $is_insert = $obj_insert->execute($inserts);

    return $is_insert;
  }

  // UPDATE theo id
  public function updateData($id) {

  }

  // SELECT theo id
  public function getOne($id) {
    // + Viết truy vấn dạng tham số
    $sql_select_one = "SELECT * FROM products WHERE id=:id";
    // + Cbi obj truy vấn:
    $obj_select_one = $this->connection->prepare($sql_select_one);
    // + Tạo mảng truyền giá trị thật cho tham số câu truy vấn
    $selects = [
      ':id' => $id
    ];
    // + Thực thi obj truy vấn:
    $obj_select_one->execute($selects);
    // + Lấy mảng 1 chiều kết hợp:
    $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $product;
  }

  // SELECT sp
  public function listData() {
    // + Viết truy vấn dạng tham số nếu có
    $sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
    // + Cbi obj truy vấn:
    $obj_select_all = $this->connection->prepare($sql_select_all);
    // + Tạo mảng -> bỏ qua
    // + Thực thi obj truy vấn, với SELECT ko cần gán kết quả trả về sau khi thực thi
    $obj_select_all->execute();
    // + Lấy mảng 2 chiều kết hợp:
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  // DELETE data
  public function deleteData($id) {

  }
}
