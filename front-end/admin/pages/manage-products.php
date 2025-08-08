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

<section style="margin-bottom: 2rem;" class="cont">
  <a href="/admin-9kasu/create-product" class="btn btn-entity-action btn-entity-action--create"><b class="btn-entity-action__icon">+</b> Создать товар</a>
</section>

<main class="main cont">
  <?php foreach ($productGroups as $catName => $ps): ?>
    <section class="js-category-section mb-2rem">
      <h3 class="js-category-name category-name category-name--manage-products <?= $ps['isCatHidden'] ? 'category-name--hidden' : '' ?>">
        <span class="category-name__num">#<?= $ps['count'] ?></span>
        <?= $catName ?> <?= $ps['isCatHidden'] ? '(скрыта)' : '' ?>
      </h3>

      <div class="js-products-grid js-dn products-grid fz-init">
        <?php foreach ($ps['products'] as $p): ?>
          <a href="/admin-9kasu/edit-product/<?= $p['art'] ?? $p['id'] ?>" class="products-grid__product <?= $p['hidden'] ? 'products-grid__product--hidden' : '' ?>">
            <img class="products-grid__product__img <?= $p['hidden'] ? 'products-grid__product--hidden__img' : '' ?>" src="<?= $p['img'] ?>">
            <b class="<?= $p['hidden'] ? 'products-grid__product--hidden__name' : '' ?>"><?= $p['name'] ?> <?= $p['hidden'] ? '(скрыт)' : '' ?></b>
            <span class="products-grid__product__art <?= $p['hidden'] ? 'products-grid__product--hidden__art' : '' ?>">(<?= $p['art'] ?? 'внутр. ключ: ' . $p['id'] ?>)</span>
            <button class="btn btn--admin products-grid__product__btn--admin">Редактировать</button>
          </a>
        <?php endforeach ?>
      </div>
    </section>
  <?php endforeach ?>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>