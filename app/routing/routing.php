<?php

$siteRoutes = require 'siteRoutes.php';
$adminRoutes = require 'adminRoutes.php';
$routes = $siteRoutes + $adminRoutes;

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];  // explode to respect GET requests
if ($uri !== '/' && substr($uri, -1) === '/') {  // respect trailing slash, but delete it when doing checking
  $uri = rtrim($uri, '/');
}

// Actually do matching of incoming uri to routes
if (isset($routes[$uri])) {
  $uriActionArgs = $routes[$uri];
  call_user_func([$uriActionArgs[0], $uriActionArgs[1]], ...$uriActionArgs[2]);
  exit;
}

$route404ActionArgs = $routes['404'];
http_response_code(404);
call_user_func([$route404ActionArgs[0], $route404ActionArgs[1]], ...$route404ActionArgs[2]);