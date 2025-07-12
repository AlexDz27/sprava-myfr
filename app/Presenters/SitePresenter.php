<?php

require 'BasePresenter.php';
require 'app/ViewData/ViewDataProvider.php';

class SitePresenter extends BasePresenter {
  public $texts = [];

  public function __construct() {
    $viewDataProvider = new ViewDataProvider();
    $this->texts = $viewDataProvider->getTexts();
  }

  public function simplePage($pathToPage, $title = 'Some title', $extraAssets = []) {
    extract($this->texts);
    require $pathToPage;
  }
}