<?php

require 'app/Data/DataProvider.php';
require 'transformations.php';

class ViewDataProvider {
  public function getTexts() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTexts();

    // var_dump($texts);

    $textsTransformed = [
      'phones' => [
        'header' => [],
        'mapSection' => [],
      ],
      'address' => '',
    ];

    $phonesForHeaderRaw = array_filter($texts, function($text) {
      return str_contains($text['name'], 'Телефон 1') || str_contains($text['name'], 'Телефон 2');
    });
    $phonesForHeader = array_map(function($phone) {
      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $phonesForHeaderRaw);
    $textsTransformed['phones']['header'] = $phonesForHeader;

    $textsTransformed['phones']['mapSection'] = '';

    // var_dump($textsTransformed);
    // die();

    return $textsTransformed;
  }
}