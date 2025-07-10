<?php

// ideally this file should hash all registered assets. 
// There should be notion of Router)/App being aware of Pages and their Assets

// TODO: update the files in the View
// TODO: separate rehashing of one file and another (currently all files are rehashed)

$cssFile = 'front-end/assets/css/style.h-1.css';
$jsFile = 'front-end/assets/js/main.h-1.js';

foreach ([$cssFile, $jsFile] as $file) {
  // Update hash number
  $baseName = basename($file);
  $baseNameParts = explode('.', $baseName);

  $hashNumberPart = $baseNameParts[1];
  $hashNumber = explode('-', $hashNumberPart)[1];
  $hashNumber++;

  $hashNumberPartUpdated = 'h-' . $hashNumber;
  $baseNameParts[1] = $hashNumberPartUpdated;
  $baseNameUpdated = implode('.', $baseNameParts);

  // Update the full file name and finally rename
  $fileNameParts = explode('/', $file);
  $fileNameParts[count($fileNameParts) - 1] = $baseNameUpdated;
  $fileNameUpdated = implode('/', $fileNameParts);
  
  rename($file, $fileNameUpdated);
}