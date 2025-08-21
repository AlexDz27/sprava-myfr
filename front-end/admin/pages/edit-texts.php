<?php // var_dump(get_defined_vars()); die(); ?>

<?php require 'front-end/admin/parts/header.php' ?>

<section class="page-name cont">
  <h2>Редактирование текстов</h2>
</section>

<main class="main cont">
  <form method="POST">
    <section class="delimited-section">
      <h3>Телефоны</h3>
      <p>Телефон первый: &nbsp;<input name="<?= $phones[0]['id'] ?>" value="<?= $phones[0]['text'] ?>"></p>
      <p><abbr title="Если во втором телефоне в скобках в конце добавлять ещё номера по типу (31, 33, 42), то эти новые номера будут отображаться на сайте">Телефон второй</abbr>: &nbsp;<input name="<?= $phones[1]['id'] ?>" value="<?= $phones[1]['text'] ?>"></p>
      <p></p>
    </section>

    <section class="delimited-section">
      <h3>Адрес:</h3>
      <textarea name="<?= $address['id'] ?>" class="textarea"><?= $address['text'] ?></textarea>
    </section>

    <section class="delimited-section">
      <h3>Режим работы:</h3>
      <input name="<?= $workingHours['id'] ?>" value="<?= $workingHours['text'] ?>" style="width: 100%;">
    </section>

    <section class="delimited-section">
      <h3>Электронная почта:</h3>
      <input name="" value="todo: e-mail">
    </section>

    <section class="delimited-section">
      <h3><abbr style="cursor: help;" title="Если убрать текст из поля, то соцсеть не будет показываться на сайте">Соцсети</abbr> и ссылки на них:</h3>
      <p>Whatsapp: &nbsp;<input name="" value=""></p>
      <p>Viber: &nbsp;<input name="" value=""></p>
      <p>Telegram: &nbsp;<input name="" value=""></p>
    </section>

    <button style="width: 100%;" class="btn btn--admin" type="submit">Подтвердить редактирование</button>
  </form>
</main>

<?php require 'front-end/admin/parts/footer.php' ?>