<?php

require 'app/Presenters/SitePresenter.php';
$sitePresenter = new SitePresenter();

return [
  '/' => [$sitePresenter, 'home', [
    'title' => $sitePresenter->companyName . ' - строительный инструмент',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
      '<script src="/front-end/site/assets/js/main-slider.h-0.js" defer></script>',
    ],
    'pathToPage' => 'front-end/site/pages/home.php'
  ]],
  '/about-company' => [$sitePresenter, 'simplePage', [
    'title' => $sitePresenter->companyName. ' | О нас',
    'pathToPage' => 'front-end/site/pages/about-company.php'
  ]],
  '/catalog' => [$sitePresenter, 'catalog', [
    'title' => $sitePresenter->companyName. ' | Каталог',
    'extraAssets' => [
      '<script src="/front-end/site/assets/js/slider-2.h-2.js" defer></script>',
    ],
    'bodyClass' => 'catalog',
    'pathToPage' => 'front-end/site/pages/catalog.php'
  ]],
  '/download-price' => [$sitePresenter, 'downloadPriceList', []],

  '404' => [$sitePresenter, 'simplePage', [
    'title' => $sitePresenter->companyName. ' | Страница не найдена',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
    ],
    'pathToPage' => 'front-end/site/pages/404.php'
  ]]
];