<body class="<?= $bodyClass ?? '' ?>">

<header class="header cont">
  <div class="text-with-icon text-with-icon--pin">
    <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/pin.svg" width="14" height="18">
    <div class="text-with-icon__text-cont text-with-icon--pin__text-cont">
      <a class="link--no-underline text--small" href="https://yandex.by/maps/29630/minsk-district/house/Zk4YcwBmSUYEQFtpfXRxeXxnYg==/?ll=27.576034%2C53.808047&z=16.62"><?= $address ?></a>
    </div>
  </div>
  <span class="header__text"><?= $workingHoursHeader ?></span>
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
        <a href="mailto:<?= $email ?>" class="link--no-underline text--semibold"><?= $email ?></a>
      </div>  
    </div>
  </div>
  <div class="header__row-2-col">
    <div class="text-with-icon <?= (empty($phones['header'][0]) || empty($phones['header'][1])) ? '' : 'header__text-with-icon--row-2-col-2' ?>">
      <img class="text-with-icon__icon" src="/front-end/site/assets/img/icons/phone.svg" width="18" height="18">
      <div class="text-with-icon__text-cont">
        <?php if (!empty($phones['header'][0])): ?>
          <a href="tel:<?= $phones['header'][0][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][0][1] ?></a><br>
        <?php endif ?>
        <?php if (!empty($phones['header'][1])): ?>
          <a href="tel:<?= $phones['header'][1][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][1][1] ?></a>
        <?php endif ?>
        <?php if (!empty($phones['header'][2][0])): ?>
          <br><a href="tel:<?= $phones['header'][2][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][2][1] ?></a>
        <?php endif ?>
        <?php if (!empty($phones['header'][3][0])): ?>
          <br><a href="tel:<?= $phones['header'][3][0] ?>" class="link--no-underline text--bold"><?= $phones['header'][3][1] ?></a>
        <?php endif ?>
      </div>
    </div>
    <div class="link-social-cont">
      <?php if (!empty($whatsapp)): ?>
        <a href="<?= $whatsapp ?>" class="link-social link-social--whatsapp">
          <img src="/front-end/site/assets/img/icons/whatsapp.svg" width="24" height="24" alt="Ссылка на Whatsapp">
        </a>
      <?php endif ?>
      <?php if (!empty($viber)): ?>
        <a href="<?= $viber ?>" class="link-social link-social--viber">
          <img src="/front-end/site/assets/img/icons/viber.svg" width="13" height="14" alt="Ссылка на Viber">
        </a>
      <?php endif ?>
      <?php if (!empty($telegram)): ?>
        <a href="<?= $telegram ?>" class="link-social link-social--telegram">
          <img src="/front-end/site/assets/img/icons/telegram.svg" width="24" height="24" alt="Ссылка на Telegram">
        </a>
      <?php endif ?>
    </div>
    <button id="btnDownloadPrice" class="btn btn--dropdown" type="button">
      <b>СКАЧАТЬ ПРАЙС</b>
      <img class="btn--dropdown__icon" src="/front-end/site/assets/img/icons/arrow-down.svg" width="17" height="10">
      <div class="btn--dropdown__list">
        <a class="btn--dropdown__list__item" href="/download-price"><b>Скачать прайс</b></a>
        <a class="btn--dropdown__list__item btn--dropdown__list__item--last" target="_blank" href="/table"><b>Посмотреть прайс</b></a>
      </div>
    </button>
    <button id="btnNav" class="btn-burger"><img src="/front-end/site/assets/img/icons/burger.svg" width="36" height="26"></button>
  </div>
</header>
<header class="header--mob cont--mob--fluid">
  <a class="header--mob__btn-phone header--mob__btn-phone--real" href="tel:+375445006080"><img src="/front-end/site/assets/img/icons/phone--larger.svg" width="32" height="28"></a>
  <button id="btnNavMob" class="header--mob__btn-phone"><img src="/front-end/site/assets/img/icons/burger.svg" width="36" height="26"></button>
</header>