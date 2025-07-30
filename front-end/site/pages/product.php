<?php require 'front-end/site/parts/head.php' ?>
<?php require 'front-end/site/parts/header.php' ?>

<style>
  @media (max-width: 1058px) {
    .product__wrapper .cont {
      padding-left: 0;
      padding-right: 0;
    }

    .splide__slide {
      height: 570px;
    }
  }
  .product-slider {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .product-slider__btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    position: relative;
    padding: 10px;
    z-index: 100;
  }
  @media (max-width: 500px) {
    .product__col-img__l-1 {
      transform: translateY(197px);
    }
  }
  @media (max-width: 445px) {
    .product__col-img__l-1 {
      transform: translateY(172px);
    }
  }
  @media (max-width: 390px) {
    .product__col-img__l-1 {
      transform: translateY(159px);
    }
  }
  .product-slider__btn--prev {
    bottom: 5px;
    left: 15px;
    top: -5px;
    transform: rotate(-90deg) scale(1.5);
  }
  .product-slider__btn--next {
    position: relative;
    right: 15px;
    transform: rotate(-90deg) scale(1.5);
  }
  @media (max-width: 580px) {
    .product-slider__btn--prev {
      left: 0;
      top: 0;
    }
    .product-slider__btn--next {
      right: 0;
    }
  }
  @media (max-width: 500px) {
    .product-slider__btn--prev {
      padding-top: 0;
    }
    .product-slider__btn--next {
      padding-bottom: 0;
    }
  }
  .product-slider__btn--inactive svg path {
    stroke: #D8D3D3;
  }

  .product-slider__track {
    display: grid;
    row-gap: 9px;
    max-height: 471px;
    overflow-x: hidden;
    overflow-y: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
    padding-left: 5px;
    padding-top: 4px;
    padding-bottom: 4px;
    touch-action: pan-y;
  }
  .product-slider__track::-webkit-scrollbar {
    display: none;
  }
  @media (max-width: 500px) {
    .product-slider__track {
      max-height: 329px;
    }
  }
  .product-slider__track__img-cont {
    width: 75px;
    height: 87px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    cursor: pointer;
    border-radius: 20px;
    outline: 1px solid #E7E3E3;
  }
  @media (max-width: 500px) {
    .product-slider__track__img-cont {
      width: 58px;
      height: 58px;
    }
  }
  .product-slider__track__img-cont--active {
    outline: 2px solid #FEDE32;
  }
  .product-slider__track__img-cont img {
    width: 81%;
    margin: 0 auto;
    display: block;
  }

  @media (max-width: 500px) {
    .product {
      column-gap: 0;
      row-gap: 25px;
    }
    .slider__dots--product {
      transform: translateY(80px) translateX(-21px);
    }
    .dots-cont {
      margin-bottom: 25px;
      display: flex;
      align-items: center;
    }
    .slider__dots--mob {
      display: flex !important;
      position: static;
    }
    .product-slider__btn--mob {
      display: inline-block !important;
      position: static !important;
    }
    .product-slider__track__img-cont img {
      object-fit: contain;
      height: 100%;
    }

    .product__col-img {
      margin-bottom: 45px;
    }
  }

  .product__title b {
    font-weight: 700;
  }
  .product__detail__2::first-letter {
    text-transform: uppercase;
  }
</style>

<section class="section-design--about">
  <div class="cont yellow">
    <nav>
      <a class="yellow__link" href="/">Главная</a>
      <a class="yellow__link" href="/catalog">Каталог</a>
      <a class="yellow__link yellow__link--abraziv" href="/catalog#<?= $product['cat_name_tech'] ?>"><?= $product['cat_name'] ?></a>
      <a class="yellow__link yellow__link--active" href="<?= $slug ?>"><?= $product['name'] ?></a>
    </nav>
  </div>
</section>

