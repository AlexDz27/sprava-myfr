<?php

namespace app\Data;

class DataProvider {
  public $repository;

  public function __construct() {
    $this->repository = require 'app/Data/pdo.php';
  }

  public function getTexts() {
    $stmtPhones = $this->repository->query("SELECT * FROM texts WHERE name_internal LIKE '%phone%'");
    $phones = $stmtPhones->fetchAll();

    $stmtAddress = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'address'");
    $address = $stmtAddress->fetch();

    $stmtWorkingHoursHeader = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'working_hours_header'");
    $workingHoursHeader = $stmtWorkingHoursHeader->fetch();
    $stmtWorkingHoursContacts = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'working_hours_contacts'");
    $workingHoursContacts = $stmtWorkingHoursContacts->fetch();

    $stmtEmail = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'email'");
    $email = $stmtEmail->fetch();

    $stmtWhatsapp = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'whatsapp'");
    $whatsapp = $stmtWhatsapp->fetch();
    $stmtViber = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'viber'");
    $viber = $stmtViber->fetch();
    $stmtTelegram = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'telegram'");
    $telegram = $stmtTelegram->fetch();

    $texts = [
      'phones' => $phones,
      'address' => $address,
      'workingHoursHeader' => $workingHoursHeader,
      'workingHoursContacts' => $workingHoursContacts,
      'email' => $email,
      'whatsapp' => $whatsapp,
      'viber' => $viber,
      'telegram' => $telegram,
    ];

    return $texts;
  }
  public function getTextsForAdmin() {
    $stmtPhones = $this->repository->query("SELECT * FROM texts WHERE name_internal LIKE '%phone%'");
    $phones = $stmtPhones->fetchAll();

    $stmtAddress = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'address'");
    $address = $stmtAddress->fetch();

    $stmtWorkingHoursHeader = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'working_hours_header'");
    $workingHoursHeader = $stmtWorkingHoursHeader->fetch();
    $stmtWorkingHoursContacts = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'working_hours_contacts'");
    $workingHoursContacts = $stmtWorkingHoursContacts->fetch();

    $stmtEmail = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'email'");
    $email = $stmtEmail->fetch();

    $stmtWhatsapp = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'whatsapp'");
    $whatsapp = $stmtWhatsapp->fetch();
    $stmtViber = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'viber'");
    $viber = $stmtViber->fetch();
    $stmtTelegram = $this->repository->query("SELECT * FROM texts WHERE name_internal = 'telegram'");
    $telegram = $stmtTelegram->fetch();

    $texts = [
      'phones' => $phones,
      'address' => $address,
      'workingHoursHeader' => $workingHoursHeader,
      'workingHoursContacts' => $workingHoursContacts,
      'email' => $email,
      'whatsapp' => $whatsapp,
      'viber' => $viber,
      'telegram' => $telegram,
    ];
    
    return $texts;
  }

  public function getSearchH() {
    $h = $this->repository->query("SELECT h FROM search")->fetch()['h'];
    
    return $h;
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

  public function getCategoriesForAdmin() {
    // TODO: order by for catalog
    $stmtCategories = $this->repository->query("SELECT * FROM categories WHERE is_deleted = 0 ORDER BY order_id");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }
  public function getCategoriesForHome() {
    $stmtCategories = $this->repository->query("SELECT id, name, description, img, name_tech, name_view FROM categories WHERE is_deleted = 0 AND hidden = 0 ORDER BY order_id");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }
  public function getCategoriesForCatalog() {
    $stmtCategories = $this->repository->query("SELECT id, name, name_tech, name_view, order_id FROM categories WHERE is_deleted = 0 AND hidden = 0 ORDER BY order_id");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }
  public function getCategoriesForManagingProduct() {
    $stmtCategories = $this->repository->query("SELECT id, name, name_tech FROM categories ORDER BY order_id");
    $categories = $stmtCategories->fetchAll();

    return $categories;
  }

  public function getCompaniesForManagingProduct() {
    return $this->repository->query("SELECT id, name FROM companies")->fetchAll();
  }

  public function getProduct($id) {
    $stmtProduct = $this->repository->query("SELECT * FROM products WHERE id = $id");
    $product = $stmtProduct->fetch();

    return $product;
  }
  public function getProductsForCatalog() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.name, p.price, p.unit, p.isHit, p.img, p.slug, p.order_id, c.name_tech AS cat_name_tech, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0 ORDER BY p.order_id");
    $products = $stmtProducts->fetchAll();

    return $products;
  }
  public function getProductsForAdmin() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.name, p.art, p.variant, p.hidden, p.description, p.category_id, p.company_id, p.price, p.slug, p.unit, p.isHit, p.img, p.galleryImgs, p.upakMal, p.upakKrup, p.details, p.is_deleted, p.order_id, c.name_tech AS cat_name_tech, c.name AS cat_name, c.hidden AS cat_hidden, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 ORDER BY p.order_id");
    $products = $stmtProducts->fetchAll();

    return $products;
  }
  public function getProductsForAdminRoshma() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.name, p.art, p.hidden, p.description, p.category_id, p.company_id, p.price, p.slug, p.unit, p.isHit, p.img, p.galleryImgs, p.upakMal, p.upakKrup, p.details, p.is_deleted, c.name_tech AS cat_name_tech, c.name AS cat_name, c.hidden AS cat_hidden, c.slug AS cat_slug FROM products_roshma p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0");
    $products = $stmtProducts->fetchAll();

    return $products;
  }

  public function getProductsCountPerCategory() {
    $stmt = $this->repository->query("SELECT c.name_tech, COUNT (p.id) AS products_count FROM categories c JOIN products p ON c.id = p.category_id AND p.is_deleted = 0 AND p.hidden = 0 GROUP BY c.name_tech ORDER BY c.id");
    $counts = $stmt->fetchAll();

    return $counts;
  }

  public function getProductRoutes() {
    $stmtProducts = $this->repository->query("SELECT p.id, p.art, p.price, p.unit, p.upakMal, p.upakKrup, p.name, p.img, p.galleryImgs, p.slug, p.isHit, p.description, p.details, c.slug AS cat_slug, c.name_tech AS cat_name_tech, c.name AS cat_name FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0");
    $products = $stmtProducts->fetchAll();

    $routes = [];
    foreach ($products as $p) {
      $routes['/catalog/' . $p['cat_slug'] . '/' . $p['slug']] = $p;
    }

    return $routes;
  }

  public function getDataForTable() {
    $stmtDate = $this->repository->query("SELECT text FROM texts_tech WHERE name_internal = 'current_price_list_date'");
    $date = $stmtDate->fetch();
    $stmtCategories = $this->repository->query("SELECT id, name FROM categories WHERE hidden = 0 AND is_deleted = 0");
    $categories = $stmtCategories->fetchAll();
    $stmtProducts = $this->repository->query("SELECT id, art, model, img, variant, name, price, unit, upakMal, upakKrup, category_id FROM products WHERE hidden = 0 AND is_deleted = 0 ORDER BY category_id, order_id");
    $products = $stmtProducts->fetchAll();
    $stmtProductsRoshma = $this->repository->query("SELECT id, art, model, img, variant, name, price, unit, upakMal, upakKrup, category_id FROM products_roshma WHERE hidden = 0 AND is_deleted = 0 ORDER BY category_id");
    $productsRoshma = $stmtProductsRoshma->fetchAll();
    
    return [$date, $categories, $products, $productsRoshma];
  }

  public function getSearch() {
    $stmt = $this->repository->query("SELECT h, products FROM search");
    $search = $stmt->fetch();

    return $search;
  }
}