<?php

// NOTE: not requiring BasePresenter and DataProvider here, bc otherwise there will be Error stating that BasePresenter is already defined due to it being required is SitePresenter as well,
// and SitePresenter is used in routing (it's bad, I know)
require 'app/ViewData/AdminViewDataProvider.php';
require 'app/Data/DataUpdater.php';

class AdminPresenter extends BasePresenter {
  public $viewDataProvider;

  public function __construct() {
    $this->viewDataProvider = new AdminViewDataProvider();
  }

  public function home($pathToPage, $title = 'Панель администратора') {
    $uname = 'aom';
    $pwd = '';
    if (@$_SERVER['PHP_AUTH_USER'] !== $uname) {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Нужно ввести верные логин и пароль.';
      exit;
    }

    require $pathToPage;
  }

  public function updatePrice($pathToPage, $title = 'Панель администратора') {
    $uname = 'aom';
    $pwd = '';
    if (@$_SERVER['PHP_AUTH_USER'] !== $uname) {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Нужно ввести верные логин и пароль.';
      exit;
    }

    require $pathToPage;
  }
  public function updatePriceApi() {
    $dataUpdater = new DataUpdater();
    $resultMessage = $dataUpdater->updatePrice();

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }

  public function editTexts($pathToPage, $title = 'Панель администратора') {
    $uname = 'aom';
    $pwd = '';
    if (@$_SERVER['PHP_AUTH_USER'] !== $uname) {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Нужно ввести верные логин и пароль.';
      exit;
    }

    $editableTexts = $this->viewDataProvider->getTextsForAdmin();
    extract($editableTexts);

    require $pathToPage;
  }
  public function editTextsApi() {
    $dataUpdater = new DataUpdater();
    $editedTexts = $_POST;

    $resultMessage = $dataUpdater->editTexts($editedTexts);

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }

  public function manageCategories($pathToPage, $title = 'Панель администратора') {
    $uname = 'aom';
    $pwd = '';
    if (@$_SERVER['PHP_AUTH_USER'] !== $uname) {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Нужно ввести верные логин и пароль.';
      exit;
    }
    // TODO: editableCats

    require $pathToPage;
  }
}