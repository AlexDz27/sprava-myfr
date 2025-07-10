<?php

require 'BasePresenter.php';

class SitePresenter extends BasePresenter {
  public function simplePage($pathToPage, $title = 'Some title', $extraAssets = []) {
    require $pathToPage;
  }
}