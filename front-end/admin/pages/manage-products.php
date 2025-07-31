<?php

function getCurrentUrl() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $host = $_SERVER['HTTP_HOST'];
  $uri = $_SERVER['REQUEST_URI'];
  return $protocol . $host . $uri;
}

?>

<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Управление товарами</h2>
</section>

<main class="main cont">
  <?php foreach ($productGroups as $catName => $ps): ?>
    <section class="mb-7-5rem">
      <h3 class="category-name <?= $ps['isCatHidden'] ? 'category-name--hidden' : '' ?>">
        <span class="category-name__num">#<?= $ps['count'] ?></span>
        <?= $catName ?> <?= $ps['isCatHidden'] ? '(скрыта)' : '' ?>
      </h3>

      <div class="products-grid fz-init">
        <?php foreach ($ps['products'] as $p): ?>
          <a href="<?= getCurrentUrl() . '/' . $p['art'] ?>" class="products-grid__product">
            <img class="products-grid__product__img" src="<?= $p['img'] ?>">
            <b><?= $p['name'] ?></b>
            <span class="products-grid__product__art">(<?= $p['art'] ?>)</span>
            <button class="btn btn--admin products-grid__product__btn--admin">Редактировать</button>
          </a>
        <?php endforeach ?>
      </div>
    </section>
  <?php endforeach ?>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>