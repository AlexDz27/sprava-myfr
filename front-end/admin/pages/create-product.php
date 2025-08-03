<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Создать товар</h2>
</section>

<main class="main cont">
  <form method="POST" enctype="multipart/form-data">
    <section class="field-section field-section--full-w">
      <span class="field-section__title">Название <span style="color: red;">*</span>:</span>
      <input name="name" required placeholder="Миксер для смесей оцинкованный SDS-plus, 100х600мм">
    </section>
    <section class="field-section field-section--short">
      <span class="field-section__title">Цена <span style="color: red;">*</span>:</span>
      <input name="price" required placeholder="10.00">
      &nbsp;<span class="text--smaller">бел. рублей</span>
    </section>
    <section class="field-section field-section--full-w">
      <span class="field-section__title">Принадлежит к категории <span style="color: red;">*</span>:</span>
      <select name="category" required>
        <option value="">-- Пожалуйста, выберите категорию --</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endforeach ?>
      </select>
    </section>
    <section class="field-section field-section--short">
      <span class="field-section__title">Единица измерения <span style="color: red;">*</span>:</span>
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
      <textarea name="description" placeholder="Для работ со всеми видами лакокрасочных материалов."></textarea>
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
          <div style="margin-bottom: 55px; min-height: 530px;" id="changeMainImgHolder" class="img-holder img-holder--smaller"></div>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeGalImg">Добавить картинки в галерею:</label>
          <p><input type="file" multiple id="changeGalImg" name="galleryImgs[]"></p>
          <div class="gallery" id="changeGalImgHolder">
            <span class="text--smaller">Пока что добавленных картинок нет</span>
          </div>  
        </div>
      </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить создание</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>