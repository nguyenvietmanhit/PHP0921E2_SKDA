<?php
//controllers/Controller.php

class Controller {
  public $page_title; //tiêu đề trang

  public $error; // chứa thông tin lỗi

  public $content; //chứa nội dung của file view

  /**
   * Lấy nội dung view kèm theo cơ chế truyền biến từ bên ngoài vào để view sử dụng,
   * chức năng giống như hàm file_get_contents
   * @param $view_path: đường dẫn tới file view
   * @param array $variables: mảng các biến từ bên ngoài truyền vào view
   */
  public function render($view_path, $variables = []) {
    extract($variables);
    ob_start();
    require "$view_path";
    $content = ob_get_clean();

    return $content;
  }
}
