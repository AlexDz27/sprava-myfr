<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Управление товарами</h2>
</section>

<main class="main cont">
  <form method="POST">
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

<?php require 'front-end/admin/parts/footer.php' ?>