<?php

// TODO: d
// var_dump($products);
// var_dump($productsCatSlidesCount);
// die();

?>

<?php require 'front-end/site/parts/head.php' ?>
<?php require 'front-end/site/parts/header.php' ?>

<style>
  .t__img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
</style>

<section class="page-title-cont section-design--about">
  <div class="cont yellow">
    <nav>
      <a class="yellow__link" href="/">Главная</a>
      <a class="yellow__link yellow__link--active" href="catalog.html">Каталог</a>
    </nav>
    <h1 class="text--big yellow__title">Каталог</h1>
  </div>
</section>

<section class="section section--black section--black--more-pt section--black--contacts section--black--contacts--cat">
  <div class="cont--mob--fluid yellow shown-below-630">
    <nav>
      <a class="yellow__link" href="/">Главная</a>
      <a class="yellow__link yellow__link--active" href="catalog.html">Каталог</a>
    </nav>
  </div>

  <div class="cont">
    <div id="qs" class="qs__cont">
      <?php for ($i = 0; $i < count($categories); $i++): $c = $categories[$i]; ?>
        <a href="#<?= $c['name_tech'] ?>" id="<?= $c['name_tech'] ?>" class="q <?= $i == 0 ? 'q--active' : '' ?> <?= $c['name_view'] ? 'q--with-second-line' : '' ?>" >
          <?php if ($c['name_view']): ?>
            <span class="q__text--with-second-line"><?= $c['name_view'][0] ?><span class="card__title__2nd-line"> <?= $c['name_view'][1] ?></span></span>
          <?php else: ?>
            <?= $c['name'] ?>
          <?php endif ?>
        </a>
      <?php endfor ?>
    </div>

    <h2 id="titleSection" class="title-section title-section--mob"><?= $categories[0]['name'] ?></h2>

    <!-- k Slider here -->
    <div class="slider--cat">
      <div id="track" class="slider--cat__track t-list__mb">
        <div class="t-list">
          <div class="t-list__ts">
            <?php $count = count($products[$categories[0]['name_tech']]); ?>
            <?php for ($i = 0; $i <= 15; $i++): $product = $products[$categories[0]['name_tech']][$i]; ?>
              <div class="t <?= $product['isHit'] ? 't--hit' : '' ?>">
                <p class="t__iz"><?= $i + 1 ?> из <?= $count ?></p>
                <div class="t__body">
                  <div class="t__img-cont <?= $i === 1 ? 't__img-cont--kist-2' : '' ?>">  <!-- TODO: mb bad here? Yes, but later. -->
                    <img width="150" height="150" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                  </div>
                  <div class="t__text">
                    <p><?= $product['name'] ?></p>
                    <p class="text--semibold"><?= $product['price'] ?> BYN<br>(с НДС 20%) / <?= $product['unit'] ?></p>
                    <a class="btn card__btn t__btn" href="javascript:void(0)"><b>Подробнее</b></a>
                  </div>
                </div>
              </div>
            <?php endfor ?>
          </div>
          <div class="t-list__slider-btns">
            <div class="slider__btns">
              <button class="js__btn-slider-prev btn-slider btn-slider--inactive" disabled>
                <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
                </svg>
              </button>
              <div id="dots" class="js__slider-dots slider__dots slider__dots--cat">
                <span class="slider__dots__dot slider__dots__dot--active"></span>
                <span class="slider__dots__dot"></span>
              </div>
              <button class="js__btn-slider-next btn-slider">
                <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="t-list__open-full-list-btn-cont">
            <button id="collapseDesk" class="btn product__btn btn-collapse btn-collapse--desk btn-collapse--show" style=""><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
          </div>
        </div>

        <div class="t-list t-list--no-stretch">
          <div class="t-list__ts">
            <?php for ($i = 16; $i < $count; $i++): $product = $products[$categories[0]['name_tech']][$i]; ?>
              <div class="t <?= $product['isHit'] ? 't--hit' : '' ?>">
                <p class="t__iz"><?= $i + 1 ?> из <?= $count ?></p>
                <div class="t__body">
                  <div class="t__img-cont">
                    <img width="150" height="150" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                  </div>
                  <div class="t__text">
                    <p><?= $product['name'] ?></p>
                    <p class="text--semibold"><?= $product['price'] ?> BYN<br>(с НДС 20%) / <?= $product['unit'] ?></p>
                    <a class="btn card__btn t__btn" href="javascript:void(0)"><b>Подробнее</b></a>
                  </div>
                </div>
              </div>
            <?php endfor ?>
          </div>
          <div class="t-list__slider-btns">
            <div class="slider__btns">
              <button class="js__btn-slider-prev btn-slider">
                <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
                </svg>
              </button>
              <div id="dots" class="js__slider-dots slider__dots slider__dots--cat">
                <span class="slider__dots__dot"></span>
                <span class="slider__dots__dot slider__dots__dot--active"></span>
              </div>
              <button class="js__btn-slider-next btn-slider btn-slider--inactive" disabled>
                <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <button id="collapse" class="btn product__btn btn-collapse btn-collapse--show"><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
    </div>
  </div>
