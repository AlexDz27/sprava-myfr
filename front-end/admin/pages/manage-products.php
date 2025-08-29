<?php // var_dump(get_defined_vars()); die(); ?>

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
  <div id="spravaSection">
    <?php foreach ($categories as $idx => $cat): ?>
      <section  class="js-category-section mb-2rem">
        <h3 class="js-category-name category-name category-name--manage-products <?= $cat['hidden'] ? 'category-name--hidden' : '' ?>">
          <span class="category-name__num">#<?= $idx + 1 ?></span>
          <?= $cat['name'] ?> <?= $cat['hidden'] ? '(скрыта)' : '' ?>
        </h3>

        
        <?php if (!isset($productGroups[$cat['name']])): ?>
          <div class="js-products-grid js-dn fz-init">
            <p>Категория не имеет товаров</p>
          </div>
        <?php else: ?>
          <div class="js-products-grid js-dn products-grid fz-init">
            <?php $idx = 0; ?>
            <?php foreach ($productGroups[$cat['name']]['products'] as $p): ?>
              <a href="/admin-9kasu/edit-product/<?= empty($p['art']) ? $p['id'] : $p['art'] ?>" data-order-id="<?= $idx ?>" data-id="<?= $p['id'] ?>" class="products-grid__product <?= $p['hidden'] ? 'products-grid__product--hidden' : '' ?>">
                <img class="products-grid__product__img <?= $p['hidden'] ? 'products-grid__product--hidden__img' : '' ?>" src="<?= $p['img'] ?>">
                <b class="<?= $p['hidden'] ? 'products-grid__product--hidden__name' : '' ?>"><?= $p['name'] ?> <?= $p['hidden'] ? '(скрыт)' : '' ?></b>
                <span class="products-grid__product__art <?= $p['hidden'] ? 'products-grid__product--hidden__art' : '' ?>">(<?= empty($p['art']) ? 'внутр. номер: ' . $p['id'] : $p['art'] ?>)</span>
                <button class="btn btn--admin products-grid__product__btn--admin">Редактировать</button>
              </a>
              <?php $idx++; ?>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </section>
    <?php endforeach ?>
  </div>

  <div id="roshmaSection" style="display: none;">
    <?php foreach ($categories as $idx => $cat): ?>
      <section class="js-category-section mb-2rem">
        <h3 class="js-category-name category-name category-name--manage-products <?= $cat['hidden'] ? 'category-name--hidden' : '' ?>">
          <span class="category-name__num">#<?= $idx + 1 ?></span>
          <?= $cat['name'] ?> <?= $cat['hidden'] ? '(скрыта)' : '' ?>
        </h3>

        
        <?php if (!isset($productGroupsRoshma[$cat['name']])): ?>
          <div class="js-products-grid js-dn fz-init">
            <p>Категория не имеет товаров</p>
          </div>
        <?php else: ?>
          <div class="js-products-grid js-dn products-grid fz-init">
            <?php foreach ($productGroupsRoshma[$cat['name']]['products'] as $p): ?>
              <a href="/admin-9kasu/edit-product/<?= $p['art'] ?? $p['id'] ?>" class="products-grid__product <?= $p['hidden'] ? 'products-grid__product--hidden' : '' ?>">
                <img class="products-grid__product__img <?= $p['hidden'] ? 'products-grid__product--hidden__img' : '' ?>" src="<?= $p['img'] ?>">
                <b class="<?= $p['hidden'] ? 'products-grid__product--hidden__name' : '' ?>"><?= $p['name'] ?> <?= $p['hidden'] ? '(скрыт)' : '' ?></b>
                <span class="products-grid__product__art <?= $p['hidden'] ? 'products-grid__product--hidden__art' : '' ?>">(<?= empty($p['art']) ? 'внутр. номер: ' . $p['id'] : $p['art'] ?>)</span>
                <button class="btn btn--admin products-grid__product__btn--admin">Редактировать</button>
              </a>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </section>
    <?php endforeach ?>
  </div>

  <button id="orderSubmitBtn" style="width: 100%;" class="btn btn--admin" type="submit" disabled>Подтвердить редактирование порядка</button>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>