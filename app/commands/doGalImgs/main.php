<?php

$db = require 'db.php';
$pdo = require 'app/Data/pdo.php';

$products = $db['products']['sprava'];

foreach ($products as $p) {
  $imploded = implode(', ', $p['galleryImgs']);
  $pdo->exec("UPDATE products SET galleryImgs = '$imploded' WHERE art = '{$p['art']}'");
}