</section>

<!-- todo: там будет что-то уникальное?: только тот класс для второй кисти -->
 <!-- TODO: доты (php);  -->
<!-- TODO: LINKS EVERYWHERE WHERE Подробнее -->  
<?php foreach ($productsCatSlidesCount as $cat => $slidesCount): ?>
  <template id="tmpl-<?= $cat ?>">
    <?php for ($s = 1; $s <= $slidesCount; $s++): ?>
      <div class="t-list <?= $s > 1 ? 't-list--no-stretch' : '' ?>">
        <div class="t-list__ts">
          <?php $count = count($products[$cat]); ?>
          <?php for ($i = 0; $i <= 15; $i++): $product = $products[$cat][$i]; ?>
            <div class="t <?= $product['isHit'] ? 't--hit' : '' ?>">
              <p class="t__iz"><?= $i + 1 ?> из <?= $count ?></p>
              <div class="t__body">
                <div class="t__img-cont <?= $i === 1 ? 't__img-cont--kist-2' : '' ?>">
                  <img width="150" height="150" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="t__text">
                  <p><?= $product['name'] ?></p>
                  <p class="text--semibold"><?= $product['price'] ?> BYN<br>(с НДС 20%) / <?= $product['unit'] ?></p>
                  <a class="btn card__btn t__btn" href="#"><b>Подробнее</b></a>
                </div>
              </div>
            </div>
          <?php endfor ?>
        </div>
        <div class="t-list__slider-btns">
          <div class="slider__btns">
            <button class="js__btn-slider-prev btn-slider btn-slider--inactive" disabled>
              <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
              </svg>
            </button>
            <div id="dots" class="js__slider-dots slider__dots slider__dots--cat">
              <span class="slider__dots__dot <?= $s === 1 ? 'slider__dots__dot--active' : '' ?>"></span>
              <span class="slider__dots__dot <?= $s === 2 ? 'slider__dots__dot--active' : '' ?>"></span>
            </div>
            <button class="js__btn-slider-next btn-slider">
              <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="t-list__open-full-list-btn-cont">
          <button id="collapseDesk" class="btn product__btn btn-collapse btn-collapse--desk btn-collapse--show" style=""><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
        </div>
      </div>
    <?php endfor ?>
  </template>
<?php endforeach ?>