<section class="product__wrapper">
  <div class="cont">
    <div class="product <?= $product['isHit'] ? 'product--hit' : '' ?>">
        <div class="splide product__col-img">
          <div class="splide__arrows product__col-img__l-1">
            <button id="btnPrev" class="splide__arrow splide__arrow--prev product-slider__btn product-slider__btn--prev">
              <svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23 12.9644L13.2234 2.7554C12.8292 2.3438 12.1713 2.34434 11.7778 2.75657L2 13" stroke-width="3" stroke="#494547" />
              </svg>
            </button>
            <button id="btnNext" class="splide__arrow splide__arrow--next product-slider__btn product-slider__btn--next">
            <svg width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22 1.03559L12.2234 11.2446C11.8292 11.6562 11.1713 11.6557 10.7778 11.2434L1 1" stroke="#494547" stroke-width="2.62591"/>
            </svg>
          </button>
          </div>
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide"><img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>"></li>
              <?php if (!empty($product['galleryImgs'])): ?>
                <?php foreach (explode(', ', $product['galleryImgs']) as $galImg): ?>
                  <li class="splide__slide"><img src="/front-end/site/assets<?= $galImg ?>" alt="<?= $product['name'] ?>"></li>
                <?php endforeach ?>
              <?php endif ?>
            </ul>
          </div>
        </div> 
      <div class="product__col-text">
        <p class="product__title"><?= $product['name'] ?></p>
        <p class="product__art text--larger">Артикул: <?= $product['art'] ?></p>
        <p class="product__price"><b><?= $product['price'] ?> BYN (с НДС 20%) / <?= $product['unit'] ?></b></p>
        <p class="product__detail text--larger"><span class="product__detail__1">Единица измерения</span> <span class="product__detail__2"><?= $product['unit'] ?></span></p>
        <?php if (!empty($product['upakMal'])): ?>
          <p class="product__detail text--larger"><span class="product__detail__1">Упак. мал.</span> <span class="product__detail__2"><?= $product['upakMal'] ?></span></p>
        <?php endif ?>
        <?php if (!empty($product['upakKrup'])): ?>
          <p class="product__detail product__detail--last text--larger"><span class="product__detail__1">Упак. круп.</span> <span class="product__detail__2"><?= $product['upakKrup'] ?></span></p>
        <?php endif ?>
        <p class="product__mb">
          <a class="btn product__btn" href="/download-price"><b>СКАЧАТЬ ПРАЙС</b></a>
          <a class="btn product__btn product__btn--outlined t__btn" target="_blank" href="/table.php"><b>ПОСМОТРЕТЬ ПРАЙС</b></a>
        </p>
        <a class="product__go-to-cat text--larger" href="/catalog">Перейти в каталог</a>
      </div>
    </div>
    <div class="product__info">
      <button id="desc" class="product__info__btn product__info__btn--active">Описание</button>
      <button id="details" class="product__info__btn">Детали</button>
    </div>
    <div id="contentsDesc" class="product__info__contents product__info__contents--active">
      <p><?= $product['description'] ?></p>
    </div>
    <div id="contentsDetails" class="product__info__contents">
      <p><?= $product['details'] ?? '' ?></p>
    </div>
  </div>
</section>

<script>
  const btnDesc = document.getElementById('desc')
  const btnDetails = document.getElementById('details')
  const contentsDesc = document.getElementById('contentsDesc')
  const contentsDetails = document.getElementById('contentsDetails')
  const btnsWContents = [[btnDesc, contentsDesc], [btnDetails, contentsDetails]]
  for (const btnWContent of btnsWContents) {
    btnWContent[0].onclick = () => {
      document.querySelector('.product__info__btn--active').classList.remove('product__info__btn--active')
      document.querySelector('.product__info__contents--active').classList.remove('product__info__contents--active')
      btnWContent[0].classList.add('product__info__btn--active')
      btnWContent[1].classList.add('product__info__contents--active')
    }
  }
</script>

<?php require 'front-end/site/parts/footer.php' ?>