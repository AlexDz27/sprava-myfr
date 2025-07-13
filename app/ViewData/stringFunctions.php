<?php

function substringFromEndUntilChar($string, $char) {
  // Find the last occurrence of the character
  $lastPos = strrpos($string, $char);
  
  // If character not found, return the entire string or empty string based on your needs
  if ($lastPos === false) {
    return ''; // or return $string if you want the full string when char not found
  }
  
  // Return the substring from after the character to the end
  return substr($string, $lastPos + 1);
}
