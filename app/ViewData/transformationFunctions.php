<?php

require 'stringFunctions.php';

function humanReadablePhoneToTel($string) {
  $strWoParenthesesAtEnd = preg_replace('/\s*\([^)]*\)$/', '', $string);
  return str_replace(['-', ' ', '(', ')'], '', $strWoParenthesesAtEnd);
}

// find FIRST phone with other phones and make derivatives out of it
// TODO: refactor блять
function addDerivativePhones2(&$phonesRaw) {
  $phonesRawWithDerivatives = [];
  $alreadyFoundFirstPhone = false;

  foreach ($phonesRaw as $phone) {
    if (str_ends_with($phone['text'], ')') && !$alreadyFoundFirstPhone) {
      
    } else {
      $phonesRawWithDerivatives[] = $phone;
    }
  }

  // TODO: подменить в конце просто
}

function addDerivativePhones(&$phonesRaw) {
  $phonesRaw = ['zxc' => 'qwe'];
  
  // $result = [];
  // $alreadyFoundFirstPhone = false;
  // // $pattern = '/\([^)]*\)(?=[^()]*$)/';

  // foreach ($phonesRaw as $phone) {
  //   if (str_ends_with($phone['text'], ')') && !$alreadyFoundFirstPhone) {
  //     $numbersInParentheses = substringFromEndUntilChar($phone['text'], '(');
  //     var_dump($numbersInParentheses);
  //     die();
  //     $phone['text'] = preg_replace('/\s*\([^)]*\)$/', '', $phone['text']);
  //     $result[] = $phone;
  //     foreach (explode(',', substringFromEndUntilChar()) as $numbers) {
  //       $result[] = ['text' => $numbers];
  //     }
  //     $alreadyFoundFirstPhone = true;
  //   } else {
  //     $result[] = $phone;
  //   }
  // }

  // return $result;
}