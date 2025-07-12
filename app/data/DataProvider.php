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
    $stmt = $this->repository->query("SELECT * FROM texts");
    
    return $stmt->fetchAll();
  }
}