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
}