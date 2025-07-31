<?php

namespace app\Presenters;

use app\Presenters\BasePresenter;
use app\ViewData\ViewDataProvider;
use app\Data\DataProvider;

class SitePresenter extends BasePresenter {
  public $texts = [];

  public function __construct() {
    $viewDataProvider = new ViewDataProvider();
    $this->texts = $viewDataProvider->getTexts();
  }

  public function home(...$pageArgs) {
    $viewDataProvider = new ViewDataProvider();
    $categories = $viewDataProvider->getCategoriesForHome();

    $this->page(
      ['categories' => $categories],
      ...$pageArgs
    );
  }

  public function catalog($bodyClass, ...$pageArgs) {
    $viewDataProvider = new ViewDataProvider();
    $categories = $viewDataProvider->getCategoriesForCatalog();
    $viewData = $viewDataProvider->getProductsForCatalog();

    $products = $viewData[0];
    $productsCatSlidesCount = $viewData[1];

    $this->page(
      [
        'categories' => $categories,
        'products' => $products,
        'productsCatSlidesCount' => $productsCatSlidesCount,

        'bodyClass' => $bodyClass,
      ],
      ...$pageArgs
    );
  }

  public function product($product, $slug, $bodyClass, ...$pageArgs) {
    $this->page(
      [
        'product' => $product,
        'slug' => $slug,

        'bodyClass' => $bodyClass,
      ],
      ...$pageArgs
    );
  }

  public function downloadPrice() {
    $dataProvider = new DataProvider();
    $priceListTexts = $dataProvider->getPriceListTexts();

    $filePath = 'data/price-lists/' . $priceListTexts['priceListFileName'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filePath).'"');

    readfile($filePath);

    exit;
  }

  public function page($vars = [], ...$pageArgs) {
    parent::page($this->texts + $vars, ...$pageArgs);
  }
}