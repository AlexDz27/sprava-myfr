<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="http://localhost/front-end/admin/assets/">
  <link rel="stylesheet" href="css/admin.css">
  <script src="js/manageProducts.js" defer></script>
  <title><?= $title ?></title>
</head>
<body class="admin">

<header class="header cont">
  <h2>Управление товарами</h2>
</header>

<main class="main cont">
  <form action="/admin-9kasu/api/manage-categories" method="POST">
    <?php foreach ($products as $catName => $p): ?>
      <section class="mb-7-5rem">
        <h3 class="category-name"></h3>
      </section>
    <?php endforeach ?>
      <section data-id="<?= $c['id'] ?>" class="js-editable-datum editable-datum">
        <div class="editable-datum__name-and-btns">
          <span>qq</span>
        </div>

        <section class="js-editable-datum__subsection js-dn editable-datum__subsection">
          <label class="db mb-1em">
            Название:&nbsp;
            <input value="" name="name">
          </label>
          <label class="db mb-1em">
            Техническое название:&nbsp;
            <input style="font-family: monospace;" value="" name="name_tech">
          </label>
        </section>
      </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

</body>
</html>