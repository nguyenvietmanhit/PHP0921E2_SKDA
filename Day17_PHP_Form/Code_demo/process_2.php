<!--process_2.php-->
<!--Demo xử lý form với input phức tạp hơn -->
<?php
// XỬ LÝ FORM
// 1 - Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// 2 - Khai báo error và result
$error = '';
$result = '';
// 3 - Xử lý data form gửi lên chỉ khi user submit form
if (isset($_POST['submit'])) {
  // 4 - Tạo biến trung gian
  // Với radio và checkbox, nếu ko tích vào cái nào -> PHP ko bắt đc data gửi lên
  // -> gán lại gender và jobs sẽ bị lỗi
//  $gender = $_POST['gender'];
//  $jobs = $_POST['jobs'];
  $country = $_POST['country'];
  $email = $_POST['email'];
  $note = $_POST['note'];
  // 5 - Validate form:
  // + Tất cả trường phải nhập
  // + Email phải đúng định dạng
  if (empty($email) || empty($note) || !isset($_POST['gender']) || !isset($_POST['jobs'])) {
      $error = 'Ko đc để trống các trường';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Email chưa đúng định dạng';
  }
  // 6 - Xử lý logic bài toán chỉ khi hệ thống ko có lỗi
  if (empty($error)) {
      // Gender
      $gender = $_POST['gender']; //0 1 2
      $result .= "Giới tính vừa chọn: ";
      switch ($gender) {
        case 0: $result .= "Nữ";break;
        case 1: $result .= "Nam";break;
        case 2: $result .= "Khác";
      }
      $result .= "<br />";
      // Checkbox
      $result .= "Nghề nghiệp vừa chọn:";
      $jobs = $_POST['jobs']; // 0 1 2 3
      foreach ($jobs AS $job) {
          switch ($job) {
            case 0: $result .= " Dev ";break;
            case 1: $result .= " Tester ";break;
            case 2: $result .= " BA ";break;
            case 3: $result .= " PM ";
          }
      }
      // Select: xử lý giống hệt radio
      $result .= "<br /> Quốc gia: ";
      switch ($country) {
        case 0: $result .= "VN";break;
        case 1: $result .= "JP";break;
        case 2: $result .= "KR";
      }
      // Email + Textarea như input text
      $result .= "<br /> Email: $email <br />";
      $result .= "<br /> Note: $note <br />";
  }
}
// 7 - Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form method="post" action="">
<!-- 8 - Đổ lại dữ liệu đã nhập ra form cho các input -->
    Chọn giới tính:
    <!-- PHP dựa vào value của input để biết đc chọn radio nào -->
    <?php
    // Có bao nhiều input tạo bấy nhiều biến chứa checked tương ứng
    $checked_female = '';
    $checked_male = '';
    $checked_another = '';
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        switch ($gender) {
          case 0: $checked_female = 'checked';break;
          case 1: $checked_male = 'checked';break;
          case 2: $checked_another = 'checked';
        }
    }
    // Với select option, sẽ dùng thuộc tính selected cho option, còn với radio/checkbox dùng checked
    ?>
    <input type="radio" name="gender" <?php echo $checked_female; ?> value="0"/> Nữ
    <input type="radio" name="gender" <?php echo $checked_male; ?> value="1"/> Nam
    <input type="radio" name="gender" <?php echo $checked_another; ?> value="2"/> Khác
    <br/>
    Nghề nghiệp:
    <!-- Với các input cho phép chọn nhiều giá trị tại 1 thời điểm, thì name bắt buộc phải ở dạng mảng.
     Các input chọn nhiều: checkbox, select multiple, file multiple
     -->
    <input type="checkbox" name="jobs[]" value="0"/> Dev
    <input type="checkbox" name="jobs[]" value="1"/> Tester
    <input type="checkbox" name="jobs[]" value="2"/> BA
    <input type="checkbox" name="jobs[]" value="3"/> PM
    <br/>
    Quốc gia:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">JP</option>
        <option value="2">KR</option>
    </select>
    <br/>
    Nhập email:
    <input type="text" name="email" value=""/>
    <br/>
    Ghi chú:
    <textarea name="note"></textarea>
    <br/>
    <input type="submit" name="submit" value="Show"/>
</form>
