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
  public function getCategoriesForHome() {
    $stmtCategories = $this->repository->query("SELECT id, name, description, img, name_tech, name_view FROM categories WHERE hidden = 0");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }
  public function getCategoriesForCatalog() {
    $stmtCategories = $this->repository->query("SELECT id, name, name_tech, name_view FROM categories WHERE hidden = 0");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }

  public function getProductsForCatalog() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.name, p.price, p.unit, p.isHit, p.img, c.name_tech AS cat_name_tech FROM products p JOIN categories c ON category_id = c.id WHERE p.hidden = 0");
    $products = $stmtProducts->fetchAll();

    return $products;
  }
  public function getProductsForAdmin() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.name, p.price, p.unit, p.isHit, p.img, c.name_tech AS cat_name_tech, c.name AS cat_name, c.hidden AS cat_hidden FROM products p JOIN categories c ON category_id = c.id");
    $products = $stmtProducts->fetchAll();

    var_dump($products);
    die();

    return $products;
  }
}