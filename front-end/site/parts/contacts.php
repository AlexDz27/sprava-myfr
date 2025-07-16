<section id="contacts" class="section section--black pb section--contacts">
  <h2 class="title-section section--black__title-section">Наши контакты</h2>

  <div class="contacts__cont">
    <div class="cont contacts__col-left">
      <p class="text--big p--lower-margin p--no-mt">ООО “Рошма”</p>
      <p class="text--big p--lower-margin">Адрес офиса и склада:</p>
      <div class="text-with-icon">
        <img class="text-with-icon__icon text-with-icon__icon--more-centered" src="/front-end/site/assets/img/icons/pin--larger.svg" width="17" height="23">
        <div class="admin-hack__address--contacts text-with-icon__text-cont text-with-icon--pin__text-cont">
          <a href="https://yandex.by/maps/29630/minsk-district/house/Zk4YcwBmSUYEQFtpfXRxeXxnYg==/?ll=27.576034%2C53.808047&z=16.62" class="link--no-underline text--larger"><?= $address ?></a>
        </div>
      </div>
      <p class="text--big p--lower-margin">Режим работы:</p>
      <div class="text-with-icon">
        <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/clock.svg" width="20" height="20">
        <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
          <span class="text--larger"><b>Пн-пт</b>: 8:30-17:00, <b>выходные</b>: суббота, воскресенье</span>
        </div>
      </div>
      <p class="text--big p--lower-margin">Телефоны:</p>
      <div class="text-with-icon">
        <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/phone--larger.svg" width="24" height="22">
        <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
          <span class="text--larger"><a class="link--no-underline" href="tel:<?= $phones['contacts'][0][0] ?>"><?= $phones['contacts'][0][1] ?></a>,<br class="show-below-577"> <a class="link--no-underline" href="tel:<?= $phones['contacts'][1][0] ?>"><?= $phones['contacts'][1][1] ?></a>,
            <br>
            <?php for ($i = 2; $i < count($phones['contacts']); $i++): ?>
              <a class="link--no-underline" href="tel:<?= $phones['contacts'][$i][0] ?>"><?= $phones['contacts'][$i][1] ?></a><?php if ($i + 1 < count($phones['contacts'])) echo ', <br class="show-below-577">' ?>
            <?php endfor ?>
          </span>
        </div>
      </div>
      <p class="text--big p--lower-margin">E-mail:</p>
      <div class="text-with-icon">
        <img class="text-with-icon__icon text-with-icon__icon--envelope--larger" src="/front-end/site/assets/img/icons/envelope--larger.svg" width="24" height="18">
        <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
          <a href="mailto:office@roshma.by" class="link--no-underline text--larger">office@roshma.by</a>
        </div>
      </div>
      <p class="link-social-cont link-social-cont--farther">
        <a href="https://wa.me/375445006080" class="link-social link-social--whatsapp link-social--mob">
          <img src="/front-end/site/assets/img/icons/whatsapp.svg" width="24" height="24" alt="Ссылка на Whatsapp">
        </a>
        <a href="viber://chat?number=%2B375445006080" class="link-social link-social--viber link-social--mob">
          <img src="/front-end/site/assets/img/icons/viber.svg" width="13" height="14" alt="Ссылка на Viber">
        </a>
        <a href="https://t.me/+375445006080" class="link-social link-social--telegram link-social--mob">
          <img src="/front-end/site/assets/img/icons/telegram.svg" width="24" height="24" alt="Ссылка на Telegram">
        </a>
      </p>
    </div>
    <div class="map__cont cont contacts__col-right">
      <div id="map" style="max-width: 780px; height: 400px; border-radius: 35px; margin: 0 auto;"></div>
      <a class="open-in-ymaps-btn" href="https://yandex.by/maps/29630/minsk-district/house/Zk4YcwBmSUYEQFtpfXRxeXxnYg==/?ll=27.576034%2C53.808047&z=16.62" target="_blank">
        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1a9.002 9.002 0 0 0-6.366 15.362c1.63 1.63 5.466 3.988 5.693 6.465.034.37.303.673.673.673.37 0 .64-.303.673-.673.227-2.477 4.06-4.831 5.689-6.46A9.002 9.002 0 0 0 12 1zm0 12.079a3.079 3.079 0 1 1 0-6.158 3.079 3.079 0 0 1 0 6.158z" fill="#DF2623"></path></svg>
        Открыть в Яндекс.Картах
      </a>
    </div>
  </div>

  <div class="cont contacts__cont-2">
    <div>
      <h3 class="title-and-text__title card__title">Работаем по всей Беларуси</h3>
      <p class="title-and-text__text card__list text--larger">Мы всегда рядом с вами! Наши торговые представители работают во всех городах. Нам важно, чтобы любой ваш вопрос был решён в самый короткий срок.</p>
    </div>
    <div>
      <h3 class="title-and-text__title card__title">Экспресс-доставка</h3>
      <p class="title-and-text__text card__list text--larger">Доставка за наш счёт! Без ограничений суммы!<br>В любую точку Беларуси! Быстро!</p>
    </div>
    <div class="items-spaced-list-design__line contacts__cont-2__items-spaced-list-design__line"></div>
  </div>
</section>