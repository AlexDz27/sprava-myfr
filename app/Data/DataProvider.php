<?php

class DataProvider {
  public $repository;

  public function __construct() {
    $this->repository = require 'app/Data/pdo.php';
  }

  public function getTexts() {
    $stmt = $this->repository->query("SELECT * FROM texts WHERE hidden = 0");
    
    return $stmt->fetchAll();
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
}