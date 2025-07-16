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
  <h2>Редактирование текстов</h2>
</header>

<main class="main cont">
  <form action="/admin-9kasu/api/edit-texts" method="POST">
    <section class="editable-info-section">
      <h3>Телефоны</h3>
      <p>Телефон первый: &nbsp;<input name="<?= $phones[0]['id'] ?>" value="<?= $phones[0]['text'] ?>"></p>
      <p>Телефон второй: &nbsp;<input name="<?= $phones[1]['id'] ?>" value="<?= $phones[1]['text'] ?>"></p>
    </section>

    <section class="editable-info-section">
      <h3>Адрес:</h3>
      <textarea name="<?= $address['id'] ?>" class="textarea"><?= $address['text'] ?></textarea>
    </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

</body>
</html>