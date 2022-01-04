<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller {
  // Thêm mới sp
  //index.php?controller=product&action=create
  public function create() {
    // - Xử lý submit form phía trên view
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      // Validate bỏ qua
      if (empty($this->error)) {
        // - Gọi model để lưu vào CSDL
        $product_model = new Product();
        $data = [
          'name' => $name,
          'price' => $price
        ];
        $is_insert = $product_model->insertData($data);
        var_dump($is_insert);
      }
    }

    // - Gán thông tin cụ thể theo chức năng hiện tại
    $this->page_title = "Thêm mới sản phẩm";
    $this->content = $this->render('views/products/create.php');

    // - Gọi layout để hiển thị các thông tin trên
    require_once 'views/layouts/main.php';
  }
}
