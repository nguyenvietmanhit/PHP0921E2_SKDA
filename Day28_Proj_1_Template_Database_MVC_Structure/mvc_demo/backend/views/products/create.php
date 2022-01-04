<!--views/products/create.php-->
<h2>Form thêm mới sản phẩm</h2>

<form action="" method="post">
    <div class="form-group">
        <label for="name">Nhập tên sp</label>
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="price">Nhập giá sp</label>
        <input type="text" name="price" id="price" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Lưu sp" class="btn btn-primary" />
        <a href="index.php?controller=product&action=index" class="btn btn-default">Về trang ds</a>
    </div>
</form>
