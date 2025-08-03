<?php

namespace app\Data;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PDO;
use app\Data\DataProvider;

const ERR_NO_FILE_UPLOADED = 4;

class DataUpdater {
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

    if (!move_uploaded_file($file['tmp_name'], 'data/price-lists/' . $file['name'])) {
      $resultMessage = [
        'status' => 'ERR',
        'text' => 'Ошибка при загрузке файла. Скорее всего, что-то не так с файлом.',
      ];
      return $resultMessage;
    }

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
    $msgIfDiff = null;
    $solutionIfDiff = null;
    $fileArts = [];
    $excelProducts = [];
    $spreadsheet = IOFactory::load('data/price-lists/' . $file['name']);
    $activeSheet = $spreadsheet->getActiveSheet();
    $date = str_replace(',', '.', $activeSheet->getCell([1, 1])->getFormattedValue());
    $lastRowNum = $activeSheet->getHighestRow();
    for ($i = 3; $i <= $lastRowNum; $i++) {
      $colVal = $activeSheet->getCell([1, $i])->getFormattedValue();
      if (is_numeric(@$colVal[0])) {
        $fileArts[] = $activeSheet->getCell([1, $i])->getFormattedValue();
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
    $stmtArts = $this->repository->query("SELECT art FROM products");
    $dbArts = $stmtArts->fetchAll(PDO::FETCH_COLUMN);
    $shouldSendDiffProblem = false;
    if ($diff = array_diff($fileArts, $dbArts)) {
      $UNNEEDED_NOZH_ART = '0890-0001-18';
      $UNNEEDED_SHETKA_ART = '1004-0000-01';
      if (array_diff($diff, [$UNNEEDED_NOZH_ART, $UNNEEDED_SHETKA_ART])) {  // if there are more art diffs, not just the unnecessary ones
        $shouldSendDiffProblem = true;
        $arrKey = array_search($UNNEEDED_NOZH_ART, $diff);
        if ($arrKey !== false) $diff[$arrKey] = $diff[$arrKey] . ' (Павел говорил, что этот нож на сайте показывать не надо)';
        $arrKey2 = array_search($UNNEEDED_SHETKA_ART, $diff);
        if ($arrKey2 !== false) $diff[$arrKey2] = $diff[$arrKey2] . ' (Павел говорил, что эту щетку на сайте показывать не надо)';
        $msgIfDiff = '<b>Внимание:</b> обнаружена неконсистентность (несогласованность данных) между товарами из файла прайс-листа и товарами на сайте. Товары со следующими артикулами есть в файле, но отсутствуют на сайте:';
        $solutionIfDiff = 'Скорее всего, в этой ситуации Вы хотите создать эти товары в админ. панели (кроме тех, о которых говорил Павел), чтобы устранить неконсистентность.';
      }
    }

    foreach ($excelProducts as $p) {
      $this->repository->exec("UPDATE products SET price = '{$p['price']}', variant = '{$p['variant']}', unit = '{$p['unit']}', upakMal = '{$p['upakMal']}', upakKrup = '{$p['upakMal']}' WHERE art = '{$p['art']}'");
    }

    $this->repository->exec("UPDATE texts_tech SET text = '{$file['name']}' WHERE name_internal = 'current_price_list'");
    $this->repository->exec("UPDATE texts_tech SET text = '$date' WHERE name_internal = 'current_price_list_date'");

    if ($shouldSendDiffProblem) {
      $resultMessage = [
        'status' => 'OK',
        'text' => 'Прайс-лист был успешно обновлён!',
        'diffProblem' => [
          'msgIfDiff' => $msgIfDiff,
          'diff' => $diff,
          'solutionIfDiff' => $solutionIfDiff,
        ],
      ];
    } else {
      $resultMessage = [
        'status' => 'OK',
        'text' => 'Прайс-лист был успешно обновлён!',
      ];
    }

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

  public function manageCategories($managedCategories) {
    try {
      foreach ($managedCategories as $c) {
        $this->repository->exec("UPDATE categories SET name = '{$c['name']}', description = '{$c['description']}', hidden = {$c['hidden']}, name_tech = '{$c['name_tech']}' WHERE id = {$c['id']}");

        if (isset($c['img'])) {
          $this->repository->exec("UPDATE categories SET img = '{$c['img']}' WHERE id = {$c['id']}");
          $b64 = $c['imgBase64'];
          $bB = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $b64));
          file_put_contents($c['img'], $bB);
        }
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
      'text' => 'Категории были обновлены успешно'
    ];

    return $resultMessage;
  }

  public function editProduct() {
    $id = intval($_POST['id']);
    $dataProvider = new DataProvider();
    $product = $dataProvider->getProduct($id);

    if (empty($_POST)) {
      $incoming = json_decode(file_get_contents('php://input'), true);
      $id = $incoming['id'];
      $hidden = $incoming['hidden'];
      $this->repository->exec("UPDATE products SET hidden = $hidden WHERE id = $id");
      $resultMessage = [
        'status' => 'OK',
        'text' => $hidden ? 'Товар был скрыт успешно' : 'Товар был возвращён успешно',
      ];
      return $resultMessage;
    }

    $resultMessage = [
      'status' => null,
      'payload' => null,
    ];

    $name = $_POST['name'];
    $slug = slugify($name);
    $price = $_POST['price'];
    $category = intval($_POST['category']);
    $hit = $_POST['hit'];
    if ($hit === 'yes') $hit = 1;
    else $hit = 0;
    $unit = $_POST['unit'];
    $upakMal = $_POST['upakMal'];
    $upakKrup = $_POST['upakKrup'];
    $details = $_POST['details'];
    $description = $_POST['description'];
    $currentOrder = $_POST['currentOrder'];

    // var_dump($currentOrder);
    // die();

    $imgPath = $product['img'];
    if ($_FILES['mainImg']['error'] !== ERR_NO_FILE_UPLOADED) {
      $imgPath = '/data/product-imgs/downloaded/' . $_FILES['mainImg']['name'];
      move_uploaded_file($_FILES['mainImg']['tmp_name'], ltrim($imgPath, '/'));
    }
    $galleryImgPaths = empty($currentOrder) ? [] : explode(', ', $currentOrder);
    if ($_FILES['galleryImgs']['error'][0] !== ERR_NO_FILE_UPLOADED) {  // bad
      foreach ($_FILES['galleryImgs']['name'] as $idx => $galImg) {
        $galleryImgPaths[] = '/data/product-imgs/downloaded/' . $_FILES['galleryImgs']['name'][$idx];
        move_uploaded_file($_FILES['galleryImgs']['tmp_name'][$idx], 'data/product-imgs/downloaded/' . $_FILES['galleryImgs']['name'][$idx]);
      }
    }
    $galleryImgPathsStr = implode(', ', $galleryImgPaths);

    try {
       $this->repository->exec(
        "UPDATE products SET
        name = '$name',
        price = '$price',
        img = '$imgPath',
        galleryImgs = '$galleryImgPathsStr',
        category_id = $category,
        isHit = $hit,
        unit = '$unit',
        upakMal = '$upakMal',
        upakKrup = '$upakKrup',
        details = '$details',
        description = '$description',
        slug = '$slug'
        WHERE id = $id"
      );
    } catch (Exception $e) {
      $resultMessage = [
        'status' => 'Err',
        'text' => 'Возникла ошибка базы данных при редактировании товара. ' . $this->contactsIfError,
      ];
      return $resultMessage;
    }

    $resultMessage = [
      'status' => 'OK',
      'text' => 'Товар был отредактирован успешно'
    ];

    return $resultMessage;
  }
}


function slugify($text) {
  $text = str_replace('х', 'x', $text);
  $text = str_replace('ь', '', $text);
  $text = str_replace('ъ', '', $text);
  $text = str_replace('я', 'ya', $text);
  // Transliterate to ASCII
  $text = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $text);
  // Replace non-alphanumeric with dashes
  $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
  // Trim and lowercase
  $text = trim($text, '-');
  $text = strtolower($text);
  return $text;
}