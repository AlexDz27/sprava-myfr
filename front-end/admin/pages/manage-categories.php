<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Управление категориями</h2>
</section>

<main class="main cont">
  <form method="POST">
    <?php for ($i = 0; $i < count($categories); $i++): $c = $categories[$i]; ?>
      <section data-id="<?= $c['id'] ?>" class="js-editable-entity editable-entity">
        <div class="editable-entity__name-and-btns">
          <h3 class="js-category-name category-name <?= $c['hidden'] ? 'category-name--hidden' : '' ?> editable-entity__name"><span class="category-name__num">#<?= $i + 1 ?></span> Категория "<?= $c['name'] ?>" <?= $c['hidden'] ? '(скрыта)' : '' ?></h3>
          <div class="editable-entity__btns">
            <button class="js-edit-btn btn bs-like-btn bs-like-btn--warning" title="Редактировать" type="button">
              <svg class="btn-w-icon__svg" width="20" height="20" viewBox="0 0 576 512"><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>
            </button>
            <button class="js-hide-btn btn bs-like-btn bs-like-btn--info" title="<?= $c['hidden'] ? 'Вернуть на сайт' : 'Скрыть с сайта' ?>" type="button">
              <?php if ($c['hidden']): ?>
                <svg class="btn-w-icon__svg" width="20" height="20" viewBox="0 0 576 512"><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
              <?php else: ?>
                <svg class="btn-w-icon__svg" width="20" height="20" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z"/></svg>
              <?php endif ?>
            </button>
            <button class="btn bs-like-btn bs-like-btn--danger" title="Удалить" type="button">
              <svg class="btn-w-icon__svg" width="20" height="20" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
            </button>
          </div>
        </div>

        <section class="js-editable-entity__subsection js-dn editable-entity__subsection">
          <label class="db mb-1em">
            Название:&nbsp;
            <input value="<?= $c['name'] ?>" name="name">
          </label>
          <label class="db mb-1em">
            Техническое название:&nbsp;
            <input style="font-family: monospace;" value="<?= $c['name_tech'] ?>" name="name_tech">
          </label>
          <p class="db mb-1em">
            Скрыть категорию?&nbsp;
            <label style="font-size: .8em;">Нет <input type="radio" name="hide-<?= $c['id'] ?>" value="0" checked></label>
            <label style="font-size: .8em;">Да <input type="radio" name="hide-<?= $c['id'] ?>" value="1"></label>
          </p>
          <label class="db mb-1em">
            <p>Описание на главной странице в слайдере:</p>
            <textarea class="textarea textarea--full textarea--w-code" name="description"><?= $c['description'] ?></textarea>
          </label>
          <label class="db mb-1em">
            <p>Перенос строк в названии категории (если нужно):</p>
            <textarea class="textarea textarea--small textarea--w-code" name="name_view"><?= $c['name_view'] ?></textarea>
          </label>
          <div class="mb-1em">
            Поменять картинку:
            <div class="editable-entity__imgs-grid">
              <div>
                <p style="font-size: .8em;">Текущая:</p>
                <div class="img-holder">
                  <!-- first char of $c['img'] should be slash / -->
                  <img src="<?= $c['img'] ?>">
                </div>
              </div>
              <div>
                <p style="font-size: .8em;">Поменять:</p>
                <label for="changeCatImg" class="btn btn--admin" style="font-size: .8em; margin-bottom: .5em; display: inline-block;">Поменять картинку категории</label>
                <input type="file" id="changeCatImg" name="img" accept="image/png, image/jpeg">
                <div style="margin-bottom: 55px;" id="changeCatImgHolder" class="img-holder img-holder--smaller"></div>
              </div>
            </div>
          </div>
        </section>
      </section>
    <?php endfor ?>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>