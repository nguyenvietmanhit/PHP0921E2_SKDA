<?php
//mvc_demo/controllers/ProductController.php
// Class controller xử lý logic sản phẩm
// Nhúng class Controller vào thì mới dùng đc
require_once "controllers/Controller.php";

class ProductController extends Controller {

  // Thêm mới sp
  // index.php?controller=product&action=create
  public function create() {
    // Gán các giá trị cụ thể cho thuộc tính cần thiết trong file layout
    $this->page_title = "Form thêm mới sp";

    // Lấy nội dung của file view tương ứng, gán cho thuộc tính của class cha
    $this->content = $this->render("views/products/create.php");

    // THeo mô hình MVC Controller gọi View để hiển thị ra giao diện thêm mới

    // + Gọi layout, tư duy nhúng file trong MVC luôn luôn phải đứng từ file index.php gốc
    require_once 'views/layouts/main.php';

  }

  // Liệt kê sp
  // index.php?controller=product&action=index
  public function index() {
    echo "List";
  }

  // Update sp
  //index.php?controller=product&action=update&id=3
  public function update() {
    echo "Update";
  }

  // Delete sp
  // index.php?controller=product&action=delete&id=3
  public function delete() {
    echo "Delete";
  }
}
