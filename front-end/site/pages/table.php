<?php // var_dump($catalogWithModels); die(); ?>

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

<table class="cont">
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
          <?php // var_dump($idx); ?>
          <?php // var_dump($modelName); ?>
          <?php $trSpans = count($modelsProducts[$modelName]) > 1 ? true : false; ?>
          <?php $trSpansHowMany = count($modelsProducts[$modelName]) - 1; ?>
          <?php foreach ($ps as $idx => $p): ?>
            <tr class="<?= $idx === 0 ? 'first-product-in-model' : '' ?>">
              <td><?= $p['art'] ?></td>
              <?php if ($trSpans): ?>
                <td><?= $p['model'] ?></td>
              <?php else: ?>
                <td><?= $p['model'] ?></td>
              <?php endif ?>
              <td><?= $p['variant'] ?></td>
              <td><?= $p['price'] ?></td>
              <td><?= $p['unit'] ?></td>
              <td><?= $p['upakMal'] ?></td>
              <td><?= $p['upakKrup'] ?></td>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

</body>
</html>