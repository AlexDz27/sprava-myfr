<?php

$routes = require __DIR__ . '/routes.php';

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];  // explode to respect GET requests
if ($uri !== '/' && substr($uri, -1) === '/') {  // respect trailing slash, but delete it when doing checking
  $uri = rtrim($uri, '/');
}

// Actually do matching of incoming uri to routes
if (isset($routes[$uri])) {
  require $routes[$uri];
  exit;
}

$route404 = array_pop($routes);
http_response_code(404);
require $route404;