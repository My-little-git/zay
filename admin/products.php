<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$select_sql = 'select p.id, p.name, c.name as category, b.name as brand, p.price 
               from products p join brands b on p.brand_id = b.id
                               join categories c on p.category_id = c.id';
$data = $db->query($select_sql);
$products = $data->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/modal.php'; ?>


<div class="products py-5">
  <div class="container">
    <div class="products__inner">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($products as $product): ?>
            <tr>
              <td><?=$product['id']?></td>
              <td><?=$product['name']?></td>
              <td><?=$product['brand']?></td>
              <td><?=$product['category']?></td>
              <td><?=$product['price']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="/admin/product_add.php" class="btn btn-success">Добавить</a>
    </div>
  </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>