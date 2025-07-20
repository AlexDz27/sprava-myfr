<?php require 'front-end/site/parts/head.php' ?>
<?php require 'front-end/site/parts/header.php' ?>

<section class="section-design--about">
  <div class="cont section-design--about__cont">
    <b class="text-design">ЛУЧШИЕ В СВОЕМ ДЕЛЕ!</b>
    <img class="section-design--about__logo" src="./front-end/site/assets/img/logo--big-2.svg" width="756" height="110" alt="Логотип Sprava">
    <img class="section-design--about__logo--mob" src="./front-end/site/assets/img/logo--mob.svg" width="313" height="48" alt="Логотип Sprava">
    <h1 class="text--big section-design--about__text--big">Оптовые поставки строительных материалов</h1>
  </div>
</section>

<section class="section-design--trust">
  <div class="cont">
    <img class="section-design--trust__logo" src="./front-end/site/assets/img/logo--trust.svg" width="162" height="162" alt="Логотип Sprava">
  </div>
  <div class="cont--mob section-design--trust--mob__btn__cont">
    <button id="btnDownloadPriceMob" class="section-design--trust--mob__btn btn btn--dropdown" type="button">
      <b>СКАЧАТЬ ПРАЙС</b>
      <img class="btn--dropdown__icon section-design--trust--mob__btn__icon" src="./front-end/site/assets/img/icons/arrow-down.svg" width="17" height="10">
      <div class="btn--dropdown__list">
        <a class="btn--dropdown__list__item" href="/price-lists/todo-pricelist-link"><b>Скачать прайс</b></a>
        <a class="btn--dropdown__list__item" href="table.php"><b>Посмотреть прайс</b></a>
      </div>
    </button>
  </div>
</section>

<section class="section section--cat">
  <div class="cont cont--mob--fluid">
    <h2 class="title-section title-section--mb section--cat__title-section">Категории товаров</h2>

    <div class="slider">
      <div class="slider__wrapper">
        <button id="btnPrev" class="btn-slider slider__btn-slider btn-slider--prev slider__btn-slider--prev btn-slider--inactive" type="button" disabled>
          <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
          </svg>
        </button>
        <div id="track" class="slider__track">
          <div class="card">
            <div class="card__img-cont">
              <img class="card__img card__img--down--mob" src="./front-end/site/assets/img/products/kisti/0110-0000-25_2.jpg" alt="Кисти малярные">
            </div>
            <h3 class="card__title">Кисти малярные</h3>
            <ul class="card__list">
              <li class="text--larger"><span class="card__list__item-text">Кисти плоские (флейцевые)</span></li>
              <li class="text--larger"><span class="card__list__item-text">Кисти лавковец (макловицы)</span></li>
              <li class="text--larger"><span class="card__list__item-text">Кисти радиаторные</span></li>
            </ul>
            <a class="btn card__btn" href="/catalog#kisti"><b>В КАТАЛОГ</b></a>
          </div>

          <div class="card">
            <div class="card__img-cont">
              <img class="card__img card__img--down--mob" src="./front-end/site/assets/img/products/valiki/0302-22400000_1.jpg" alt="Валики малярные">
            </div>
            <h3 class="card__title">Валики малярные</h3>
            <ul class="card__list">
              <li class="text--larger"><span class="card__list__item-text">Ролики малярные (запаски, шубки)</span></li>
              <li class="text--larger"><span class="card__list__item-text">Ручки для роликов (запасок)</span></li>
              <li class="text--larger"><span class="card__list__item-text">Валики малярные</span></li>
            </ul>
            <a class="btn card__btn" href="/catalog#valiki"><b>В КАТАЛОГ</b></a>
          </div>

          <div class="card">
            <div class="card__img-cont">
              <img class="card__img card__img--down--mob" src="./front-end/site/assets/img/products/abraziv/2897-0125-10_1.jpg" alt="Абразивные алмазные материалы и оснастка">
            </div>
            <h3 class="card__title card__title--w-2nd-line">Абразивные алмазные <span class="card__title__2nd-line card__title__2nd-line--abraziv">материалы и оснастка</span></h3>
            <ul class="card__list card__list--w-2nd-line">
              <li class="text--larger"><span class="card__list__item-text">Отрезные круги</span></li>
              <li class="text--larger"><span class="card__list__item-text">Алмазные диски</span></li>
              <li class="text--larger"><span class="card__list__item-text">Лепестковые круги</span></li>
              <li class="text--larger"><span class="card__list__item-text">Насадки</span></li>
              <li class="text--larger"><span class="card__list__item-text">Кордщетки</span></li>
            </ul>
            <a class="btn card__btn" href="/catalog#abraziv"><b>В КАТАЛОГ</b></a>
          </div>

          <div class="card">
            <div class="card__img-cont">
              <img class="card__img card__img--down--mob" src="./front-end/site/assets/img/products/nozhi/0890-0000-18_6.jpg" alt="Ножи и лезвия">
            </div>
            <h3 class="card__title">Ножи и лезвия</h3>
            <ul class="card__list">
              <li class="text--larger"><span class="card__list__item-text">Лезвия запасные для ножей</span></li>
              <li class="text--larger"><span class="card__list__item-text">Ножи обойные</span></li>
            </ul>
            <a class="btn card__btn" href="/catalog#nozhi"><b>В КАТАЛОГ</b></a>
          </div>

          <div class="card card--bad-pr">
            <div class="card__img-cont">
              <img class="card__img card__img--bad" src="./front-end/site/assets/img/products/vspomogat/0990-0600-12_2.jpg" alt="Вспомогательный инструмент">
            </div>
            <h3 class="card__title card__title--w-2nd-line">Вспомогательный <span class="card__title__2nd-line card__title__2nd-line--abraziv">инструмент</span></h3>
            <ul class="card__list card__list--w-2nd-line">
              <li class="text--larger"><span class="card__list__item-text">Шпатели</span></li>
              <li class="text--larger"><span class="card__list__item-text">Миксеры для смесей и краски</span></li>
              <li class="text--larger"><span class="card__list__item-text">Пистолеты для пены и герметиков</span></li>
              <li class="text--larger"><span class="card__list__item-text">Прочий вспомогательный инструмент</span></li>
            </ul>
            <a class="btn card__btn" href="/catalog#vspomogat"><b>В КАТАЛОГ</b></a>
          </div>
        </div>
        <button id="btnNext" class="btn-slider slider__btn-slider btn-slider--next slider__btn-slider--next" type="button">
          <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
          </svg>
        </button>
      </div>

      <div id="dots" class="slider__dots">
        <span class="slider__dots__dot slider__dots__dot--active"></span>
      </div>

      <div class="slider__btns-mob">
        <button id="btnPrevMob" class="btn-slider btn-slider--mob slider__btn-slider btn-slider--prev slider__btn-slider--prev btn-slider--inactive" type="button" disabled>
          <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9644 22L1.7554 12.2234C1.3438 11.8292 1.34434 11.1713 1.75657 10.7778L12 1" stroke="white" stroke-width="2.62591"/>
          </svg>
        </button>
        <button id="btnNextMob" class="btn-slider btn-slider--mob slider__btn-slider btn-slider--next slider__btn-slider--next" type="button">
          <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.03235 23L11.3454 13.1896C11.7121 12.8033 11.7116 12.1972 11.3442 11.8115L2 2" stroke="white" stroke-width="3"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

