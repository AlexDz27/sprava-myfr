<?php require 'front-end/admin/parts/header.php' ?>

<div class="edit-product-header-section-grid cont">
  <section class="page-name page-name--pt-0">
    <h2>Редактирование товара</h2>
  </section>

  <img class="edit-product-header-section-grid__img" src="<?= $product['img'] ?>">

  <section class="product-name-cont">
    <span class="product-name"><?= $product['name'] ?> <span class="text--smaller">(<?= $product['art'] ?>)</span></span>
  </section>
</div>

<main class="main cont">
  <form method="POST">
    <section class="editable-datum">
      <p class="d-flex-ai-center"><span>Название:</span> &nbsp;&nbsp;<input name="name" value="<?= htmlspecialchars($product['name']) ?>" class="input--full-w"></p>
      <p class="d-flex-ai-center"><span>Цена:</span> &nbsp;&nbsp;<input name="price" value="<?= $product['price'] ?>" class="input--small-w"> &nbsp; <span class="text--smaller">бел. рублей</span></p>
      <p class="d-flex-ai-center">
        <span>Принадлежит к категории:</span> &nbsp;&nbsp;
        <select name="category">
          <option value="3">Кисти малярные</option>
          <option value="4">базраив</option>
          <option value="4">базраив qweqw wqewq wqe</option>
        </select>
      </p>
      <p class="d-flex-ai-center">
        <span>Является хитом:</span> &nbsp;&nbsp;
        <label class="text--smaller-2 pos-fix-1" for="no">Нет</label>
        <input type="radio" id="no" name="hit" <?= $product['isHit'] === 0 ? 'checked' : '' ?>>
        &nbsp;&nbsp;
        <label class="text--smaller-2 pos-fix-1" for="yes">Да</label>
        <input type="radio" id="yes" name="hit" value="yes" <?= $product['isHit'] === 1 ? 'checked' : '' ?>>
      </p>
      <p class="d-flex-ai-center"><span>Единица измерения:</span> &nbsp;&nbsp;<input name="unit" value="<?= $product['unit'] ?>" class="input--small-w"> &nbsp;</p>
      <p class="d-flex-ai-center"><span>Упак. мал.:</span> &nbsp;&nbsp;<input name="upakMal" value="<?= $product['upakMal'] ?>" class="input--small-w"> &nbsp;</p>
      <p class="d-flex-ai-center"><span>Упак. круп.:</span> &nbsp;&nbsp;<input name="upakKrup" value="<?= $product['upakKrup'] ?>" class="input--small-w"> &nbsp;</p>
      <div>
        <p style="margin-bottom: 5px;">Вкладка "Детали":</p>
        <textarea name="details" class="textarea"><?= $product['details'] ?></textarea>
      </div>

      <section class="form__section form__section--imgs">
        <div>
          <h2>Добавить картинки:</h2>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeMainImg">Поменять главную картинку:</label>
          <p><input type="file" id="changeMainImg" name="mainImg" accept="image/png, image/jpeg"></p>
          <div style="margin-bottom: 55px;" id="changeMainImgHolder" class="img-holder img-holder--smaller"></div>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeGalImg">Добавить картинки в галерею:</label>
          <p><input type="file" multiple id="changeGalImg" name="galleryImgs[]"></p>
          <div class="gallery" id="changeGalImgHolder">
            <span class="text--smaller">Пока что добавленных картинок нет</span>
          </div>  
        </div>

        <div>
          <h2>Картинки текущие:</h2>

          <h3>Главная:</h3>
          <div class="img-holder" style="margin-bottom: 55px;">
            <img src="<?= $product['img'] ?>" alt="">
          </div>

          <h3>Галерея:</h3>
          <div id="currentGalleryImgs" class="gallery">
            <?php foreach (explode(',', $product['galleryImgs']) as $galImg): ?>
              <div class="gallery__item">
                <img src="<?= $galImg ?>" alt="">
                <div class="gallery__item__x">x</div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </section> 
    </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>