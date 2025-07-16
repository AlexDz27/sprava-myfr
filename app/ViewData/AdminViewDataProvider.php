<?php

class AdminViewDataProvider {
  public function getTextsForAdmin() {
    $dataProvider = new DataProvider();
    $texts = $dataProvider->getTextsForAdmin();

    return $texts;
  }
}