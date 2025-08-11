<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Создать категорию</h2>
</section>

<main class="main cont">
  <form method="POST" enctype="multipart/form-data">
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title">Название</span>:</span>
      <input name="name" required placeholder="Базовый строительный инструмент">
    </section>
    <section class="field-section field-section--required field-section--full-w">
      <span class="field-section__title"><span class="field-section--required__title"><abbr title="Комбинация английских букв без пробелов. Тех. название будет использоваться внутри программного кода сайта">Техническое название</abbr></span>:</span>
      <input name="name_tech" required placeholder="baz-stroit-instr">
    </section>
    <section class="field-section field-section--textarea">
      <span class="field-section__title">Описание на главной странице в слайдере:</span>
      <textarea name="description" placeholder="- пункт 1
- пункт 2" class="textarea textarea--full textarea--w-code"></textarea>
    </section>
    <section class="field-section field-section--textarea">
      <span class="field-section__title">Перенос строк в названии категории (если нужно):</span>
      <textarea name="name_view" placeholder="Базовый строительный
инструмент" class="textarea textarea--small textarea--w-code"></textarea>
    </section>

    <section style="display: block;" class="form__section form__section--imgs">
        <div>
          <h2>Добавить главную картинку:</h2>

          <label style="display: inline-block;" class="btn-edit edit-form__btn-edit edit-form__btn-edit--w-auto" for="changeMainImg">Нажмите, чтобы добавить главную картинку:</label>
          <p><input type="file" id="changeMainImg" name="mainImg" accept="image/png, image/jpeg"></p>
          <div style="margin-bottom: 55px;" id="changeMainImgHolder" class="img-holder img-holder--smaller"></div>
        </div>
      </section>
    <button class="btn btn--admin" style="width: 100%;" type="submit">Подтвердить создание</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>