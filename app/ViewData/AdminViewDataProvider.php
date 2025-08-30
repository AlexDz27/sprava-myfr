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
    // var_dump($products);
    // die();
    $productsRoshma = $dataProvider->getProductsForAdminRoshma();
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

    // for roshma
    $productsTransformedRoshma = [];
    foreach ($productsRoshma as $p) {
      $catName = $p['cat_name'];
      if (!isset($productsTransformedRoshma[$catName])) {
        $productsTransformedRoshma[$catName] = [
          'isCatHidden' => $p['cat_hidden'],
          'products' => []
        ];
      }
      $productsTransformedRoshma[$catName]['products'][] = $p;
    }

    uasort($productsTransformedRoshma, function($a, $b) {
      return $a['isCatHidden'] <=> $b['isCatHidden'];
    });

    $count = 0;
    foreach ($productsTransformedRoshma as $catName => $pT) {
      $productsTransformedRoshma[$catName]['count'] = ++$count;
    }

    return [$categories, $productsTransformed, $productsTransformedRoshma];
  }
  public function getProductsRig() {
    $dataProvider = new DataProvider();
    $products = $dataProvider->getProductsForAdminRig();

    return $products;
  }

  public function getProductsForAdmin() {
    $dataProvider = new DataProvider();
    $productsTransformed = $dataProvider->getProductsForAdmin();

    foreach ($productsTransformed as &$p) {
      $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
    }

    return $productsTransformed;
  }
  public function getProductsForAdminRoshma() {
    $dataProvider = new DataProvider();
    $productsTransformed = $dataProvider->getProductsForAdminRoshma();

    // TODO: rem this possiblity to view roshma products on site

    return $productsTransformed;
  }
}