<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Создать товар</h2>
</section>

<main class="main cont">
  <form method="POST" enctype="multipart/form-data">
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title">Название</span>:</span>
      <input name="name" required placeholder="Миксер для смесей оцинкованный SDS-plus, 100х600мм">
    </section>
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title"><abbr title="Модель – это &quot;групировочное&quot; название товара. Оно используется, чтобы сгруппировать товары на веб-странице прайс-листа. Обычно это название товара без его деталей.">Модель</abbr></span>:</span>
      <input name="model" required placeholder="Миксер для смесей оцинкованный SDS-plus">
    </section>
    <section class="field-section field-section--required field-section--short">
      <span class="field-section__title"><span class="field-section--required__title">Цена</span>:</span>
      <input name="price" required placeholder="10.00">
      &nbsp;<span class="text--smaller">бел. рублей</span>
    </section>
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title">Принадлежит к категории</span>:</span>
      <select name="category" required>
        <option value="">-- Пожалуйста, выберите категорию --</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endforeach ?>
      </select>
    </section>
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title">Принадлежит к компании</span>:</span>
      <select name="company" required>
        <?php foreach ($companies as $comp): ?>
          <option value="<?= $comp['id'] ?>"><?= $comp['name'] ?></option>
        <?php endforeach ?>
      </select>
    </section>
    <section class="field-section field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title">Артикул</span>:</span>
      <input name="art" placeholder="1051-0000-75">
    </section>
    <section class="field-section field-section--required field-section--short">
      <span class="field-section__title"><span class="field-section--required__title">Единица измерения</span>:</span>
      <input name="unit" value="шт" required>
    </section>
    <section class="field-section field-section--short">
      <span class="field-section__title">Упак. мал.:</span>
      <input name="upakMal" value="1">
    </section>
    <section class="field-section field-section--short">
      <span class="field-section__title">Упак. круп.:</span>
      <input name="upakKrup" placeholder="10">
    </section>
    <section class="field-section field-section--textarea">
      <span class="field-section__title">Вкладка "Описание":</span>
      <textarea name="description" placeholder="Для смешивания тяжелых строительных масс."></textarea>
    </section>
    <section class="field-section field-section--textarea">
      <span class="field-section__title">Вкладка "Детали":</span>
      <textarea name="details"></textarea>
    </section>

    <section style="display: block;" class="form__section form__section--imgs">
        <div>
          <h2>Добавить главную картинку:</h2>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeMainImg">Нажмите, чтобы добавить главную картинку:</label>
          <p><input type="file" id="changeMainImg" name="mainImg" accept="image/png, image/jpeg"></p>
          <div style="margin-bottom: 55px;" id="changeMainImgHolder" class="img-holder img-holder--smaller"></div>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeGalImg">
            Добавить картинки в галерею:<br>
            <span style="position: relative; top: -5px;" class="hint">(Зажмите клавишу <code class="hint__keyboard-btn">Ctrl</code>, чтобы выбрать несколько)</span>
          </label>
          <p style="margin-top: 0;"><input type="file" multiple id="changeGalImg" name="galleryImgs[]"></p>
          <div id="addGalImgsCont" class="gallery">
            <span class="text--smaller">Пока что добавленных картинок нет</span>
          </div>  
        </div>
      </section>

    <button class="btn btn--admin" style="width: 100%;" type="submit">Подтвердить создание</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>