<section class="section section--cap">
  <div class="cont">
    <h2 class="title-section title-section--mob">Арсенал наших возможностей<br> для розничных магазинов</h2>
    <div class="items-spaced-list-design">
      <div class="items-spaced-list-design__item">
        <div class="items-spaced-list-design__num">
          1
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Гарантия на товар</h3>
          <p class="title-and-text__text card__list text--larger">Мы строго следим за своей репутацией. Если вы нашли любой дефект в нашем инструменте — сообщите сотруднику компании. Мы моментально заменим товар, без формальностей и ожиданий.</p>
        </div>
      </div>

      <div class="items-spaced-list-design__item">
        <div class="items-spaced-list-design__num">
          2
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Цена<br class="br--mob"> и качество</h3>
          <p class="title-and-text__text card__list text--larger">Мы следим за отзывами покупателей и ценами конкурентов. Наш отдел закупок  ежедневно работает над улучшением качества товара и поиском самых выгодных цен. Мы — лучшие в своём деле.</p>
        </div>
      </div>

      <div class="items-spaced-list-design__item items-spaced-list-design__item--mb-bc-little-text-in-5">
        <div class="items-spaced-list-design__num">
          3
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Партнёрство на высшем уровне</h3>
          <p class="title-and-text__text card__list text--larger">Чем больше вы разбираетесь в бизнесе строительных материалов, тем выгоднее для вас. Мы отслеживаем рынок и знаем все предложения. Нашли дешевле и качественнее? Скажите об этом нашему сотруднику и получите более выгодное предложение!</p>
        </div>
      </div>

      <div class="items-spaced-list-design__item">
        <div class="items-spaced-list-design__num">
          4
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Работаем<br class="br--mob"> по всей Беларуси</h3>
          <p class="title-and-text__text card__list text--larger">Мы всегда рядом с вами! Наши торговые представители работают во всех городах. Нам важно, чтобы любой ваш вопрос был решён в самый короткий срок.</p>
        </div>
      </div>

      <div class="items-spaced-list-design__item">
        <div class="items-spaced-list-design__num">
          5
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Экспресс-доставка</h3>
          <p class="title-and-text__text card__list text--larger">Доставка за наш счёт!<br> Без ограничений суммы! В любую точку Беларуси! Быстро!</p>
        </div>
      </div>

      <div class="items-spaced-list-design__item">
        <div class="items-spaced-list-design__num">
          6
        </div>
        <div>
          <h3 class="title-and-text__title card__title">Только мастера своего дела</h3>
          <p class="title-and-text__text card__list text--larger">Наши торговые представители имеют большой опыт, готовы помочь решить любой ваш вопрос.</p>
        </div>
      </div>
      <div class="items-spaced-list-design__line"></div>
    </div>
  </div>
