<?php

function humanReadablePhoneToTel($string) {
  $strWoParenthesesAtEnd = preg_replace('/\s*\([^)]*\)$/', '', $string);
  return str_replace(['-', ' ', '(', ')'], '', $strWoParenthesesAtEnd);
}