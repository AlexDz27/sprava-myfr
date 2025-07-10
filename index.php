<?php

$db = new SQLite3('app/data/sprava.db');
$result = $db->query('SELECT * FROM texts');
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: {$row['id']}, Text: {$row['text']}\n";
}
var_dump($db);
die();

require 'app/routing/routing.php';