<script>
  // TODO: put this into main.js and then think how to handle TypeErrors when an element is absent
  const CATALOG_track = document.getElementById('track')

  // TODO: def need work here with the logic. check line 149)))
  /** CATALOG CATEGORIES TOGGLE **/
  let currentCategory = null
  const btnKisti = document.getElementById('kisti')
  const btnAbraziv = document.getElementById('abraziv')
  const btnValiki = document.getElementById('valiki')
  const btnVspomogat = document.getElementById('vspomogat')
  const btnNozhi = document.getElementById('nozhi')
  const titleSection = document.getElementById('titleSection')
  const catBtns = [btnKisti, btnAbraziv, btnValiki, btnVspomogat, btnNozhi]
  for (const btn of catBtns) {
    btn.onclick = (e) => {
      e.preventDefault()
      history.pushState(null, null, btn.href);
      listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER

      currentCategory = btn.id
      document.querySelectorAll('.t-list').forEach(t => t.remove())
      CATALOG_track.append(document.getElementById('tmpl-' + currentCategory).content.cloneNode(true))
      setElements()
      const evt = new CustomEvent('changeOfCat', {
        detail: {currentCat: btn.id}
      })
      window.dispatchEvent(evt)

      document.querySelector('.q--active').classList.remove('q--active')
      btn.classList.add('q--active')
      titleSection.textContent = btn.textContent
    }
  }

  /** LIST VIEW LOGIC **/
  const LIST_VIEW_STATE = {
    SHOW_FULL_LIST: 'SHOW_FULL_LIST',
    SHOW_IN_SLIDER: 'SHOW_IN_SLIDER'
  }
  let listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER

  // TODO: mb this won't work cuz now i use qsAll(.t-list)
  let collapseBtn = document.getElementById('collapse')
  let collapseDeskBtn = document.getElementById('collapseDesk')
  let CATALOG_sliderBtns = document.querySelector('.slider__btns')
  let firstTList = document.querySelector('.t-list')
  let otherTLists = document.querySelectorAll('.t-list--no-stretch')
  function setElements() {
    firstTList = document.querySelector('.t-list')
    otherTLists = document.querySelectorAll('.t-list--no-stretch')
    if (window.innerWidth <= 670) {
      tListManipulations()
    }

    CATALOG_sliderBtns = document.querySelector('.slider__btns')
    collapseBtn = document.getElementById('collapse')
    collapseDeskBtn = document.getElementById('collapseDesk')

    Array.from([collapseBtn, collapseDeskBtn]).forEach(i => {
      i.onclick = () => {
        listViewState = listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER ? LIST_VIEW_STATE.SHOW_FULL_LIST : LIST_VIEW_STATE.SHOW_IN_SLIDER

        if (listViewState === LIST_VIEW_STATE.SHOW_FULL_LIST) {
          if (window.innerWidth > 670) tListManipulations()
          firstTList.querySelector('.t-list__ts').classList.add('t-list--return')
          CATALOG_sliderBtns.classList.add('slider__btns--hidden')
          i.innerHTML = '<b>СВЕРНУТЬ СПИСОК</b>'
          i.classList.remove('btn-collapse--show')
          i.classList.add('btn-collapse--collapse')
        } else if (listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER) {
          if (window.innerWidth > 670) undoTListManipulations()
          firstTList.querySelector('.t-list__ts').classList.remove('t-list--return')
          CATALOG_sliderBtns.classList.remove('slider__btns--hidden')
          i.innerHTML = '<b>ОТКРЫТЬ ВЕСЬ СПИСОК</b>'
          i.classList.remove('btn-collapse--collapse')
          i.classList.add('btn-collapse--show')
          smoothScrollTo(document.getElementById('qs').offsetTop - 30, 800)
        }
      }
    })

    // fix bug: when on mobile, when opened, click btn.id -> not correct state of LIST_VIEW_STATE
    // WARNING: COPY-PASTE FROM 642-648
    if (window.innerWidth <= 670) {
      listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER
      if (window.innerWidth > 670) undoTListManipulations()
      firstTList.querySelector('.t-list__ts').classList.remove('t-list--return')
      CATALOG_sliderBtns.classList.remove('slider__btns--hidden')
      Array.from([collapseBtn, collapseDeskBtn]).forEach(i => {
        i.innerHTML = '<b>ОТКРЫТЬ ВЕСЬ СПИСОК</b>'
        i.classList.remove('btn-collapse--collapse')
        i.classList.add('btn-collapse--show')
      })
    }
  }
  setElements()

  let btnToBeClickedWhenFirstLoadingAndHasHash = null
  if (window.location.hash) {
    currentCategory = window.location.hash.substring(1)
    btnToBeClickedWhenFirstLoadingAndHasHash = document.getElementById(currentCategory)
    btnToBeClickedWhenFirstLoadingAndHasHash.click()
  } else {
    currentCategory = 'kisti'
  }

  // put the rest of ts into first t-list and destroy the rest
  function tListManipulations() {
    const fragment = document.createDocumentFragment()
    const firstTList = document.querySelector('.t-list')
    const otherTLists = document.querySelectorAll('.t-list--no-stretch')
    for (const otherTList of otherTLists) {
      for (const t of otherTList.querySelector('.t-list__ts').children) {
        const clone = t.cloneNode(true)
        fragment.appendChild(clone)
      }

      otherTList.remove()
    }
    
    firstTList.querySelector('.t-list__ts').appendChild(fragment)
  }
  function undoTListManipulations() {
    document.querySelectorAll('.t-list').forEach(t => t.remove())
    CATALOG_track.append(document.getElementById('tmpl-' + currentCategory).content.cloneNode(true))
    setElements()
    const evt = new CustomEvent('changeOfCat', {
      detail: {currentCat: currentCategory}
    })
    window.dispatchEvent(evt)
  }


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