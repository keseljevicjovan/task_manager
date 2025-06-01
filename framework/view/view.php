<?php

function view($name, $data = [])
{
    $path = __DIR__ . '/../../resources/views/' . $name . '.php';

    if (!file_exists($path)) {
        http_response_code(404);
        echo "View not found: $name";
        exit;
    }

    extract($data);
    require $path;
}
