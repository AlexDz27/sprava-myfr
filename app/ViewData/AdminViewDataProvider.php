<?php

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
}