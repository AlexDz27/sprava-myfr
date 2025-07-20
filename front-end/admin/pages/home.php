<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/front-end/admin/assets/css/admin.css">
  <script src="/front-end/admin/assets/js/admin.js" defer></script>
  <title><?= $title ?></title>
</head>
<body class="admin">

<header class="header">
  <h1 class="heading--index tac">Администратор, что Вы хотите сделать?</h1>
</header>  

<main class="main cont">
  <div class="actions-list">
    <a class="actions-list__link" href="/admin-9kasu/update-price">Обновить прайс-лист</a>
    <a class="actions-list__link" href="#">Управление товарами</a>
    <a class="actions-list__link" href="/admin-9kasu/manage-categories">Управление категориями</a>
    <a class="actions-list__link" href="/admin-9kasu/edit-texts">Редактировать текст на сайте</a>
  </div>
</main>
  
</body>
</html>