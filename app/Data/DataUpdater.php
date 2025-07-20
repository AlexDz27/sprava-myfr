<?php

const ERR_NO_FILE_UPLOADED = 4;

class DataUpdater {
  // TODO: repository -> separate file. But there might arise problems with 'same classname declared twice' when using require. Maybe finally use proper classes autoloading?
  public $repository;
  public $contactsIfError = 'Свяжитесь с программистом Алексеем по тел/вайбер/вацап/тг: +375 29 819 16 24; тг: @rain_xxxx';

  public function __construct() {
    $this->repository = require 'app/Data/pdo.php';
  }

  public function updatePrice() {
    $resultMessage = [
      'status' => null,
      'text' => null,
    ];

    $file = $_FILES['file'];
    if ($file['error'] === ERR_NO_FILE_UPLOADED) {
      $resultMessage = [
        'status' => 'ERR',
        'text' => 'Ошибка: файл не был выбран',
      ];
      return $resultMessage;
    }
    if ($file['type'] !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
      $resultMessage = [
        'status' => 'ERR',
        'text' => 'Ошибка: файл не является Excel-файлом.',
      ];
      return $resultMessage;
    }

    if (!move_uploaded_file($file['tmp_name'], 'app/Data/price-lists/' . $file['name'])) {
      $resultMessage = [
        'status' => 'ERR',
        'text' => 'Ошибка при загрузке файла. Скорее всего, что-то не так с файлом.',
      ];
      return $resultMessage;
    }

    // TODO: actually change

    $resultMessage = [
      'status' => 'OK',
      'text' => 'Прайс-лист был успешно обновлён!',
    ];

    return $resultMessage;
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