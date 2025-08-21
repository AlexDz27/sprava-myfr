<?php require 'front-end/admin/parts/header.php' ?>

<svg style="display: none;">
  <symbol id="open-link" fill="none">
    <path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
  </symbol>
</svg>

<div class="edit-product-header-grid cont">
  <section class="page-name page-name--pt-0">
    <h2>Редактирование товара</h2>
  </section>

  <img class="edit-product-header-grid__img" src="<?= $product['img'] ?>">

  <section class="product-name-cont">
    <div class="product-name <?= $product['hidden'] ? 'category-name--hidden' : '' ?> <?= $product['cat_hidden'] ? 'category-name--hidden' : '' ?>">
      <?= $product['name'] ?> <span class="text--smaller">(<?= $product['art'] ?? 'внутр. ключ: ' . $product['id'] ?>) <?= $product['hidden'] ? '(товар скрыт)' : '' ?> <?= $product['cat_hidden'] ? '(товар скрыт, т.к. его категория скрыта)' : '' ?></span>
      <?php if (isset($product['uri'])): ?>
        <a target="_blank" href="<?= $product['uri'] ?>" title="Открыть страницу товара"><svg class="product-name__open-link-icon__svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link-icon lucide-external-link"><use href="#open-link"></use></svg></a>
      <?php endif ?>
    </div>

    <div class="product-name-cont__actions">
      Действия:
      <?php if ($product['hidden']): ?>
        <?php if (isset($product['uri'])): ?>
          <button class="js-unhide-btn product-name__btns__btn btn bs-like-btn bs-like-btn--info" title="Вернуть на сайт" type="button">
            <svg class="btn-w-icon__svg" width="16" height="16" viewBox="0 0 576 512"><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
          </button>
        <?php endif ?>  
      <?php else: ?>
        <?php if (isset($product['uri'])): ?>
          <button class="js-hide-btn product-name__btns__btn btn bs-like-btn bs-like-btn--info" title="Скрыть с сайта" type="button">
            <svg class="btn-w-icon__svg" width="16" height="16" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z"/></svg>
          </button>
        <?php endif ?>
      <?php endif ?>
      <button id="deleteBtn" class="btn bs-like-btn bs-like-btn--danger" title="Удалить" type="button">
        <svg class="btn-w-icon__svg" width="16" height="16" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
      </button>
    </div>
  </section>
</div>

