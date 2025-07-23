<?php

require 'app/Data/DataProvider.php';
require 'transformationFunctions.php';

class ViewDataProvider {
  public function getTexts() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTexts();

    $textsTransformed = [
      'phones' => [
        'header' => [],
        'contacts' => [],
      ],
      'address' => '',
    ];

    $phonesForHeader = array_map(function($phone) {
      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $texts['phones']);

    addDerivativePhones($texts['phones']);
    $phonesForContacts = array_map(function($phone) {
      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $texts['phones']);

    $textsTransformed = [
      'phones' => [
        'header' => $phonesForHeader,
        'contacts' => $phonesForContacts,
      ],
      'address' => $texts['address']['text'],
    ];

    // var_dump($textsTransformed);
    // die();

    return $textsTransformed;
  }

  public function getCategoriesForHome() {
    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategoriesForHome();

    $categoriesTransformed = [];
    foreach ($categories as $c) {
      $c['description'] = explode("\n", $c['description']);
      foreach ($c['description'] as &$i) {
        $i = substr($i, 2);
      }

      if ($c['name_view']) {
        $c['name_view'] = explode("\n", $c['name_view']);
      }

      $categoriesTransformed[] = $c;
    }

    return $categoriesTransformed;
  }
  public function getCategoriesForCatalog() {
    $dataProvider = new DataProvider();
    $categories = $dataProvider->getCategoriesForCatalog();

    $categoriesTransformed = [];
    foreach ($categories as $c) {
      if ($c['name_view']) {
        $c['name_view'] = explode("\n", $c['name_view']);
      }

      $categoriesTransformed[] = $c;
    }

    return $categoriesTransformed;
  }

  public function getProductsForCatalog() {
    $dataProvider = new DataProvider();
    $products = $dataProvider->getProductsForCatalog();

    $productsTransformed = [];
    // TODO: где-то в форычыче сделать логику для слайдов. брать по 16, пока я не смогу этого делать)
    foreach ($products as $p) {
      $cat = $p['cat_name_tech'];
      if (!isset($productsTransformed[$cat])) $productsTransformed[$cat] = [];
      unset($p['cat_name_tech']);
      $productsTransformed[$cat][] = $p;
    }

    return $productsTransformed;
  }
}