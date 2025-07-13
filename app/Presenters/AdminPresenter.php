<?php

// NOTE: not requiring BasePresenter and DataProvider here, bc otherwise there will be Error stating that BasePresenter is already defined due to it being required is SitePresenter as well,
// and SitePresenter is used in routing (it's bad, I know)
require 'app/ViewData/AdminViewDataProvider.php';

class AdminPresenter extends BasePresenter {
  public $viewDataProvider;

  public function __construct() {
    $this->viewDataProvider = new AdminViewDataProvider();
  }

  public function home($pathToPage, $title = 'Панель администратора') {
    require $pathToPage;
  }

  public function editTexts($pathToPage, $title = 'Панель администратора') {
    $editableTexts = $this->viewDataProvider->getTextsForAdmin();
    var_dump($editableTexts);
    die();
    require $pathToPage;
  }
}