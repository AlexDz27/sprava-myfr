<?php

$db = require 'db.php';
$pdo = require 'app/Data/pdo.php';

$products = $db['products']['sprava'];

$arts = ['0100-0000-10', '0100-0000-15', '0100-0000-20'];
for ($i = 0; $i <= 2; $i++) {
  $product = $products[$arts[$i]];
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
    null
  )");
}
