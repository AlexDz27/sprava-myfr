<?php

namespace app\Presenters;

use app\Presenters\BasePresenter;
use app\ViewData\AdminViewDataProvider;
use app\Data\DataUpdater;
use app\Data\DataProvider;

class AdminPresenter extends BasePresenter {
  public $viewDataProvider;

  public function __construct() {
    $this->viewDataProvider = new AdminViewDataProvider();
  }

  public function updatePriceApi() {
    $dataUpdater = new DataUpdater();
    $resultMessage = $dataUpdater->updatePrice();

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }

  public function editTexts(...$pageArgs) {
    $editableTexts = $this->viewDataProvider->getTextsForAdmin();

    $this->page(
      [
        'phones' => $editableTexts['phones'],
        'address' => $editableTexts['address'],
      ],
      ...$pageArgs
    );
  }
  public function editTextsApi() {
    $dataUpdater = new DataUpdater();
    $editedTexts = $_POST;

    $resultMessage = $dataUpdater->editTexts($editedTexts);

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }

  public function manageCategories(...$pageArgs) {
    guard();

    $categories = $this->viewDataProvider->getCategoriesForAdmin();

    $this->page(
      ['categories' => $categories],
      ...$pageArgs
    );
  }
  public function manageCategoriesApi() {
    $dataUpdater = new DataUpdater();

    $resultMessage = null;
    // this means we sent JSON payload with 'justHidden' or 'is_deleted' -- bad code here
    if (empty($_POST)) {
      $incoming = file_get_contents('php://input');
      $decoded = json_decode($incoming, true);

      $resultMessage = $dataUpdater->manageCategories($decoded);
    } else {
      $resultMessage = $dataUpdater->manageCategories($_POST);
    }

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    // TODO: d when i deal with images
    // var_dump($decoded);
    // die();
    
    // $f = $decoded[1];
    // $n = $f['imgFileName'];
    // $b = $f['imgBase64'];
    // $bB = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $b));
    // file_put_contents('app/Data/test/' . $n, $bB);
  }

  public function manageProducts(...$pageArgs) {
    guard();
    
    $productGroups = $this->viewDataProvider->getProductGroups();

    $this->page(
      ['productGroups' => $productGroups],
      ...$pageArgs
    );
  }
  public function editProduct(...$pageArgs) {
    guard();

    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategoriesForManagingProduct();

    $this->page(
      ['categories' => $categories],
      ...$pageArgs
    );
  }
  public function editProductApi() {
    $dataUpdater = new DataUpdater();
    $resultMessage = $dataUpdater->editProduct();

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }
  public function createProduct(...$pageArgs) {
    guard();

    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategoriesForManagingProduct();

    $this->page(
      ['categories' => $categories],
      ...$pageArgs
    );
  }
  public function createProductApi() {
    var_dump($_POST);
    var_dump($_FILES);
    die();
  }

  public function guardedPage($vars = [], ...$pageArgs) {
    guard();
    parent::page($vars, ...$pageArgs);
  }
}


function guard() {
  if (@$_SERVER['PHP_AUTH_USER'] !== 'aom') {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Нужно ввести верные логин и пароль.';
    exit;
  }
}