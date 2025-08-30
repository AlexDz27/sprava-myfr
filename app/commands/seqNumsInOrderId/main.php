<?php

$pdo = require 'app/Data/pdo.php';

$stmt = $pdo->query("SELECT id FROM products");
$ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
// var_dump($ids);
// die();

for ($i = 1; $i <= 142; $i++) {
  $id = $ids[$i - 1];
  $pdo->exec("UPDATE products SET order_id = $i WHERE id = $id");
}
