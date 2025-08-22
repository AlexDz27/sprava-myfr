<?php

namespace app\ViewData;

use app\Data\DataProvider;
require 'transformationFunctions.php';

class ViewDataProvider {
  public function getTexts() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTexts();
    $searchH = $dataProvider->getSearchH();

    $textsTransformed = [
      'phones' => [
        'header' => [],
        'contacts' => [],
      ],
      'address' => '',
      'workingHoursHeader' => '',
      'workingHoursContacts' => '',
      'email' => '',
      'whatsapp' => '',
      'viber' => '',
      'telegram' => '',
      'h' => $searchH,
    ];

    $phonesForHeader = array_map(function($phone) {
      if (empty($phone['text'])) return null;

      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $texts['phones']);
    $phonesForHeader = array_filter($phonesForHeader, function($p) {
      if ($p === null) return false;
      return true;
    });

    addDerivativePhones($texts['phones']);
    $phonesForContacts = array_map(function($phone) {
      if (empty($phone['text'])) return null;

      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $texts['phones']);
    $phonesForContacts = array_filter($phonesForContacts, function($p) {
      if ($p === null) return false;
      return true;
    });

    $textsTransformed = [
      'phones' => [
        'header' => $phonesForHeader,
        'contacts' => $phonesForContacts,
      ],
      'address' => $texts['address']['text'],
      'workingHoursHeader' => $texts['workingHoursHeader']['text'],
      'workingHoursContacts' => $texts['workingHoursContacts']['text'],
      'email' => $texts['email']['text'],
      'whatsapp' => $texts['whatsapp']['text'],
      'viber' => $texts['viber']['text'],
      'telegram' => $texts['telegram']['text'],
      'h' => $searchH,
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
    foreach ($products as $p) {
      $cat = $p['cat_name_tech'];
      if (!isset($productsTransformed[$cat])) $productsTransformed[$cat] = [];

      $productsTransformed[$cat][] = $p;
    }

    $counts = $dataProvider->getProductsCountPerCategory();
    $countsTransformed = [];
    foreach ($counts as $count) {
      $countsTransformed[$count['name_tech']] = ceil($count['products_count'] / 16);
    }

    return [$productsTransformed, $countsTransformed];
  }

  public function getDataForTable() {
    $dataProvider = new DataProvider();
    $data = $dataProvider->getDataForTable();

    $curPriceListDate = $data[0]['text'];
    $categories = $data[1];
    $products = $data[2];
    $productsRoshma = $data[3];

    $catalog = [];
    foreach ($categories as $cat) {
      $catalog[$cat['name']] = [];
      foreach ($products as $p) {
        if ($p['category_id'] === $cat['id']) $catalog[$cat['name']][] = $p;
      }
    }
    $catalogWithModels = [];
    foreach ($catalog as $catName => $productsInCat) {
      $catalogWithModels[$catName] = [];
      foreach ($productsInCat as $p) {
        if (!isset($catalogWithModels[$catName][$p['model']])) {
          $catalogWithModels[$catName][$p['model']]['products'] = [];
        }
        $catalogWithModels[$catName][$p['model']]['products'][] = $p;
      }
    }
    foreach ($categories as $cat) {
      $catGroup = &$catalogWithModels[$cat['name']];
      foreach ($catGroup as &$group) {
        $needsOtherRows = count($group['products']) > 1;
        $howMany = $needsOtherRows ? count($group['products']) - 1 : null;

        $group['view'] = [
          'needsOtherRows' => $needsOtherRows,
          'howMany' => $howMany,
        ];
      }
    }

    // roshma
    $catalogRoshma = [];
    foreach ($categories as $cat) {
      $catalogRoshma[$cat['name']] = [];
      foreach ($productsRoshma as $p) {
        if ($p['category_id'] === $cat['id']) $catalogRoshma[$cat['name']][] = $p;
      }
    }
    $catalogWithModelsRoshma = [];
    foreach ($catalogRoshma as $catName => $productsInCat) {
      $catalogWithModelsRoshma[$catName] = [];
      foreach ($productsInCat as $p) {
        if (!isset($catalogWithModelsRoshma[$catName][$p['model']])) {
          $catalogWithModelsRoshma[$catName][$p['model']]['products'] = [];
        }
        $catalogWithModelsRoshma[$catName][$p['model']]['products'][] = $p;
      }
    }
    foreach ($categories as $cat) {
      $catGroup = &$catalogWithModelsRoshma[$cat['name']];
      foreach ($catGroup as &$group) {
        $needsOtherRows = count($group['products']) > 1;
        $howMany = $needsOtherRows ? count($group['products']) - 1 : null;

        $group['view'] = [
          'needsOtherRows' => $needsOtherRows,
          'howMany' => $howMany,
        ];
      }
    }

    return [$curPriceListDate, $catalogWithModels, $catalogWithModelsRoshma];
  }
}