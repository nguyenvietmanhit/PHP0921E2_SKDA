<?php
session_start();
//welcome.php
// - Cần xử lý case: user chưa login mà biết url này thì ko cho truy cập
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = 'Bạn chưa đăng nhập nên không thể truy cập trang này';
  header('Location: login.php');
  exit();
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h1>{$_SESSION['success']}</h1>";
echo "<p>Chào bạn: {$_SESSION['username']}</p>";
echo "<a href='logout.php'>Đăng xuất</a>";


$list_product = array(
    1 => array(
        'id' => 1,
        'product_img' => 'avatar.png'
    )
);
?>

<?php foreach ($list_product AS $item): ?>
    <img src="uploads/<?php echo $item['product_img']?>" />
<?php endforeach; ?>