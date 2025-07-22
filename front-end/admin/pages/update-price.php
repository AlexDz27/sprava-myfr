<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="http://localhost/front-end/admin/assets/">
  <link rel="stylesheet" href="css/admin.css">
  <script src="js/updatePrice.js" defer></script>
  <title><?= $title ?></title>
</head>
<body class="admin">

<header class="header cont">
  <h2>Обновить прайс</h2>
</header>

<main class="main cont">
  <form action="/admin-9kasu/api/edit-texts" method="POST">
    <section class="editable-datum">
      <p>
        1. Выберите файл прайс-листа <span style="font-size: 25px;">👉🏻</span> &nbsp;
        <input name="file" type="file" id="file">
      </p>
    </section>

    <button class="btn btn--admin" type="submit">2. Обновить прайс-лист на сайте</button>
  </form>

  <br>
  <div id="attention" class="attention" style="display: none;">
    <span id="attentionFirstText"></span>
    <ul style="font-size: 85%;" id="attentionDiff"></ul>
    <span id="attentionLastText"></span>
  </div>
</main>

</body>
</html>