<?php

class AdminViewDataProvider {
  public function getTextsForAdmin() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTextsForAdmin();

    return $texts;
  }

  public function getCategories() {
    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategories();

    return $categories;
  }

  public function getProducts() {
    $dataProvider = new DataProvider();
    $products = $dataProvider->getProductsForAdmin();

    $productsTransformed = [];
    foreach ($products as $p) {
      $catName = $p['cat_name'];
      if (!isset($productsTransformed[$catName])) $productsTransformed[$catName] = [];
      $productsTransformed[$catName][] = $p;
    }

    return $productsTransformed;
  }
}