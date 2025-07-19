<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="http://localhost/front-end/admin/assets/">
  <link rel="stylesheet" href="css/admin.css">
  <script src="js/editTexts.js" defer></script>
  <title><?= $title ?></title>
</head>
<body class="admin">

<header class="header cont">
  <h2>Управление категориями</h2>
</header>

<main class="main cont">
  <form action="/admin-9kasu/api/edit-texts" method="POST">
    <section class="editable-info-section">
      <h3>wqe</h3>
    </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

</body>
</html>