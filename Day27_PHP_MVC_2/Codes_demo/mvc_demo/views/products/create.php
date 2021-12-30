<!--views/products/create.php-->



<h2>Form thêm mới sản phẩm</h2>

<form method="post" action="">
  Nhập tên sp:
  <input type="text" name="name" />
  <br />
  Nhập giá sp:
  <input type="text" name="price" />
  <br />
  Chi tiết sp:
  <textarea name="description"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu sản phẩm" />
  <a href="index.php?controller=product&action=index">Về trang danh sách sp</a>
</form>
<script>
    $('form').submit(function () {
        var error = '';
        if (name == '') {
            error = 'Name phải nhập';
        }
        if (error != '') {
            event.preventDefault();
        }
    })
</script>
