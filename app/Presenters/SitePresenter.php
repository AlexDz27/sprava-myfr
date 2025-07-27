<?php

require 'BasePresenter.php';
require 'app/ViewData/ViewDataProvider.php';
// require 'app/Data/DataProvider.php'; -- getting Cannot declare class DataProvider, because the name is already in use
// thus, omitting the require statement

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

  public function home($pathToPage, $title = 'Some title', $extraAssets = []) {
    $viewDataProvider = new ViewDataProvider();
    $categories = $viewDataProvider->getCategoriesForHome();

    extract($this->texts);
    require $pathToPage;
  }

  public function catalog($pathToPage, $title = 'Some title', $extraAssets = [], $bodyClass = '') {
    $viewDataProvider = new ViewDataProvider();
    $categories = $viewDataProvider->getCategoriesForCatalog();
    $viewData = $viewDataProvider->getProductsForCatalog();
    $products = $viewData[0];
    $productsCatSlidesCount = $viewData[1];
    // var_dump($products);
    // die();

    extract($this->texts);
    require $pathToPage;
  }

  public function downloadPriceList() {
    $dataProvider = new DataProvider();
    $priceListTexts = $dataProvider->getPriceListTexts();

    $filePath = 'app/Data/price-lists/' . $priceListTexts['priceListFileName'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filePath).'"');

    readfile($filePath);

    exit;
  }

  public function product($product, $slug, $pathToPage, $title = 'Some title', $extraAssets = [], $bodyClass = '') {
    // скорее всего
    // $viewDataProvider = new ViewDataProvider();
    // $product = $viewDataProvider->getProduct($slug);
    // $title = 'my-title'; // TODO: set proper title

    extract($this->texts);
    require $pathToPage;
  }
}