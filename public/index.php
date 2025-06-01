<?php

require_once __DIR__ . '/../framework/view/view.php';

$routes = require __DIR__ . '/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

if (!array_key_exists($uri, $routes)) {
    http_response_code(404);
    echo "404 - Page not found";
    exit;
}

[$controllerName, $method] = $routes[$uri];

require_once __DIR__ . '/../app/Http/Controllers/' . $controllerName . '.php';

$controller = new $controllerName();
echo $controller->$method();
