<?php

class DataProvider {
  public $repository;

  public function __construct() {
    $this->repository = require 'app/Data/pdo.php';
  }

  public function getTexts() {
    $stmtPhones = $this->repository->query("SELECT * FROM texts WHERE name_internal LIKE '%phone%' AND hidden = 0");
    $phones = $stmtPhones->fetchAll();

    $stmtAddress = $this->repository->query("SELECT * FROM texts WHERE name = 'Адрес'");
    $address = $stmtAddress->fetch();

    $texts = [
      'phones' => $phones,
      'address' => $address,
    ];

    return $texts;
  }
  public function getTextsForAdmin() {
    $stmtPhones = $this->repository->query("SELECT * FROM texts WHERE name_internal LIKE '%phone%'");
    $phones = $stmtPhones->fetchAll();

    $stmtAddress = $this->repository->query("SELECT * FROM texts WHERE name = 'Адрес'");
    $address = $stmtAddress->fetch();

    $texts = [
      'phones' => $phones,
      'address' => $address,
    ];
    
    return $texts;
  }

  public function getPriceListTexts() {
    $stmtPriceList = $this->repository->query("SELECT * FROM texts_tech WHERE name_internal = 'current_price_list'");
    $priceList = $stmtPriceList->fetch();

    $stmtPriceListDateOfUpload = $this->repository->query("SELECT * FROM texts_tech WHERE name_internal = 'current_price_list_date_when_uploaded'");
    $priceListDateOfUpload = $stmtPriceListDateOfUpload->fetch();

    $priceListTexts = [
      'priceListFileName' => $priceList['text'],
      'priceListDateOfUpload' => $priceListDateOfUpload['text'],
    ];

    return $priceListTexts;
  }

  public function getCategories() {
    $stmtCategories = $this->repository->query("SELECT * FROM categories");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }
}