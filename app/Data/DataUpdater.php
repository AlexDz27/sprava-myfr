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
    
    foreach ($excelProducts as $p) {
      $this->repository->exec("UPDATE products SET price = '{$p['price']}', variant = '{$p['variant']}', unit = '{$p['unit']}', upakMal = '{$p['upakMal']}', upakKrup = '{$p['upakMal']}' WHERE art = '{$p['art']}'");
    }
    
    $this->repository->exec("UPDATE texts_tech SET text = '{$file['name']}' WHERE name_internal = 'current_price_list'");
    $this->repository->exec("UPDATE texts_tech SET text = '$date' WHERE name_internal = 'current_price_list_date'");
    
    $resultMessage = [
      'status' => 'OK',
      'text' => 'Прайс-лист был успешно обновлён! Данные товаров обновились.',
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
  
  public function manageCategories($managedCategories) {
    if (isset($managedCategories['justHidden'])) {
      $id = $managedCategories['id'];
      $hidden = $managedCategories['hidden'];
      $this->repository->exec("UPDATE categories SET hidden = $hidden WHERE id = $id");
      $resultMessage = [
        'status' => 'OK',
        'text' => $hidden ? 'Категория была скрыта успешно' : 'Категория была возвращена успешно',
      ];
      return $resultMessage;
    } else if (isset($managedCategories['is_deleted'])) {
      $id = $managedCategories['id'];
      $isDeleted = $managedCategories['is_deleted'];
      $this->repository->exec("UPDATE categories SET is_deleted = $isDeleted WHERE id = $id");
      $resultMessage = [
        'status' => 'OK',
        'text' => 'Категория была удалена успешно',
      ];
      return $resultMessage;
    }
    
    $postImgsErrors = [];
    foreach ($_FILES as $catId => $postImg) {
      if ($postImg['error']['img'] === 0) {
        $imgPath = '/data/product-imgs/downloaded/' . $postImg['name']['img'];
        move_uploaded_file($postImg['tmp_name']['img'], ltrim($imgPath, '/'));
        $this->repository->exec("UPDATE categories SET img = '$imgPath' WHERE id = $catId");
      } else {
        if ($postImg['error']['img'] === ERR_NO_FILE_UPLOADED) continue;
        $postImgsErrors[] = 'ОШИБКА: Не удалось загрузить картинку с названием "' . $postImg['name']['img'] . '"';
      }
    }
    
    try {
      foreach ($_POST as $c) {
        $this->repository->exec("UPDATE categories SET name = '{$c['name']}', description = '{$c['description']}', hidden = {$c['hidden']}, name_tech = '{$c['name_tech']}', name_view = '{$c['name_view']}' WHERE id = {$c['id']}");
      }
    } catch (Exception $e) {
      $resultMessage = [
        'status' => 'Err',
        'text' => 'Возникла ошибка базы данных при редактировании категорий. ' . $this->contactsIfError,
      ];
      return $resultMessage;
    }
    
    $resultMessage = [
      'status' => 'OK',
      'text' => 'Категории были обновлены успешно',
      'additionalText' => $postImgsErrors
    ];
    
    return $resultMessage;
  }
  
  public function editProduct() {
    if (empty($_POST)) {
      $incoming = json_decode(file_get_contents('php://input'), true);
      $id = $incoming['id'];
      if (isset($incoming['hidden'])) {
        $hidden = $incoming['hidden'];
        $this->repository->exec("UPDATE products SET hidden = $hidden WHERE id = $id");

        // Обновить поиск
        $ps = $this->repository->query("SELECT p.id, p.slug, p.img, p.name, p.model, p.variant, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0")->fetchAll();
        $psWithUris = [];
        foreach ($ps as &$p) {
          $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
        }
        $json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $h = $this->repository->query("SELECT h FROM search")->fetch()['h'];
        $hPlusOne = $h + 1;
        $this->repository->exec("UPDATE search SET h = $hPlusOne, products = '$json'");
        // /Обновить поиск

        $resultMessage = [
          'status' => 'OK',
          'text' => $hidden ? 'Товар был скрыт успешно' : 'Товар был возвращён успешно',
        ];
        return $resultMessage;
      } else if (isset($incoming['is_deleted'])) {
        $isDeleted = $incoming['is_deleted'];
        $this->repository->exec("UPDATE products SET is_deleted = $isDeleted WHERE id = $id");

        // Обновить поиск
        $ps = $this->repository->query("SELECT p.id, p.slug, p.img, p.name, p.model, p.variant, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0")->fetchAll();
        $psWithUris = [];
        foreach ($ps as &$p) {
          $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
        }
        $json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $h = $this->repository->query("SELECT h FROM search")->fetch()['h'];
        $hPlusOne = $h + 1;
        $this->repository->exec("UPDATE search SET h = $hPlusOne, products = '$json'");
        // /Обновить поиск

        $resultMessage = [
          'status' => 'OK',
          'text' => 'Товар был удалён успешно',
        ];
        return $resultMessage;
      }
    }
    
    $id = intval($_POST['id']);
    $dataProvider = new DataProvider();
    $product = $dataProvider->getProduct($id);
    
    $resultMessage = [
      'status' => null,
      'payload' => null,
    ];
    
    $name = $_POST['name'];
    $slug = slugify($name);
    $price = $_POST['price'];
    $variant = $_POST['variant'];
    $category = intval($_POST['category']);
    $company = intval($_POST['company']);
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
    } else {
      $imgPath = '/front-end/site/assets/img/no-pic.jpg';
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
        variant = '$variant',
        img = '$imgPath',
        galleryImgs = '$galleryImgPathsStr',
        category_id = $category,
        company_id = $company,
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

    // Обновить поиск
    $ps = $this->repository->query("SELECT p.id, p.slug, p.img, p.name, p.model, p.variant, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0")->fetchAll();
    $psWithUris = [];
    foreach ($ps as &$p) {
      $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
    }
    $json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $h = $this->repository->query("SELECT h FROM search")->fetch()['h'];
    $hPlusOne = $h + 1;
    $this->repository->exec("UPDATE search SET h = $hPlusOne, products = '$json'");
    // /Обновить поиск
    
    $resultMessage = [
      'status' => 'OK',
      'text' => 'Товар был отредактирован успешно'
    ];
    
    return $resultMessage;
  }
  public function createProduct() {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $variant = $_POST['variant'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $company = $_POST['company'];
    $art = $_POST['art'];
    $unit = $_POST['unit'];
    $upakMal = $_POST['upakMal'];
    $upakKrup = $_POST['upakKrup'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $slug = slugify($name);
    $galleryImgsOrdered = $_POST['galleryImgsOrdered'];
    
    $imgPath = $_FILES['mainImg'];
    if ($_FILES['mainImg']['error'] !== ERR_NO_FILE_UPLOADED) {
      $imgPath = '/data/product-imgs/downloaded/' . $_FILES['mainImg']['name'];
      move_uploaded_file($_FILES['mainImg']['tmp_name'], ltrim($imgPath, '/'));
    } else {
      $imgPath = '/front-end/site/assets/img/no-pic.jpg';
    }
    $galleryImgPathsStr = '';
    if (!empty($galleryImgsOrdered)) {
      $galleryImgPaths = [];
      if ($_FILES['galleryImgs']['error'][0] !== ERR_NO_FILE_UPLOADED) {  // bad
        foreach ($_FILES['galleryImgs']['name'] as $idx => $galImg) {
          $galleryImgPaths[] = '/data/product-imgs/downloaded/' . $_FILES['galleryImgs']['name'][$idx];
          move_uploaded_file($_FILES['galleryImgs']['tmp_name'][$idx], 'data/product-imgs/downloaded/' . $_FILES['galleryImgs']['name'][$idx]);
        }
      }
      $galleryImgPathsStr = implode(', ', $galleryImgPaths);
    }
    
    try {
      $this->repository->exec(
        "INSERT INTO products (name, price, variant, model, img, galleryImgs, category_id, company_id, art, unit, upakMal, upakKrup, isHit, description, details, slug, hidden, is_deleted) VALUES ('$name', '$price', '$variant', '$model', '$imgPath', '$galleryImgPathsStr', '$category', '$company', '$art', '$unit', '$upakMal', '$upakKrup', 0, '$description', '$details', '$slug', 0, 0)"
      );
    } catch (Exception $e) {
      $resultMessage = [
        'status' => 'Err',
        'text' => 'Возникла ошибка базы данных при создании товара. ' . $this->contactsIfError,
      ];
      return $resultMessage;
    }

    // Обновить поиск
    $ps = $this->repository->query("SELECT p.id, p.slug, p.img, p.name, p.model, p.variant, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0")->fetchAll();
    $psWithUris = [];
    foreach ($ps as &$p) {
      $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
    }
    $json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $h = $this->repository->query("SELECT h FROM search")->fetch()['h'];
    $hPlusOne = $h + 1;
    $this->repository->exec("UPDATE search SET h = $hPlusOne, products = '$json'");
    // /Обновить поиск
    
    $resultMessage = [
      'status' => 'OK',
      'text' => 'Товар был создан успешно'
    ];
    
    return $resultMessage;
  }

  public function createCategory() {
    $resultMessage = [
      'status' => null,
      'payload' => null,
    ];

    $name = $_POST['name'];
    $nameTech = $_POST['name_tech'];
    $description = $_POST['description'];
    $slug = slugify($name);
    $nameView = $_POST['name_view'];
    $img = $_FILES['mainImg'];

    try {
      $imgPath = null;
      if ($img['error'] === 0) {
        $imgPath = '/data/product-imgs/downloaded/' . $img['name'];
        move_uploaded_file($img['tmp_name'], ltrim($imgPath, '/'));
      }

      $this->repository->exec("
      INSERT INTO categories (name, description, img, hidden, name_tech, name_view, slug, is_deleted) 
      VALUES ('$name', '$description', '$imgPath', 0, '$nameTech', '$nameView', '$slug', 0)
      ");
    } catch (Exception $e) {
      $resultMessage = [
        'status' => 'Err',
        'text' => 'Возникла ошибка базы данных при создании категории. ' . $this->contactsIfError,
      ];
      return $resultMessage;
    }

    $resultMessage = [
      'status' => 'OK',
      'text' => 'Категория была создана успешно',
    ];
    
    return $resultMessage;
  }
}


function slugify($text) {
  $text = str_replace('х', 'x', $text);
  $text = str_replace('ь', '', $text);
  $text = str_replace('ъ', '', $text);
  $text = str_replace('я', 'ya', $text);
  // TODO: (refactoring) convert all ambigious russian letters to english, not just Р (русское р) + not lower/uppercase, but rather convert the text to lowercase firsthand)
  $text = str_replace('р', 'p', $text);
  $text = str_replace('Р', 'P', $text);
  // Transliterate to ASCII
  $text = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $text);
  // Replace non-alphanumeric with dashes
  $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
  // Trim and lowercase
  $text = trim($text, '-');
  $text = strtolower($text);
  return $text;
}