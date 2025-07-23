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
        <a href="#<?= $c['name_tech'] ?>" id="<?= $c['name_tech'] ?>" class="q <?= $i == 0 ? 'q--active' : '' ?>" >Кисти малярные</a>
      <?php endfor ?>

      <a href="#kisti" id="kisti" class="q q--active" >Кисти малярные</a>
      <a href="#valiki" id="valiki" class="q" >Валики и ролики</a>
      <a href="#abraziv" id="abraziv" class="q q--with-second-line" ><span class="q__text--with-second-line">Абразивные алмазные<span class="card__title__2nd-line"> материалы и оснастка</span></span></a>
      <a href="#nozhi" id="nozhi" class="q" >Ножи и лезвия</a>
      <a href="#vspomogat" id="vspomogat" class="q q--with-second-line" ><span class="q__text--with-second-line">Вспомогательный<span class="card__title__2nd-line"> инструмент</span></span></a>
    </div>

    <h2 id="titleSection" class="title-section title-section--mob">Кисти малярные</h2>

    <!-- k Slider here -->
  </div>
</section>

<!-- k templates here -->

<script>
  // // TODO: put this into main.js and then think how to handle TypeErrors when an element is absent
  // const CATALOG_track = document.getElementById('track')

  // /** CATALOG CATEGORIES TOGGLE **/
  // let currentCategory = null
  // const btnKisti = document.getElementById('kisti')
  // const btnAbraziv = document.getElementById('abraziv')
  // const btnValiki = document.getElementById('valiki')
  // const btnVspomogat = document.getElementById('vspomogat')
  // const btnNozhi = document.getElementById('nozhi')
  // const titleSection = document.getElementById('titleSection')
  // const catBtns = [btnKisti, btnAbraziv, btnValiki, btnVspomogat, btnNozhi]
  // for (const btn of catBtns) {
  //   btn.onclick = (e) => {
  //     e.preventDefault()
  //     history.pushState(null, null, btn.href);
  //     listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER

  //     currentCategory = btn.id
  //     document.querySelectorAll('.t-list').forEach(t => t.remove())
  //     CATALOG_track.append(document.getElementById('tmpl-' + currentCategory).content.cloneNode(true))
  //     setElements()
  //     const evt = new CustomEvent('changeOfCat', {
  //       detail: {currentCat: btn.id}
  //     })
  //     window.dispatchEvent(evt)

  //     document.querySelector('.q--active').classList.remove('q--active')
  //     btn.classList.add('q--active')
  //     titleSection.textContent = btn.textContent
  //   }
  // }

  // /** LIST VIEW LOGIC **/
  // const LIST_VIEW_STATE = {
  //   SHOW_FULL_LIST: 'SHOW_FULL_LIST',
  //   SHOW_IN_SLIDER: 'SHOW_IN_SLIDER'
  // }
  // let listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER

  // // TODO: mb this won't work cuz now i use qsAll(.t-list)
  // let collapseBtn = document.getElementById('collapse')
  // let collapseDeskBtn = document.getElementById('collapseDesk')
  // let CATALOG_sliderBtns = document.querySelector('.slider__btns')
  // let firstTList = document.querySelector('.t-list')
  // let otherTLists = document.querySelectorAll('.t-list--no-stretch')
  // function setElements() {
  //   firstTList = document.querySelector('.t-list')
  //   otherTLists = document.querySelectorAll('.t-list--no-stretch')
  //   if (window.innerWidth <= 670) {
  //     tListManipulations()
  //   }

  //   CATALOG_sliderBtns = document.querySelector('.slider__btns')
  //   collapseBtn = document.getElementById('collapse')
  //   collapseDeskBtn = document.getElementById('collapseDesk')

  //   Array.from([collapseBtn, collapseDeskBtn]).forEach(i => {
  //     i.onclick = () => {
  //       listViewState = listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER ? LIST_VIEW_STATE.SHOW_FULL_LIST : LIST_VIEW_STATE.SHOW_IN_SLIDER

  //       if (listViewState === LIST_VIEW_STATE.SHOW_FULL_LIST) {
  //         if (window.innerWidth > 670) tListManipulations()
  //         firstTList.querySelector('.t-list__ts').classList.add('t-list--return')
  //         CATALOG_sliderBtns.classList.add('slider__btns--hidden')
  //         i.innerHTML = '<b>СВЕРНУТЬ СПИСОК</b>'
  //         i.classList.remove('btn-collapse--show')
  //         i.classList.add('btn-collapse--collapse')
  //       } else if (listViewState === LIST_VIEW_STATE.SHOW_IN_SLIDER) {
  //         if (window.innerWidth > 670) undoTListManipulations()
  //         firstTList.querySelector('.t-list__ts').classList.remove('t-list--return')
  //         CATALOG_sliderBtns.classList.remove('slider__btns--hidden')
  //         i.innerHTML = '<b>ОТКРЫТЬ ВЕСЬ СПИСОК</b>'
  //         i.classList.remove('btn-collapse--collapse')
  //         i.classList.add('btn-collapse--show')
  //         smoothScrollTo(document.getElementById('qs').offsetTop - 30, 800)
  //       }
  //     }
  //   })

  //   // fix bug: when on mobile, when opened, click btn.id -> not correct state of LIST_VIEW_STATE
  //   // WARNING: COPY-PASTE FROM 642-648
  //   if (window.innerWidth <= 670) {
  //     listViewState = LIST_VIEW_STATE.SHOW_IN_SLIDER
  //     if (window.innerWidth > 670) undoTListManipulations()
  //     firstTList.querySelector('.t-list__ts').classList.remove('t-list--return')
  //     CATALOG_sliderBtns.classList.remove('slider__btns--hidden')
  //     Array.from([collapseBtn, collapseDeskBtn]).forEach(i => {
  //       i.innerHTML = '<b>ОТКРЫТЬ ВЕСЬ СПИСОК</b>'
  //       i.classList.remove('btn-collapse--collapse')
  //       i.classList.add('btn-collapse--show')
  //     })
  //   }
  // }
  // setElements()

  // let btnToBeClickedWhenFirstLoadingAndHasHash = null
  // if (window.location.hash) {
  //   currentCategory = window.location.hash.substring(1)
  //   btnToBeClickedWhenFirstLoadingAndHasHash = document.getElementById(currentCategory)
  //   btnToBeClickedWhenFirstLoadingAndHasHash.click()
  // } else {
  //   currentCategory = 'kisti'
  // }

  // // put the rest of ts into first t-list and destroy the rest
  // function tListManipulations() {
  //   const fragment = document.createDocumentFragment()
  //   const firstTList = document.querySelector('.t-list')
  //   const otherTLists = document.querySelectorAll('.t-list--no-stretch')
  //   for (const otherTList of otherTLists) {
  //     for (const t of otherTList.querySelector('.t-list__ts').children) {
  //       const clone = t.cloneNode(true)
  //       fragment.appendChild(clone)
  //     }

  //     otherTList.remove()
  //   }
    
  //   firstTList.querySelector('.t-list__ts').appendChild(fragment)
  // }
  // function undoTListManipulations() {
  //   document.querySelectorAll('.t-list').forEach(t => t.remove())
  //   CATALOG_track.append(document.getElementById('tmpl-' + currentCategory).content.cloneNode(true))
  //   setElements()
  //   const evt = new CustomEvent('changeOfCat', {
  //     detail: {currentCat: currentCategory}
  //   })
  //   window.dispatchEvent(evt)
  // }


  // function smoothScrollTo(targetPosition, duration) {
  //   const startPosition = window.pageYOffset;
  //   const distance = targetPosition - startPosition;
  //   let startTime = null;
    
  //   function animation(currentTime) {
  //     if (!startTime) startTime = currentTime;
  //     const timeElapsed = currentTime - startTime;
  //     const progress = Math.min(timeElapsed / duration, 1);
      
  //     // Easing function (easeInOutQuad)
  //     const ease = progress < 0.5 
  //     ? 2 * progress * progress 
  //     : 1 - Math.pow(-2 * progress + 2, 2) / 2;
      
  //     window.scrollTo(0, startPosition + (distance * ease));
      
  //     if (timeElapsed < duration) {
  //       requestAnimationFrame(animation);
  //     }
  //   }
    
  //   requestAnimationFrame(animation);
  // }
</script>

<?php require 'front-end/site/parts/contacts.php' ?>

<?php require 'front-end/site/parts/footer.php' ?>