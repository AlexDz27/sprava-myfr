<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow,noarchive">

  <?php if ($pageName == 'about-company'): ?>
    <meta property="og:title" content="О нас | SPRAVA | Оптовые поставки строительных материалов">
  <?php elseif ($pageName == 'catalog'): ?>
    <meta property="og:title" content="Каталог | SPRAVA | Оптовые поставки строительных материалов">
  <?php elseif ($pageName == 'table'): ?>
    <meta property="og:title" content="Прайс-лист | SPRAVA | Оптовые поставки строительных материалов">
  <?php else: ?>
    <meta property="og:title" content="SPRAVA | Оптовые поставки строительных материалов">
  <?php endif ?>

  <link rel="stylesheet" href="/front-end/site/assets/css/style.h-1.css">
  <?php foreach ($extraAssets as $asset): ?>
    <?= $asset . "\n" ?>
  <?php endforeach ?>
  <script src="/front-end/site/assets/js/main.h-2.js" defer></script>
  <script src="/front-end/site/assets/js/search.h-2.js" defer></script>
  <title><?= $title ?></title>
</head>