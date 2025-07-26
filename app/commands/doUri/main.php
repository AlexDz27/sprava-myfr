<?php

$db = require 'db.php';
$pdo = require 'app/Data/pdo.php';

$products = $db['products']['sprava'];

foreach ($products as $p) {
  $lastUriPart = substringFromEndUntilChar($p['uri'], '/');
  $pdo->exec("UPDATE products SET slug = '$lastUriPart' WHERE art = '{$p['art']}'");
}


function substringFromEndUntilChar($string, $char) {
    // Find the last occurrence of the character
    $pos = strrpos($string, $char);
    
    // If character not found, return empty string or the whole string based on your needs
    if ($pos === false) {
        return ''; // or return $string; depending on requirements
    }
    
    // Return the substring from the position after the character to the end
    return substr($string, $pos + 1);
}