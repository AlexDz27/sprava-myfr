<?php require 'front-end/site/parts/head.php' ?>
<?php require 'front-end/site/parts/header.php' ?>

<style>
  .t__img {
    width: 100%;
    height: 96%;
    object-fit: contain;
  }
  .t__img--fix-bad-first-valik {
    height: 97%;
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

    <div class="slider--cat">
      <div id="track" class="slider--cat__track t-list__mb">
        <?php for ($s = 0; $s < $productsCatSlidesCount[array_key_first($productsCatSlidesCount)]; $s++): ?>
          <div class="t-list <?= $s > 0 ? 't-list--no-stretch' : '' ?>">
            <div class="t-list__ts">
              <?php $count = count($products[array_key_first($productsCatSlidesCount)]); ?>
              <?php $shouldAlreadyUseCount = $s == $productsCatSlidesCount[array_key_first($productsCatSlidesCount)] - 1; ?>
              <?php for ($z = 0 + ($s * 16); $z < ($shouldAlreadyUseCount ? $count : 16 * ($s + 1)); $z++): $product = $products[array_key_first($productsCatSlidesCount)][$z]; ?>
                <div class="t <?= $product['isHit'] ? 't--hit' : '' ?>">
                  <p class="t__iz"><?= $z + 1 ?> из <?= $count ?></p>
                  <div class="t__body">
                    <div class="t__img-cont <?= $z === 1 ? 't__img-cont--kist-2' : '' ?>">
                      <img width="150" height="150" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="t__text">
                      <p><?= $product['name'] ?></p>
                      <p class="text--semibold"><?= $product['price'] ?> BYN<br>(с НДС 20%) / <?= $product['unit'] ?></p>
                      <a class="btn card__btn t__btn" href="/catalog/<?= $product['cat_slug'] . '/' . $product['slug'] ?>"><b>Подробнее</b></a>
                    </div>
                  </div>
                </div>
              <?php endfor ?>
            </div>
            <div class="t-list__slider-btns">
              <div class="slider__btns">
                 <button class="js__btn-slider-prev btn-slider <?= $s == 0 ? 'btn-slider--inactive' : '' ?>" <?= $s == 0 ? 'disabled' : '' ?>>
                  <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
                  </svg>
                </button>
                <div id="dots" class="js__slider-dots slider__dots slider__dots--cat">
                  <?php for ($d = 0; $d < $productsCatSlidesCount[array_key_first($productsCatSlidesCount)]; $d++): ?>
                    <span class="slider__dots__dot <?= $s == $d ? 'slider__dots__dot--active' : '' ?>"></span>
                  <?php endfor ?>
                </div>
                <button data-f="<?= $s ?>" data-s="<?= $productsCatSlidesCount[array_key_first($productsCatSlidesCount)] ?>" class="js__btn-slider-next btn-slider <?= $s == $productsCatSlidesCount[array_key_first($productsCatSlidesCount)] - 1 ? 'btn-slider--inactive' : '' ?>" <?= $s == $productsCatSlidesCount[array_key_first($productsCatSlidesCount)] - 1 ? 'disabled' : '' ?>>
                  <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
                  </svg>
                </button>
              </div>
            </div>
            <div class="t-list__open-full-list-btn-cont">
              <button id="collapseDesk" class="js-collapseDesk btn product__btn btn-collapse btn-collapse--desk btn-collapse--show" style=""><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
            </div>
          </div>
        <?php endfor ?>
      </div>

      <button id="collapse" class="btn product__btn btn-collapse btn-collapse--show"><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
    </div>
  </div>
</section>

<?php foreach ($productsCatSlidesCount as $cat => $slidesCount): ?>
  <template id="tmpl-<?= $cat ?>">
    <?php for ($s = 0; $s < $slidesCount; $s++): ?>
      <div class="t-list <?= $s > 0 ? 't-list--no-stretch' : '' ?>">
        <div class="t-list__ts">
          <?php $count = count($products[$cat]); ?>
          <?php $shouldAlreadyUseCount = $s == $slidesCount - 1; ?>
          <?php for ($z = 0 + ($s * 16); $z < ($shouldAlreadyUseCount ? $count : 16 * ($s + 1)); $z++): $product = $products[$cat][$z]; ?>
            <div class="t <?= $product['isHit'] ? 't--hit' : '' ?>">
              <p class="t__iz"><?= $z + 1 ?> из <?= $count ?></p>
              <div class="t__body">
                <div class="t__img-cont <?= ($z === 1 && $cat === 'kisti') ? 't__img-cont--kist-2' : '' ?>">
                  <img class="t__img <?= ($z === 0 && $cat === 'valiki') ? 't__img--fix-bad-first-valik' : '' ?>" width="150" height="150" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="t__text">
                  <p><?= $product['name'] ?></p>
                  <p class="text--semibold"><?= $product['price'] ?> BYN<br>(с НДС 20%) / <?= $product['unit'] ?></p>
                  <a class="btn card__btn t__btn" href="/catalog/<?= $product['cat_slug'] . '/' . $product['slug'] ?>"><b>Подробнее</b></a>
                </div>
              </div>
            </div>
          <?php endfor ?>
        </div>
        <div class="t-list__slider-btns">
          <div class="slider__btns">
            <button class="js__btn-slider-prev btn-slider <?= $s == 0 ? 'btn-slider--inactive' : '' ?>" <?= $s == 0 ? 'disabled' : '' ?>>
              <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15685 0.798306L0.792893 7.27983C0.402369 7.67757 0.402369 8.32243 0.792893 8.72017L7.15686 15.2017C7.54738 15.5994 8.18055 15.5994 8.57107 15.2017C8.96159 14.804 8.96159 14.1591 8.57107 13.7614L3.91421 9.01848L24.5 9.01847C25.0523 9.01847 25.5 8.56249 25.5 8C25.5 7.43751 25.0523 6.98153 24.5 6.98153L3.91421 6.98153L8.57107 2.23864C8.96159 1.84091 8.96159 1.19604 8.57107 0.798306C8.18054 0.400567 7.54738 0.400567 7.15685 0.798306Z" fill="#FEDE32"/>
              </svg>
            </button>
            <div id="dots" class="js__slider-dots slider__dots slider__dots--cat">
              <?php for ($d = 0; $d < $slidesCount; $d++): ?>
                <span class="slider__dots__dot <?= $s == $d ? 'slider__dots__dot--active' : '' ?>"></span>
              <?php endfor ?>
            </div>
            <button class="js__btn-slider-next btn-slider <?= $s == $slidesCount - 1 ? 'btn-slider--inactive' : '' ?>" <?= $s == $slidesCount - 1 ? 'disabled' : '' ?>>
              <svg width="26" height="26" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8431 0.798306L25.2071 7.27983C25.5976 7.67757 25.5976 8.32243 25.2071 8.72017L18.8431 15.2017C18.4526 15.5994 17.8195 15.5994 17.4289 15.2017C17.0384 14.804 17.0384 14.1591 17.4289 13.7614L22.0858 9.01848L1.5 9.01847C0.947714 9.01847 0.499999 8.56249 0.499999 8C0.499999 7.43751 0.947715 6.98153 1.5 6.98153L22.0858 6.98153L17.4289 2.23864C17.0384 1.84091 17.0384 1.19604 17.4289 0.798306C17.8195 0.400567 18.4526 0.400567 18.8431 0.798306Z" fill="#FEDE32"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="t-list__open-full-list-btn-cont">
          <button id="collapseDesk" class="js-collapseDesk btn product__btn btn-collapse btn-collapse--desk btn-collapse--show" style=""><b>ОТКРЫТЬ ВЕСЬ СПИСОК</b></button>
        </div>
      </div>
    <?php endfor ?>
  </template>
<?php endforeach ?>

<script>
  // TODO: put this into main.js and then think how to handle TypeErrors when an element is absent
  const CATALOG_track = document.getElementById('track')

  /** CATALOG CATEGORIES TOGGLE **/
  let currentCategory = null
  const titleSection = document.getElementById('titleSection')
  const catBtns = Array.from(document.getElementById('qs').children)
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

  let collapseBtn = document.getElementById('collapse')
  let collapseDeskBtns = document.querySelectorAll('.js-collapseDesk')
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
    collapseDeskBtns = document.querySelectorAll('.js-collapseDesk')

    // console.log(collapseDeskBtns)
    // console.log('should be', Array.from(collapseDeskBtns).flat())
    // console.log('->', Array.from([collapseBtn, Array.from(collapseDeskBtns).flat()]))
    // console.log('->2', Array.from([collapseBtn, collapseDeskBtns], bArr => bArr.flat()))
    const combinedCollapseBtnMobAndDesk = Array.from([collapseBtn, ...collapseDeskBtns])
    console.log(combinedCollapseBtnMobAndDesk)

    Array.from(combinedCollapseBtnMobAndDesk).forEach(i => {
      i.onclick = () => {
        listViewState = listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER ? LIST_VIEW_STATE.SHOW_FULL_LIST : LIST_VIEW_STATE.SHOW_IN_SLIDER

        if (slider.currentSlideIdx > 0) slider.currentSlideIdx = 0

        if (listViewState === LIST_VIEW_STATE.SHOW_FULL_LIST) {
          if (window.innerWidth > 670) tListManipulations()
          firstTList.querySelector('.t-list__ts').classList.add('t-list--return')
          CATALOG_sliderBtns.classList.add('slider__btns--hidden')
          Array.from(combinedCollapseBtnMobAndDesk).forEach(b => {
            b.innerHTML = '<b>СВЕРНУТЬ СПИСОК</b>'
            b.classList.remove('btn-collapse--show')
            b.classList.add('btn-collapse--collapse')
          })
        } else if (listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER) {
          if (window.innerWidth > 670) undoTListManipulations()
          firstTList.querySelector('.t-list__ts').classList.remove('t-list--return')
          CATALOG_sliderBtns.classList.remove('slider__btns--hidden')
          Array.from(combinedCollapseBtnMobAndDesk).forEach(b => {
            b.innerHTML = '<b>ОТКРЫТЬ ВЕСЬ СПИСОК</b>'
            b.classList.remove('btn-collapse--collapse')
            b.classList.add('btn-collapse--show')
          })
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
    console.log('firstTList', firstTList)
    const otherTLists = document.querySelectorAll('.t-list--no-stretch')
    console.log('otherTLists', otherTLists)
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