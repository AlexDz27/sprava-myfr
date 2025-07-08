<?php

define('ROOT', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR);

function load($path) {
  require ROOT . $path;
}