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
}