<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$select_categories = 'select id, name from categories';
$data_categories = $db->query($select_categories);
$categories = $data_categories->fetchAll(PDO::FETCH_ASSOC);

$select_brands = 'select id, name from brands';
$data_brands = $db->query($select_brands);
$brands = $data_brands->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/modal.php'; ?>


<div class="product__add py-5">
  <div class="container">
    <div class="row">
      <div class="exemple col-3">
        <h4>Пример:</h4>
        <div class="example-card p-2 rounded-3 border-success">
          <div class="card">
            <div class="img__wrapper">
              <img id="img" src="/assets/img/shop_04.jpg" class="card-img-top" alt="">
            </div>
            <div class="card-body">
              <h3 id="price" class="card-price">Цена</h3>
              <h5 id="name" class="card-title">Название</h5>
              <p id="description" class="card-text">Описание</p>
            </div>
          </div>
        </div>
      </div>
      <div class="data col">
        <h4>Информация:</h4>
        <form action="" class="p-3">
          <div class="mb-3">
            <label for="img" class="form-label">Фотография</label>
            <input class="form-control" type="file" id="img">
          </div>
          <div class="mb-4 row">
            <div class="col-8">
              <label class="form-label" for="name">Наименование</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col-4">
              <label for="price" class="form-label">Цена</label>
              <input type="text" name="price" id="price" class="form-control">
            </div>
          </div>
          <div class="mb-4 row">
            <div class="col">
              <label for="brand" class="form-label">Бренд</label>
              <select name="brand_id" id="brand" class="form-select">
                <?php foreach($brands as $brand): ?>
                  <option value="<?=$brand['id']?>"><?=$brand['name']?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col">
              <label for="category" class="form-label">Категория</label>
              <select name="category_id" id="category" class="form-select">
                <?php foreach($categories as $category): ?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="mb-4 row">
            <div class="col">
              <label for="description" class="form-label">Описание</label>
              <textarea class="form-control" name="description" id="description" style="height: 70px"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Добавить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>