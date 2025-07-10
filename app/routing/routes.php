<?php

require 'app/Presenters/SitePresenter.php';
$sitePresenter = new SitePresenter();

return [
  // '/' => 'front-end/pages/index.php',
  '/' => [$sitePresenter, 'simplePage', ['title' => 'some index title']],
  '/qwe' => [$sitePresenter, 'simplePage', ['title' => 'some qwe title']],
  '/asd' => 'front-end/pages/asd.php',
  '404' => 'front-end/pages/404.php'
];