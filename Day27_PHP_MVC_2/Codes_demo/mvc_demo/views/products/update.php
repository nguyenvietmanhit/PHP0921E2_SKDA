<!--views/products/update.php-->

<h2>Form cập nhật sản phẩm</h2>

<form method="post" action="">
  Tên sp:
  <input type="text" name="name" value="<?php echo $product['name']; ?>" />
  <br />
  Giá sp:
  <input type="text" name="price" value="<?php echo $product['price']; ?>" />
  <br />
  Chi tiết sp:
  <textarea name="description"><?php echo $product['description']; ?></textarea>
  <br />
  <input type="submit" name="submit" value="Cập nhật sản phẩm" />
  <a href="index.php?controller=product&action=index">Về trang danh sách sp</a>
</form>

