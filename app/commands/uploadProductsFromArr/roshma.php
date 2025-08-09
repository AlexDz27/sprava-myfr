<?php

$db = require 'db.php';
$pdo = require 'app/Data/pdo.php';

$products = $db['products']['roshma'];

foreach ($products as $product) {
  $name = glue($product);

  $pdo->exec("INSERT INTO products VALUES (
    null,
    '{$product['art']}',
    '{$product['price']}',
    '{$product['category_id']}',
    '{$product['model']}',
    '{$product['variant']}',
    '{$product['unit']}',
    '{$product['upakMal']}',
    '{$product['upakKrup']}',
    '{$product['description']}',
    0,
    '{$product['img']}',
    null,
    '{$product['excelFileRowNum']}',
    2,
    '$name',
    0,
    null,
    null,
    0
  )");
}

function glue($p) {
  return $p['model'] . ', ' . $p['variant'];
}