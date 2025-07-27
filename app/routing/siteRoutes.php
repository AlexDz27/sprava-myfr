<?php

require 'app/Presenters/SitePresenter.php';
$sitePresenter = new SitePresenter();

// TODO: download price
$siteRoutes = [
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

  '404' => [$sitePresenter, 'simplePage', [
    'title' => $sitePresenter->companyName. ' | Страница не найдена',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
    ],
    'pathToPage' => 'front-end/site/pages/404.php'
  ]]
];

$myF = function(&$siteRoutes) use ($sitePresenter) {
  $dataProvider = new DataProvider();
  $routes = $dataProvider->getProductRoutes();

  foreach ($routes as $slug => $r) {
    $siteRoutes[$slug] = [$sitePresenter, 'product', [
      'title' =>  $sitePresenter->companyName. ' | ' . $r['name'],
      'extraAssets' => [
        '<link rel="stylesheet" href="/front-end/site/assets/css/splide-core.min.css">',
        '<script src="/front-end/site/assets/js/splide.min.js" defer></script>',
        '<script src="/front-end/site/assets/js/slider-product-h4.js" defer></script>',
      ],
      'bodyClass' => 'page--product',
      'pathToPage' => 'front-end/site/pages/product.php',
      'product' => $r,
      'slug' => $slug,
    ]];
  }
  // var_dump($routes);
  // die();
};

$myF($siteRoutes);

return $siteRoutes;