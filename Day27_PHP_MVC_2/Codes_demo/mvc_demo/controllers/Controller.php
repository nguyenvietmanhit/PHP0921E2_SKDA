<?php
// mvc_demo/controllers/Controller.php
// Class controller cha, chứa thuộc tính, phương thức dùng chung cho class con kế thừa từ nó

class Controller {

  // Tiêu đề trang của các chức năng
  public $page_title;

  // Lưu nội dung view
  public $content;

  // Lấy nội dung của 1 file view bất kỳ, kèm cơ chế truyền biến tường minh vào file view đó
  // $view_path: đường dẫn tới file view muốn lấy nội dung
  // $variables: mảng các biến truyền vào view đó
  public function render($view_path, $variables = []) {
    // Giải nén mảng biến truyền vào
    extract($variables);

    // Mở chế độ ghi nhớ nội dung file
    ob_start();

    require "$view_path";

    // KẾt thúc chế độ ghi nhớ, trả về 1 chuỗi chứa nội dung file
    $render_view = ob_get_clean();
    return $render_view;
  }
}
