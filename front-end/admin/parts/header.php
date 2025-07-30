<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/front-end/admin/assets/css/admin.css">
  <?php foreach ($extraAssets as $asset): ?>
    <?= $asset . "\n" ?>
  <?php endforeach ?>
  <title><?= $title ?></title>
</head>
<body class="admin">
  <svg style="display: none;">
    <symbol id="arrow-left" width="18" height="13" fill="none" viewBox="0 0 25 15">
      <path d="M23 12.9644L13.2234 2.7554C12.8292 2.3438 12.1713 2.34434 11.7778 2.75657L2 13" stroke-width="3" stroke="#0d6efd"></path>
    </symbol>
  </svg>

  <?php if (!isset($pageName) || $pageName !== 'home'): ?>
    <a href="/admin-9kasu">
      <header class="header cont">
        <svg class="back-home-icon"><use href="#arrow-left"></use></svg>
        Назад на главную
      </header>
    </a>
  <?php endif ?>