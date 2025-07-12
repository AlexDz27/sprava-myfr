<?php

$pdo = new PDO('sqlite:app/data/sprava.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

return $pdo;

// $stmt = $pdo->query("SELECT * FROM texts");
// $arr = $stmt->fetchAll();
// foreach ($arr as $i) {
//   echo "<pre>";
//   print_r($i);
//   echo "</pre>";
// }
// die();
