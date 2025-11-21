<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php if ($pageName == 'about-company'): ?>
    <meta name="description" content="О нас | SPRAVA | Оптовые поставки строительных материалов">
    <meta property="og:site_name" content="Компания SPRAVA">
    <meta property="og:title" content="О нас | SPRAVA | Оптовые поставки строительных материалов">
  <?php elseif ($pageName == 'catalog'): ?>
    <meta name="description" content="Каталог | SPRAVA | Оптовые поставки строительных материалов">
    <meta property="og:site_name" content="Компания SPRAVA">
    <meta property="og:title" content="Каталог | SPRAVA | Оптовые поставки строительных материалов">
  <?php elseif ($pageName == 'product'): ?>
    <meta name="description" content="Каталог | SPRAVA | Оптовые поставки строительных материалов">
    <meta property="og:site_name" content="Компания SPRAVA">
    <meta property="og:title" content="<?= htmlspecialchars($product['name'], ENT_QUOTES | ENT_HTML5) ?> | SPRAVA | Оптовые поставки строительных материалов">
  <?php elseif ($pageName == 'table'): ?>
    <meta name="description" content="Прайс-лист | SPRAVA | Оптовые поставки строительных материалов">
    <meta property="og:site_name" content="Компания SPRAVA">
    <meta property="og:title" content="Прайс-лист | SPRAVA | Оптовые поставки строительных материалов">
  <?php else: ?>
    <meta name="description" content="SPRAVA | Оптовые поставки строительных материалов">
    <meta property="og:site_name" content="Компания SPRAVA">
    <meta property="og:title" content="SPRAVA | Оптовые поставки строительных материалов">
  <?php endif ?>

  <link rel="stylesheet" href="/front-end/site/assets/css/style.h-1.css">
  <?php foreach ($extraAssets as $asset): ?>
    <?= $asset . "\n" ?>
  <?php endforeach ?>
  <script src="/front-end/site/assets/js/main.h-2.js" defer></script>
  <script src="/front-end/site/assets/js/search.h-3.js" defer></script>
  <title><?= $title ?></title>
</head>