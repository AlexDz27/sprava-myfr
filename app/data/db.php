<?php

$host = 'localhost';
$db   = 'test';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
  $pdo = new PDO($dsn, $user, $pass, $opt);

  $stmt = $pdo->prepare("SELECT * FROM `balances`");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach ($stmt->fetchAll() as $item) {
    echo "<pre>";
    print_r($item);
    echo "</pre>";
  }

} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}