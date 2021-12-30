<?php
//mvc_demo/controllers/ProductController.php
// Class controller xử lý logic sản phẩm
// Nhúng class Controller vào thì mới dùng đc
require_once "controllers/Controller.php";
require_once 'models/Product.php'; //Nhúng model

class ProductController extends Controller {

  // Thêm mới sp
  // index.php?controller=product&action=create
  public function create() {
    // - Xử lý submit form, xử lý trc logic gọi view
    // + Debug:
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // + Nếu user submit thì mới xử lý:
    if (isset($_POST['submit'])) {
      // + Tạo biến trung gian
      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      // + Validate form:
      // Name và price phải nhập: empty
      // Price phải là số: is_numeric
      if (empty($name) || empty($price)) {
        $this->error = "Name và price phải nhập";
      } elseif (!is_numeric($price)) {
        $this->error = "Price phải là số";
      }
      // + Lưu vào CSDL chỉ khi nào ko có lỗi:
      if (empty($this->error)) {
        // Từ Controller gọi Model để nhờ Model tương tác với CSDL -> MVC
        $product_model = new Product();
        $datas = [
          'name' => $name,
          'price' => $price,
          'description' => $description
        ];
        $is_insert = $product_model->insertData($datas);
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới sp thành công';
          header('Location: index.php?controller=product&action=index');
          exit();
        }
        $this->error = 'Thêm mới sp thất bại';
      }
    }

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

    // - Controller gọi Model
    $product_model = new Product();
    $products = $product_model->listData();
    echo "<pre>";
    print_r($products);
    echo "</pre>";

    // - Controller gọi View
    $this->page_title = 'Danh sách sp';
    $this->content = $this->render('views/products/index.php', ['products' => $products]);

    require_once 'views/layouts/main.php';
  }

  // Update sp
  //index.php?controller=product&action=update&id=3
  public function update() {
    // - Controller gọi Model lấy ra sp theo id từ url
    // index.php?controller=product&action=update&id=7
    // + Validate id
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = "Tham số id ko hợp lệ";
      header('Location: index.php?controller=product&action=index');
      exit();
    }
    $id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getOne($id);

    // - Xử lý submit form, tương như thêm mới
    // + Thứ 3 tới dự kiến sẽ thi, (chờ PĐT thông báo), làm các đề, crud làm theo kiểu php thuần, nếu làm theo mvc dc thì tốt

    // - Controller gọi View:
    $this->page_title = "Cập nhật sp";
    $this->content = $this->render('views/products/update.php', ['product' => $product]);
    require_once 'views/layouts/main.php';
  }

  // Delete sp
  // index.php?controller=product&action=delete&id=3
  public function delete() {
    echo "Delete";
  }
}
