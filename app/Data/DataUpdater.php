<?php

class DataUpdater {
  // TODO: repository -> separate file. But there might arise problems with 'same classname declared twice' when using require. Maybe finally use proper classes autoloading?
  public $repository;
  public $contactsIfError = 'Свяжитесь с программистом Алексеем по тел/вайбер/вацап/тг: +375 29 819 16 24; тг: @rain_xxxx';

  public function __construct() {
    $this->repository = require 'app/Data/pdo.php';
  }

  public function editTexts($editedTexts) {
    $resultMessage = [
      'status' => null,
      'text' => null,
    ];

    try {
      foreach ($editedTexts as $id => $value) {
        $this->repository->exec("UPDATE texts SET text = '$value' WHERE id = $id");
      }
    } catch (Exception $e) {
      $resultMessage = [
        'status' => 'Err',
        'text' => 'Возникла ошибка базы данных при обновлении текстов. ' . $this->contactsIfError,
      ];
      return $resultMessage;
    }

    $resultMessage = [
      'status' => 'OK',
      'text' => 'Тексты были обновлены успешно'
    ];

    return $resultMessage;
  }
}