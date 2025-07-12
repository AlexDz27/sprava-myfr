<?php

require 'app/Data/DataProvider.php';
require 'transformationFunctions.php';

class ViewDataProvider {
  public function getTexts() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTexts();

    var_dump($texts);

    $textsTransformed = [
      'phones' => [
        'header' => [],
        'contacts' => [],
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

    $phonesForContactsRaw = array_filter($texts, function($text) {
      return str_contains($text['name_internal'], 'phone');
    });
    addDerivativePhones2($phonesForContactsRaw);
    var_dump($phonesForContactsRaw);
    die();
    $phonesForContacts = array_map(function($phone) {
      return [humanReadablePhoneToTel($phone['text']), $phone['text']];
    }, $phonesForHeaderRaw);
    $textsTransformed['phones']['contacts'] = $phonesForContacts;

    var_dump($textsTransformed);
    die();

    return $textsTransformed;
  }
}