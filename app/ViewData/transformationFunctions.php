<?php

require 'stringFunctions.php';

// kinda global var to be used in glueParentPhoneAndDerivativeNumberPair(). Bc i was lazy
$derivativePhoneNumbersLength = null;

function humanReadablePhoneToTel($string) {
  $strWoParenthesesAtEnd = preg_replace('/\s*\([^)]*\)$/', '', $string);
  return str_replace(['-', ' ', '(', ')'], '', $strWoParenthesesAtEnd);
}

// find FIRST phone with other phones and make derivatives out of it
// TODO: refactor блять
function addDerivativePhones(&$phonesRaw) {
  $phonesRawWithDerivatives = [];
  $alreadyFoundFirstPhone = false;

  foreach ($phonesRaw as $phone) {
    if (str_ends_with($phone['text'], ')') && !$alreadyFoundFirstPhone) {
      $numberPairs = explodePhoneLastParentheses($phone['text']);

      $originalPhoneParentText = $phone['text'];
      // TODO: remove the parents from $phone['text']
      global $derivativePhoneNumbersLength;
      $additionalCharsCount = 2 + 1;  // two parentheses, one space at end
      $phone['text'] = substr($phone['text'], 0, -$derivativePhoneNumbersLength - $additionalCharsCount);
      $phonesRawWithDerivatives[] = $phone;

      foreach ($numberPairs as $numberPair) {
        $phonesRawWithDerivatives[] = ['text' => glueParentPhoneAndDerivativeNumberPair($originalPhoneParentText, $numberPair)];
      }
    } else {
      $phonesRawWithDerivatives[] = $phone;
    }
  }

  // TODO: подменить в конце просто
  $phonesRaw = $phonesRawWithDerivatives;
}
function explodePhoneLastParentheses($phoneText) {
  $posOfBeginParenthesis = strrpos($phoneText, '(');
  $phoneTextWoEndingParenthesis = rtrim($phoneText, ')');
  $numbers = substr($phoneTextWoEndingParenthesis, $posOfBeginParenthesis + 1);
  global $derivativePhoneNumbersLength;
  $derivativePhoneNumbersLength = strlen($numbers);

  return explode(', ', $numbers);
}
function glueParentPhoneAndDerivativeNumberPair($phoneParent, $numberPair) {
  global $derivativePhoneNumbersLength;
  $additionalCharsCount = 2 + 1 + 2;  // two parentheses, one space at end, and last two numbers in the parent phone
  $r = substr($phoneParent, 0, -$derivativePhoneNumbersLength - $additionalCharsCount);
  $r .= $numberPair;
  return $r;
}
