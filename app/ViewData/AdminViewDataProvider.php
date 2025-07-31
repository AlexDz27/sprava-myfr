<?php

namespace app\ViewData;

use app\Data\DataProvider;

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

  public function getProductGroups() {
    $dataProvider = new DataProvider();
    $products = $dataProvider->getProductsForAdmin();

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

    return $productsTransformed;
  }
}