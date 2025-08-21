<?php

// TODO: deal with slug

$pdo = require 'app/Data/pdo.php';

$ps = $pdo->query("SELECT id, slug, img, name, model, variant FROM products WHERE is_deleted = 0 AND hidden = 0")->fetchAll();
$json = json_encode($ps, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$h = $pdo->query("SELECT h FROM search")->fetch()['h'];
$hPlusOne = $h + 1;
$pdo->exec("UPDATE search SET h = $hPlusOne, products = '$json'");

// var_dump($ps);
// die();