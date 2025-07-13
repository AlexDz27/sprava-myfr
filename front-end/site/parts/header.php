<body>

<header class="header cont">
  <div class="text-with-icon text-with-icon--pin">
    <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/pin.svg" width="14" height="18">
    <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
      <a class="link--no-underline text--small" href="https://yandex.by/maps/29630/minsk-district/house/Zk4YcwBmSUYEQFtpfXRxeXxnYg==/?ll=27.576034%2C53.808047&z=16.62">223056, Минская обл., Минский р-н, Сеницкий с/с, д. 64, оф. 8</a>
    </div>
  </div>
  <span class="header__text">Режим работы: Пн-Пт: 8:30-17:00, вых.: Сб-Вс</span>
  <div class="header__row-2-col header__row-2-col--1">
    <a class="header__row-2-col__logo" href="/">
      <img src="/front-end/site/assets/img/logo.svg" width="148" height="20" alt="Логотип Sprava">
    </a>
    <div id="search" class="search header__search">
      <input id="searchInput" class="search__input" placeholder="Поиск товаров">
      <button class="btn-icon search__icon" type="button"><img src="/front-end/site/assets/img/icons/search.svg" width="15" height="14"></button>
      <div id="searchResults" class="search__results"></div>
    </div>
    <div class="text-with-icon header__text-with-icon--row-2-col-1">
      <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/envelope.svg" width="19" height="14">
      <div class="text-with-icon__text-cont">
        <a href="mailto:office@roshma.by" class="link--no-underline text--semibold">office@roshma.by</a>
      </div>  
    </div>
  </div>
  <div class="header__row-2-col">
    <div class="text-with-icon header__text-with-icon--row-2-col-2">
      <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/phone.svg" width="18" height="18">
      <div class="text-with-icon__text-cont">
        <a href="tel:<?= $phones['header'][0][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][0][1] ?></a><br>
        <a href="tel:<?= $phones['header'][1][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][1][1] ?></a>
      </div>
    </div>
    <div class="link-social-cont">
      <a href="https://wa.me/375445006080" class="link-social link-social--whatsapp">
        <img src="/front-end/site/assets/img/icons/whatsapp.svg" width="24" height="24" alt="Ссылка на Whatsapp">
      </a>
      <a href="viber://chat?number=%2B375445006080" class="link-social link-social--viber">
        <img src="/front-end/site/assets/img/icons/viber.svg" width="13" height="14" alt="Ссылка на Viber">
      </a>
      <a href="https://t.me/+375445006080" class="link-social link-social--telegram">
        <img src="/front-end/site/assets/img/icons/telegram.svg" width="24" height="24" alt="Ссылка на Telegram">
      </a>
    </div>
    <button id="btnDownloadPrice" class="btn btn--dropdown" type="button">
      <b>СКАЧАТЬ ПРАЙС</b>
      <img class="btn--dropdown__icon" src="/front-end/site/assets/img/icons/arrow-down.svg" width="17" height="10">
      <div class="btn--dropdown__list">
        <a class="btn--dropdown__list__item" href="/price-lists/todo-put-normal-link"><b>Скачать прайс</b></a>
        <a class="btn--dropdown__list__item" target="_blank" href="/table.php"><b>Посмотреть прайс</b></a>
      </div>
    </button>
    <button id="btnNav" class="btn-burger"><img src="/front-end/site/assets/img/icons/burger.svg" width="36" height="26"></button>
  </div>
</header>
<header class="header--mob cont--mob--fluid">
  <a class="header--mob__btn-phone header--mob__btn-phone--real" href="tel:+375445006080"><img src="/front-end/site/assets/img/icons/phone--larger.svg" width="32" height="28"></a>
  <button id="btnNavMob" class="header--mob__btn-phone"><img src="/front-end/site/assets/img/icons/burger.svg" width="36" height="26"></button>
</header>