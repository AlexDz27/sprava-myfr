<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
    $map = [
      0 => 'art',
      1 => 'model',
      2 => 'variant',
      3 => 'some_math',
      4 => 'price',
      5 => 'unit',
      6 => 'upakMal',
      7 => 'upakKrup'
    ];
    $excelProducts = [];
    $spreadsheet = IOFactory::load('app/Data/price-lists/' . $file['name']);
    $activeSheet = $spreadsheet->getActiveSheet();
    $date = str_replace(',', '.', $activeSheet->getCell([1, 1])->getFormattedValue());
    $lastRowNum = $activeSheet->getHighestRow();
    for ($i = 3; $i <= $lastRowNum; $i++) {
      $colVal = $activeSheet->getCell([1, $i])->getFormattedValue();
      if (is_numeric(@$colVal[0])) {
        $excelProducts[] = [
          'art' => $activeSheet->getCell([1, $i])->getFormattedValue(),
          'variant' => $activeSheet->getCell([3, $i])->getFormattedValue(),
          'price' => $activeSheet->getCell([5, $i])->getFormattedValue(),
          'unit' => $activeSheet->getCell([6, $i])->getFormattedValue(),
          'upakMal' => $activeSheet->getCell([7, $i])->getFormattedValue(),
          'upakKrup' => $activeSheet->getCell([8, $i])->getFormattedValue(),
        ];
      }
    }
    var_dump($excelProducts);
    die();

    $this->repository->exec("UPDATE texts_tech SET text = '{$file['name']}' WHERE name_internal = 'current_price_list'");
    $this->repository->exec("UPDATE texts_tech SET text = '$date' WHERE name_internal = 'current_price_list_date'");

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