<main class="main cont">
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <section class="delimited-section">
      <p class="field-section field-section--full-w">
        <span class="field-section__title">Название:</span>
        <input name="name" value="<?= htmlspecialchars($product['name']) ?>">
      </p>
      <p class="field-section field-section--short">
        <span class="field-section__title">Цена:</span>
        <input name="price" value="<?= $product['price'] ?>">
        &nbsp;<span class="text--smaller">бел. рублей</span>
      </p>
      <section class="field-section field-section--short">
        <span class="field-section__title"><span class="field-section--required__title"><abbr style="cursor: help;" title="Вариант размера товара или просто вариант товара">Размер</abbr></span>:</span>
        <input name="variant" value="<?= $product['variant'] ?>" required placeholder="100х600мм">
      </section>
      <section class="field-section field-section--full-w">
        <span class="field-section__title"><span class="field-section--required__title">Артикул</span>:</span>
        <input name="art" placeholder="1051-0000-75" value="<?= $product['art'] ?>">
      </section>
      <p class="d-flex-ai-center">
        <span>Принадлежит к категории:</span> &nbsp;&nbsp;
        <select name="category">
          <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $product['category_id'] == $cat['id'] ? 'selected' : '' ?>><?= $cat['name'] ?></option>
          <?php endforeach ?>
        </select>
      </p>
      <section class="field-section field-section--required field-section--full-w">
        <span class="field-section__title"><span class="field-section--required__title">Принадлежит к компании</span>:</span>
        <select name="company" required>
          <?php foreach ($companies as $comp): ?>
            <option value="<?= $comp['id'] ?>" <?= $product['company_id'] == $comp['id'] ? 'selected' : '' ?>><?= $comp['name'] ?></option>
          <?php endforeach ?>
        </select>
      </section>
      <?php if (isset($product['uri'])): ?>
        <p class="d-flex-ai-center">
          <span>Является хитом:</span> &nbsp;&nbsp;
          <label class="text--smaller-2 pos-fix-1" for="no">Нет</label>
          <input type="radio" id="no" name="hit" value="no" <?= $product['isHit'] === 0 ? 'checked' : '' ?>>
          &nbsp;&nbsp;
          <label class="text--smaller-2 pos-fix-1" for="yes">Да</label>
          <input type="radio" id="yes" name="hit" value="yes" <?= $product['isHit'] === 1 ? 'checked' : '' ?>>
        </p>
      <?php endif ?>
      <p class="d-flex-ai-center"><span>Единица измерения:</span> &nbsp;&nbsp;<input name="unit" value="<?= $product['unit'] ?>" class="input--small-w"> &nbsp;</p>
      <p class="d-flex-ai-center"><span>Упак. мал.:</span> &nbsp;&nbsp;<input name="upakMal" value="<?= $product['upakMal'] ?>" class="input--small-w"> &nbsp;</p>
      <p class="d-flex-ai-center"><span>Упак. круп.:</span> &nbsp;&nbsp;<input name="upakKrup" value="<?= $product['upakKrup'] ?>" class="input--small-w"> &nbsp;</p>
      <?php if (isset($product['uri'])): ?>
        <div>
          <p style="margin-bottom: 5px;">Вкладка "Описание":</p>
          <textarea name="description" class="textarea"><?= $product['description'] ?></textarea>
        </div>
        <div>
          <p style="margin-bottom: 5px;">Вкладка "Детали":</p>
          <textarea name="details" class="textarea"><?= $product['details'] ?></textarea>
        </div>
      <?php endif ?>

      <section class="form__section form__section--imgs">
        <div>
          <h2>Добавить картинки:</h2>

          <p style="position: relative; top: -5px;" class="hint">Рекомендуемый размер картинок: ≈714 пикселей в ширину и ≈952 пикселя в высоту (≈714 на ≈952)</p>
          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeMainImg">Поменять главную картинку:</label>
          <p><input type="file" id="changeMainImg" name="mainImg" accept="image/png, image/jpeg"></p>
          <div style="margin-bottom: 55px;" id="changeMainImgHolder" class="img-holder img-holder--smaller"></div>

          <?php if (isset($product['uri'])): ?>
            <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeGalImg">
              Добавить картинки в галерею:<br>
              <span style="position: relative; top: -5px;" class="hint">(Зажмите клавишу <code class="hint__keyboard-btn">Ctrl</code>, чтобы выбрать несколько)</span>
            </label>
            <p style="margin-top: 0;"><input type="file" multiple id="changeGalImg" name="galleryImgs[]"></p>
            <div class="gallery" id="changeGalImgHolder">
              <span class="text--smaller">Пока что добавленных картинок нет</span>
            </div>
          <?php endif ?>  
        </div>

        <div>
          <h2>Картинки текущие:</h2>

          <h3>Главная:</h3>
          <div class="img-holder" style="margin-bottom: 55px;">
            <img src="<?= $product['img'] ?>" alt="">
          </div>

          <?php if (isset($product['uri'])): ?>
            <h3>Галерея:</h3>
            <div id="currentGalleryImgs" class="gallery">
              <?php if (empty($product['galleryImgs'])): ?>
                <span class="text--smaller">На текущий момент товар не имеет картинок в галерее</span>
              <?php else: ?>
                <?php foreach (explode(',', $product['galleryImgs']) as $galImg): ?>
                  <div class="gallery__item">
                    <img src="<?= $galImg ?>" alt="">
                    <div class="gallery__item__x">x</div>
                  </div>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          <?php endif ?>
        </div>
      </section> 
    </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>