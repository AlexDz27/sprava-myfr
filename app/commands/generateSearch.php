<?php

$pdo = require 'app/Data/pdo.php';

$ps = $pdo->query("SELECT p.id, p.slug, p.img, p.name, p.model, p.variant, c.slug AS cat_slug FROM products p JOIN categories c ON category_id = c.id WHERE p.is_deleted = 0 AND p.hidden = 0")->fetchAll();
$psWithUris = [];
foreach ($ps as &$p) {
  $p['uri'] = '/catalog/' . $p['cat_slug'] . '/' . $p['slug'];
}
$json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$h = $pdo->query("SELECT h FROM search")->fetch()['h'];
$hPlusOne = $h + 1;
$pdo->exec("UPDATE search SET h = $hPlusOne, products = '$json'");