</section>

<section class="section section--black section--with-lines">
  <div class="cont">
    <h2 class="title-section section--black__title-section title-section--mob">Ваш надежный партнер<br class="br--mob"> в мире<br class="br--desk"> строительных инструментов</h2>

    <div class="card card--full">
      <h3 class="text--significance card--full__point">История бренда</h3>
      <p class="card--full__section-start-p"><b class="text--significance--smaller">Из новичков — в лучших поставщиков строительных инструментов.</b></p>
      <p class="text--larger card--full__closer-p card--full__points-cont__preface-p">В 2016 году всё началось с одного контейнера — 25 тонн инструмента. Сегодня это:</p>
      <div class="card--full__points">
        <p class="text--larger">
          <b class="text--significance--smaller">более 2000 клиентов</b><br>
          для которых наш бренд стал синонимом качества, надёжности и удобства
        </p>
        <p class="text--larger">
          <b class="text--significance--smaller">более 700 тонн</b><br>
          товаров в год
        </p>
        <p class="text--larger">
          <b class="text--significance--smaller">50 сотрудников</b><br>
          объединённых одной целью
        </p>
      </div>
      <p class="text--larger card--full__points__postface-p">Мы выросли не из числа поставок, а из доверия тех, кто с нами работает. Мы строим бренд, который поддерживает мастеров в деле.</p>

      <h3 class="text--significance card--full__point">Миссия бренда</h3>
      <p class="card--full__section-start-p"><b class="text--significance--smaller">Дать каждому мастеру инструмент, которому можно доверять.</b></p>
      <p class="text--larger card--full__closer-p card--full__points-cont__preface-p card--full__last-p">Мы стремимся завоевать доверие конечных пользователей и сделать бренд узнаваемым и любимым. Наш фокус внимания направлен на качество, отличный сервис и стабильность на долгосрочной основе. В каждой кисточке, валике и отрезном круге — наша ответственность.</p>

      <br class="br--desk">
      <br class="br--desk">
      <a id="learnMoreLink" class="card__link--red" href="/about-company" onclick="learnMoreLink"><b>Узнать о нас больше</b></a>
      <br class="br--mob">
    </div>
  </div>

  <div class="the-best-and-logo-line">
    <div class="the-best">
      Лучшие в своем деле!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Лучшие в своем деле!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Лучшие в своем деле!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Лучшие в своем деле!
    </div>
    <div class="logo-line">
      <img src="./front-end/site/assets/img/logo--line.svg">
      <img src="./front-end/site/assets/img/logo--line.svg">
      <img src="./front-end/site/assets/img/logo--line.svg">
      <img src="./front-end/site/assets/img/logo--line.svg">
    </div>
  </div>
</section>

<?php require 'front-end/site/parts/contacts.php' ?>

<script>
  const learnMoreLink = document.getElementById('learnMoreLink')
  learnMoreLink.onclick = (e) => {
    e.preventDefault()

    sessionStorage.setItem('shouldScrollToSection', 'true')
    window.location.href = '/about-company'
  }

  if (window.location.hash) {
    smoothScrollTo(document.getElementById('contacts').offsetTop, 1000)
  }

  document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('a[href="/#contacts"]')
    links.forEach(l => {
      l.onclick = (e) => {
        e.preventDefault()

        overlay.classList.remove('overlay--db')
        overlay.classList.remove('overlay--blur')
        nav.classList.remove('nav--db')
        nav.classList.remove('nav--active')
        navMob.classList.remove('nav-mob--active')
        smoothScrollTo(document.getElementById('contacts').offsetTop, 1000)
      }
    })
  })


  function smoothScrollTo(targetPosition, duration) {
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    let startTime = null;
    
    function animation(currentTime) {
      if (!startTime) startTime = currentTime;
      const timeElapsed = currentTime - startTime;
      const progress = Math.min(timeElapsed / duration, 1);
      
      // Easing function (easeInOutQuad)
      const ease = progress < 0.5 
      ? 2 * progress * progress 
      : 1 - Math.pow(-2 * progress + 2, 2) / 2;
      
      window.scrollTo(0, startPosition + (distance * ease));
      
      if (timeElapsed < duration) {
        requestAnimationFrame(animation);
      }
    }
    
    requestAnimationFrame(animation);
  }
</script>

<?php require 'front-end/site/parts/footer.php' ?>