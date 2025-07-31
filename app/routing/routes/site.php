<?php

use app\Presenters\SitePresenter;
use app\Data\DataProvider;

$sitePresenter = new SitePresenter();

$siteRoutes = [
  '/' => [$sitePresenter, 'home', [
    'path' => 'front-end/site/pages/home.php',
    'title' => $sitePresenter->companyName . ' - строительный инструмент',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
      '<script src="/front-end/site/assets/js/main-slider.h-0.js" defer></script>',
    ],
  ]],
  '/about-company' => [$sitePresenter, 'page', [
    'path' => 'front-end/site/pages/about-company.php',
    'title' => $sitePresenter->companyName. ' | О нас',
  ]],
  '/catalog' => [$sitePresenter, 'catalog', [
    'path' => 'front-end/site/pages/catalog.php',
    'title' => $sitePresenter->companyName. ' | Каталог',
    'extraAssets' => [
      '<script src="/front-end/site/assets/js/slider-2.h-2.js" defer></script>',
    ],
    'bodyClass' => 'catalog',
  ]],
  '/table' => [$sitePresenter, 'table', [
    'path' => 'front-end/site/pages/table.php',
    'title' => $sitePresenter->companyName. ' | Прайс-лист',
  ]],
  '/download-price' => [$sitePresenter, 'downloadPrice', []],

  '404' => [$sitePresenter, 'page', [
    'path' => 'front-end/site/pages/404.php',
    'title' => $sitePresenter->companyName. ' | Страница не найдена',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
    ],
  ]]
];

$myF = function(&$siteRoutes) use ($sitePresenter) {
  $dataProvider = new DataProvider();
  $routes = $dataProvider->getProductRoutes();

  foreach ($routes as $slug => $r) {
    $siteRoutes[$slug] = [$sitePresenter, 'product', [
      'path' => 'front-end/site/pages/product.php',
      'title' =>  $sitePresenter->companyName. ' | ' . $r['name'],
      'extraAssets' => [
        '<link rel="stylesheet" href="/front-end/site/assets/css/splide-core.min.css">',
        '<script src="/front-end/site/assets/js/splide.min.js" defer></script>',
        '<script src="/front-end/site/assets/js/slider-product-h4.js" defer></script>',
      ],
      'product' => $r,
      'slug' => $slug,
      'bodyClass' => 'page--product',
    ]];
  }
};

$myF($siteRoutes);

return $siteRoutes;