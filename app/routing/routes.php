<?php

require 'app/Presenters/SitePresenter.php';
$sitePresenter = new SitePresenter();

return [
  '/' => [$sitePresenter, 'simplePage', [
    'title' => 'Sprava - строительный инструмент',
    'extraAssets' => [
      '<script src="https://api-maps.yandex.ru/v3/?apikey=2b7d9147-4a30-4c29-9a2f-594b90fa8c59&lang=ru_RU" defer></script>',
      '<script src="./front-end/assets/js/main-slider.h-0.js" defer></script>',
    ],
    'pathToPage' => 'front-end/pages/home.php'
  ]],
  '/qwe' => [$sitePresenter, 'simplePage', [
    'title' => 'some qwe title',
    'pathToPage' => 'front-end/pages/qwe.php'
  ]],
  '/asd' => [$sitePresenter, 'simplePage', [
    'title' => 'some asd title',
    'pathToPage' => 'front-end/pages/asd.php'
  ]],
  '404' => [$sitePresenter, 'simplePage', [
    'title' => 'some 404 title',
    'pathToPage' => 'front-end/pages/404.php'
  ]]
];