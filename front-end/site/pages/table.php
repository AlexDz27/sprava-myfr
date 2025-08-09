<?php // var_dump($catalogWithModelsRoshma); die(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/front-end/site/assets/css/table.h-1.css">
  <script src="/front-end/site/assets/js/table.h-1.js" defer></script>
  <title><?= $title ?></title>
</head>
<body>

<table class="cont" id="tableSprava">
  <thead>
    <tr class="thead__tr">
      <th class="important"><?= $curPriceListDate ?></th>
      <th class="title" colspan="6">Прайс-лист торговой марки SPRAVA</th>
    </tr>
  </thead>
  <tbody>
    <tr class="title-columns">
      <th>Артикул</th>
      <th style="line-height: 18px;">Наименование товаров <br><span style="font-size: 13px;">+ внешний вид (одного из товаров в модельном ряду)</span></th>
      <th>Размер</th>
      <th>Цена с НДС, руб.</th>
      <th class="text--regular">Единица изм.</th>
      <th class="text--regular">Упак. мал.</th>
      <th class="text--regular">Упак. круп.</th>
    </tr>

    <?php $c = -1; ?>
    <?php foreach ($catalogWithModels as $catName => $modelsProducts): $c++; ?>
      <tr>
        <td class="category <?= $c === 0 ? 'category--first' : '' ?>" colspan="7"><?= $catName ?></td>
        <?php foreach ($modelsProducts as $modelName => $ps): ?>
          <?php foreach ($ps['products'] as $idx => $p): ?>
            <tr class="<?= $idx === 0 ? 'first-product-in-model' : '' ?>">
              <?php if ($ps['view']['needsOtherRows']): ?>
                <?php if ($idx === 0): ?>
                  <td><?= $p['art'] ?></td>
                  <td><?= $p['model'] ?></td>
                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php elseif ($idx === 1): ?>
                  <td><?= $p['art'] ?></td>
                  <td class="td--holding-img" rowspan="<?= $ps['view']['howMany'] ?>">
                    <?php if ($modelName === 'Запаска нитевая "стандарт", полиакрил, к ручке 6мм'): ?>
                      <img class="td--holding-img__img" src="<?= $ps['products'][1]['img'] ?>">
                    <?php else: ?>
                      <img class="td--holding-img__img" src="<?= $ps['products'][0]['img'] ?>">
                    <?php endif ?>
                  </td>
                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php else: ?>
                  <td><?= $p['art'] ?></td>

                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php endif ?>
              <?php else: ?>
                <td><?= $p['art'] ?></td>
                <td class="td--model--imgs-needs-only-one-row">
                  <p class="td--model--imgs-needs-only-one-row__text"><?= $p['model'] ?></p>
                  <p class="td--model--imgs-needs-only-one-row__img__cont"><img class="td--holding-img__img" src="<?= $p['img'] ?>" alt=""></p>
                </td>
                <td><?= $p['variant'] ?></td>
                <td><?= $p['price'] ?></td>
                <td><?= $p['unit'] ?></td>
                <td><?= $p['upakMal'] ?></td>
                <td><?= $p['upakKrup'] ?></td>
              <?php endif ?>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<div class="table-switcher-pane cont">
  <button id="SPRAVA" class="table-switcher-pane__btn table-switcher-pane__btn--sprava table-switcher-pane__btn--active">SPRAVA</button>
  <button id="ROSHMA" class="table-switcher-pane__btn table-switcher-pane__btn--roshma">Рошма</button>
</div>

<table class="cont table--hidden" id="tableRoshma">
  <thead>
    <tr class="thead__tr">
      <th class="important"><?= $curPriceListDate ?></th>
      <th class="title" colspan="6">Прайс-лист торговой марки Рошма</th>
    </tr>
  </thead>
  <tbody>
    <tr class="title-columns">
      <th>Артикул</th>
      <th style="line-height: 18px;">Наименование товаров <br><span style="font-size: 13px;">+ внешний вид (одного из товаров в модельном ряду)</span></th>
      <th>Размер</th>
      <th>Цена с НДС, руб.</th>
      <th class="text--regular">Единица изм.</th>
      <th class="text--regular">Упак. мал.</th>
      <th class="text--regular">Упак. круп.</th>
    </tr>

    <?php $c = -1; ?>
    <?php foreach ($catalogWithModelsRoshma as $catName => $modelsProducts): $c++; ?>
      <tr>
        <td class="category <?= $c === 0 ? 'category--first' : '' ?>" colspan="7"><?= $catName ?></td>
        <?php foreach ($modelsProducts as $modelName => $ps): ?>
          <?php foreach ($ps['products'] as $idx => $p): ?>
            <tr class="<?= $idx === 0 ? 'first-product-in-model' : '' ?>">
              <?php if ($ps['view']['needsOtherRows']): ?>
                <?php if ($idx === 0): ?>
                  <td><?= $p['art'] ?></td>
                  <td><?= $p['model'] ?></td>
                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php elseif ($idx === 1): ?>
                  <td><?= $p['art'] ?></td>
                  <td class="td--holding-img" rowspan="<?= $ps['view']['howMany'] ?>">
                    <?php if ($modelName === 'Запаска нитевая "стандарт", полиакрил, к ручке 6мм'): ?>
                      <img class="td--holding-img__img" src="<?= $ps['products'][1]['img'] ?>">
                    <?php else: ?>
                      <img class="td--holding-img__img" src="<?= $ps['products'][0]['img'] ?>">
                    <?php endif ?>
                  </td>
                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php else: ?>
                  <td><?= $p['art'] ?></td>

                  <td><?= $p['variant'] ?></td>
                  <td><?= $p['price'] ?></td>
                  <td><?= $p['unit'] ?></td>
                  <td><?= $p['upakMal'] ?></td>
                  <td><?= $p['upakKrup'] ?></td>
                <?php endif ?>
              <?php else: ?>
                <td><?= $p['art'] ?></td>
                <td class="td--model--imgs-needs-only-one-row">
                  <p class="td--model--imgs-needs-only-one-row__text"><?= $p['model'] ?></p>
                  <p class="td--model--imgs-needs-only-one-row__img__cont"><img class="td--holding-img__img" src="<?= $p['img'] ?>" alt=""></p>
                </td>
                <td><?= $p['variant'] ?></td>
                <td><?= $p['price'] ?></td>
                <td><?= $p['unit'] ?></td>
                <td><?= $p['upakMal'] ?></td>
                <td><?= $p['upakKrup'] ?></td>
              <?php endif ?>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

</body>
</html>