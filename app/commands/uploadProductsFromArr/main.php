<?php

$db = require 'db.php';
$pdo = require 'app/Data/pdo.php';

$products = $db['products']['sprava'];

foreach ($products as $product) {
  // $pdo->exec("INSERT INTO products VALUES (
  //   null,
  //   '{$product['art']}',
  //   '{$product['price']}',
  //   '{$product['category_id']}',
  //   '{$product['model']}',
  //   '{$product['variant']}',
  //   '{$product['unit']}',
  //   '{$product['upakMal']}',
  //   '{$product['upakKrup']}',
  //   '{$product['description']}',
  //   0,
  //   '{$product['img']}',
  //   null,
  //   '{$product['excelFileRowNum']}',
  //   null
  // )");

  $glued = glue($product);
  $pdo->exec("UPDATE products SET name = '$glued' WHERE art = '{$product['art']}'");
}

function glue($p) {
  return $p['model'] . ', ' . $p['variant'];
}