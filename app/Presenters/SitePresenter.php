<?php

require 'BasePresenter.php';

class SitePresenter extends BasePresenter {
  public function simplePage($title = 'Some title') {
    echo $title;
    die();
  }
}