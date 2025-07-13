<?php

// TODO: use sqlite instead of this shit)
class AdminViewDataProvider {
  public function getTextsForAdmin() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTextsForAdmin();
    var_dump($texts);

    $textsTransformed = [
      'phones' => [],
      'address' => ''
    ];
    
    // todo: phones
    $textsTransformed['phones'] = array_filter($texts, function($text) {
      return str_contains($text['name_internal'] ?? '', 'phone');
    });

    $addressRaw = array_filter($texts, function($text) {
      return $text['name'] === 'Адрес';
    });
    $textsTransformed['address'] = array_values($addressRaw);

    var_dump($textsTransformed);
    die();

    return $textsTransformed;
  }
}