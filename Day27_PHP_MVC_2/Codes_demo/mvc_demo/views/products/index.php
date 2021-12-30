<!--views/products/index.php-->
<?php
//var_dump($products);
?>

<a href="index.php?controller=product&action=create">Thêm mới sp</a>
<h3>Danh sách sản phẩm</h3>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Des</th>
    <th>Created_at</th>
    <th></th>
  </tr>
  <?php foreach($products AS $product): ?>
      <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price'], 0, '.', '.') ?> vnđ</td>
        <td><?php echo $product['description']; ?></td>
        <td>
<!--            30/12/2021 20:30:00  trong DB: Y-m-d H:i:s-->
            <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
        </td>
        <td>
          <a href="index.php?controller=product&action=update&id=<?php echo $product['id']; ?>">Update</a>
          <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure delete?')">Delete</a>
        </td>
      </tr>
  <?php endforeach; ?>
</table>

