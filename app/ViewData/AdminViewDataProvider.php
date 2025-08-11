<?php

namespace app\ViewData;

use app\Data\DataProvider;

class AdminViewDataProvider {
  public function getTextsForAdmin() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTextsForAdmin();

    return $texts;
  }

  public function getCategoriesForAdmin() {
    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategoriesForAdmin();

    return $categories;
  }

  public function getProductGroups() {
    $dataProvider = new DataProvider();
    $products = $dataProvider->getProductsForAdmin();
    $categories = $dataProvider->getCategoriesForAdmin();

    $productsTransformed = [];
    foreach ($products as $p) {
      $catName = $p['cat_name'];
      if (!isset($productsTransformed[$catName])) {
        $productsTransformed[$catName] = [
          'isCatHidden' => $p['cat_hidden'],
          'products' => []
        ];
      }
      $productsTransformed[$catName]['products'][] = $p;
    }

    uasort($productsTransformed, function($a, $b) {
      return $a['isCatHidden'] <=> $b['isCatHidden'];
    });

    $count = 0;
    foreach ($productsTransformed as $catName => $pT) {
      $productsTransformed[$catName]['count'] = ++$count;
    }

    return [$categories, $productsTransformed];
  }

  public function getProductsForAdmin() {
    $dataProvider = new DataProvider();
    $productsTransformed = $dataProvider->getProductsForAdmin();

    foreach ($productsTransformed as &$p) {
      $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
    }

    return $productsTransformed;
  }
}