<?php

namespace app\Presenters;

use app\Presenters\BasePresenter;
use app\ViewData\AdminViewDataProvider;
use app\Data\DataUpdater;

// TODO: guard via magic methods
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
    $categories = $this->viewDataProvider->getCategories();

    $this->page(
      ['categories' => $categories],
      ...$pageArgs
    );
  }
  public function manageCategoriesApi() {
    $incoming = file_get_contents('php://input');
    $decoded = json_decode($incoming, true);

    $dataUpdater = new DataUpdater();
    $resultMessage = $dataUpdater->manageCategories($decoded);

    echo json_encode($resultMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    // var_dump($decoded);
    // die();
    
    // $f = $decoded[1];
    // $n = $f['imgFileName'];
    // $b = $f['imgBase64'];
    // $bB = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $b));
    // file_put_contents('app/Data/test/' . $n, $bB);
  }

  public function manageProducts(...$pageArgs) {
    $products = $this->viewDataProvider->getProducts();

    $this->page(
      ['products' => $products],
      ...$pageArgs
    );
  }
}