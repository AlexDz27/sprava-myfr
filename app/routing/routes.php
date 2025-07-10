<?php

require 'app/Presenters/SitePresenter.php';
$sitePresenter = new SitePresenter();

return [
  '/' => [$sitePresenter, 'simplePage', [
    'title' => 'some index title',
    'pathToPage' => 'front-end/pages/index.php'
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