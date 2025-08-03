<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Обновить прайс</h2>
</section>

<main class="main cont">
  <form method="POST">
    <section class="delimited-section">
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

<?php require 'front-end/admin/parts/footer.php' ?>